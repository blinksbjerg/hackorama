<?php
namespace Hackorama\Core;

use Hackorama\API\Client;
use Hackorama\Core\Router;
use Hackorama\Core\Template;
use Hackorama\Core\Logger;

/**
 * Main Hackorama class
 */
class Hackorama
{
    private $config;
    private $apiClient;
    private $router;
    private $template;
    private $logger;
    private $basketManager;
    
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->initializeComponents();
    }
    
    private function initializeComponents()
    {
        // Initialize logger
        $this->logger = new Logger();
        $this->logger->info('Hackorama starting...');
        
        // Initialize API client
        $this->apiClient = new Client($this->config['api']);
        
        // Initialize router
        $this->router = new Router();
        
        // Initialize template engine
        $this->template = new Template($this->config);
        
        // Initialize basket manager
        $this->basketManager = new BasketManager($this->config['cache']['path']);
        
        // Start session for customer login
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function run()
    {
        // Parse request
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $parsedUrl = parse_url($requestUri);
        $path = $parsedUrl['path'] ?? '/';
        
        // Route request
        $route = $this->router->route($path);
        
        // Handle route
        $this->handleRoute($route);
    }
    
    private function handleRoute($route)
    {
        switch ($route['type']) {
            case 'home':
                $this->showHome();
                break;
            case 'category':
                $this->showCategory($route['id']);
                break;
            case 'product':
                $this->showProduct($route['id']);
                break;
            case 'page':
                $this->showPage($route['id']);
                break;
            case 'landing_page':
                $this->showLandingPage($route['id']);
                break;
            case 'landing_page_slug':
                $this->showLandingPageBySlug($route['slug']);
                break;
            case 'blog':
                $this->showBlog();
                break;
            case 'blog_post':
                $this->showBlogPost($route['id']);
                break;
            case 'basket':
                $this->showBasket();
                break;
                
            case 'basket_add':
                $this->addToBasket();
                break;
            case 'search':
                $this->showSearch();
                break;
            case 'user-sign-in':
                $this->showUserSignIn();
                break;
            case 'user-sign-up':
                $this->showUserSignUp();
                break;
            case 'user-sign-out':
                $this->userSignOut();
                break;
            case 'user-edit':
                $this->showUserEdit();
                break;
            case 'user-orders':
                $this->showUserOrders();
                break;
            case 'address':
                $this->showAddress();
                break;
            case 'shipping':
                $this->showShipping();
                break;
            case 'payment':
                $this->showPayment();
                break;
            default:
                $this->show404();
        }
    }
    
    private function showHome()
    {
        $this->logger->info('Showing home page');
        
        // Get data from API
        $data = $this->getCommonTemplateData();
        
        // Get categories
        try {
            $categories = $this->apiClient->getCategories();
            $data['categories'] = $this->wrapObjects($categories, 'Category');
            $this->logger->info('Loaded ' . count($categories) . ' categories');
        } catch (\Exception $e) {
            $this->logger->error('Failed to load categories: ' . $e->getMessage());
            $data['categories'] = [];
        }
        
        // Get featured products
        try {
            $products = $this->apiClient->getProducts(['featured' => true, 'limit' => 12]);
            $data['products'] = $this->wrapObjects($products, 'Product');
            $this->logger->info('Loaded ' . count($products) . ' products');
        } catch (\Exception $e) {
            $this->logger->error('Failed to load products: ' . $e->getMessage());
            $data['products'] = [];
        }
        
        // For front page, create a virtual "front" category with all products
        $frontCategory = [
            'category_id' => 0,
            'name' => 'Forside',
            'is_front' => true,
            '_products' => $data['products'], // Store products for later use
        ];
        
        // Add required template variables that templates expect
        $data['page_blocks'] = [];
        $data['inc'] = null;
        $data['category'] = $this->wrapObject($frontCategory, 'Category');
        $data['landing_page'] = null;
        $data['product'] = null;
        $data['page'] = null;
        $data['blog_post'] = null;
        $data['logo'] = null;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('index.html');
    }
    
    private function showCategory($id)
    {
        // Get category data
        $category = $this->apiClient->getCategory($id);
        if (!$category) {
            $this->show404();
            return;
        }
        
        $data = $this->getCommonTemplateData();
        $data['category'] = $this->wrapObject($category, 'Category');
        
        // Get products in category
        $products = $this->apiClient->getProducts(['category_id' => $id]);
        $data['products'] = $this->wrapObjects($products, 'Product');
        
        // Add pager variable
        $data['pager'] = null;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('category.html');
    }
    
    private function showProduct($id)
    {
        // Handle POST request to add to basket
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
            $amount = $_POST['amount'] ?? 1;
            
            // Get product data to cache basic info
            $product = $this->apiClient->getProduct($productId);
            if ($product) {
                // Add to basket using BasketManager
                $this->basketManager->addProduct($productId, $amount, $product);
            }
            
            // Redirect to basket
            header('Location: /basket');
            exit;
        }
        
        // Get product data
        $product = $this->apiClient->getProduct($id);
        if (!$product) {
            $this->show404();
            return;
        }
        
        $data = $this->getCommonTemplateData();
        $data['product'] = $this->wrapObject($product, 'Product');
        
        // Add missing template variables
        $data['viabill_code'] = '';
        $data['mail'] = '';
        $data['contact_on_products'] = false;
        $data['show_reviews'] = false;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('product.html');
    }
    
    private function showPage($id)
    {
        // Get page data
        $page = $this->apiClient->getPage($id);
        if (!$page) {
            $this->show404();
            return;
        }
        
        $data = [];
        $data['page'] = $this->wrapObject($page, 'Page');
        
        // Render template
        $this->template->assign($data);
        $this->template->display('page.html');
    }
    
    private function show404()
    {
        header("HTTP/1.0 404 Not Found");
        
        // Need to provide basic template data for 404 page
        $data = $this->getCommonTemplateData();
        $data['inc'] = '404.html';
        
        $this->template->assign($data);
        $this->template->display('404.html');
    }
    
    private function showBasket()
    {
        // Handle POST request to update basket
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle amount updates
            if (isset($_POST['amount']) && is_array($_POST['amount'])) {
                foreach ($_POST['amount'] as $basketId => $amount) {
                    // Get basket items
                    $basket = $this->basketManager->getBasket();
                    if (isset($basket[$basketId])) {
                        $productId = $basket[$basketId]['product_id'];
                        if ($amount == 0) {
                            $this->basketManager->removeProduct($productId);
                        } else {
                            $this->basketManager->updateAmount($productId, $amount);
                        }
                    }
                }
            }
            
            // Handle checkout proceed button
            if (isset($_POST['next'])) {
                // Check if basket has items
                $basket = $this->basketManager->getBasket();
                if (empty($basket)) {
                    header('Location: /basket?empty=1');
                    exit;
                }
                
                // Proceed to address page
                header('Location: /address');
                exit;
            }
            
            // Handle voucher code
            if (isset($_POST['voucher'])) {
                $voucherCode = trim($_POST['voucher']);
                
                if (!empty($voucherCode)) {
                    // Check if voucher is valid from API
                    $vouchers = $this->apiClient->getVouchers();
                    $validVoucher = null;
                    
                    foreach ($vouchers as $voucher) {
                        if (strcasecmp($voucher['code'], $voucherCode) === 0) {
                            $validVoucher = $voucher;
                            break;
                        }
                    }
                    
                    if ($validVoucher) {
                        $this->basketManager->setVoucherCode($voucherCode);
                        header('Location: /basket');
                    } else {
                        header('Location: /basket?wrong_voucher=1');
                    }
                    exit;
                } else {
                    // Clear voucher
                    $this->basketManager->setVoucherCode('');
                }
            }
            
            // Redirect to avoid form resubmission
            header('Location: /basket');
            exit;
        }
        
        $data = $this->getCommonTemplateData();
        
        // Get basket with fresh product data
        $data['basket'] = $this->basketManager->getBasketWithProducts(
            $this->apiClient,
            [$this, 'wrapObject']
        );
        
        // Initialize template variables
        $data['get'] = $_GET;
        $data['get']['s'] = $_GET['s'] ?? '';
        $data['get']['wrong_voucher'] = isset($_GET['wrong_voucher']) ? true : false;
        $data['get']['empty'] = isset($_GET['empty']) ? true : false;
        $data['get']['order_complete'] = isset($_GET['order_complete']) ? true : false;
        $data['get']['search'] = $_GET['search'] ?? '';
        
        // Get current voucher code
        $voucherCode = $this->basketManager->getVoucherCode();
        $data['voucher'] = null;
        $data['voucher_code'] = $voucherCode; // Add voucher code string for template
        $data['voucher_discount'] = 0;
        
        // Get vouchers from API
        if ($voucherCode) {
            $vouchers = $this->apiClient->getVouchers();
            foreach ($vouchers as $voucherData) {
                if (strcasecmp($voucherData['code'], $voucherCode) === 0) {
                    // Ensure all fields exist
                    $voucherData['percent_discount'] = $voucherData['percent_discount'] ?? 0;
                    $voucherData['price_discount'] = $voucherData['price_discount'] ?? 0;
                    $voucherData['free_shipping'] = $voucherData['free_shipping'] ?? false;
                    $voucherData['name'] = $voucherData['name'] ?? $voucherData['code'];
                    
                    $data['voucher'] = $this->wrapObject($voucherData, 'Voucher');
                    
                    // Calculate discount
                    $basketTotal = $this->basketManager->getTotalPrice($this->apiClient, [$this, 'wrapObject']);
                    if ($voucherData['percent_discount'] > 0) {
                        $data['voucher_discount'] = $basketTotal * ($voucherData['percent_discount'] / 100);
                    } elseif ($voucherData['price_discount'] > 0) {
                        $data['voucher_discount'] = $voucherData['price_discount'];
                    }
                    break;
                }
            }
        }
        
        $data['campaign_ids'] = null;
        $data['campaign_matches'] = [];
        $data['products_matches'] = [];
        $data['campaign_discount'] = 0;
        $data['product'] = null;
        $data['use_points'] = 0;
        $data['point_discount'] = 0;
        $data['shipping_price'] = $data['voucher'] && $data['voucher']->getFreeShipping() ? 0 : 39; // Default shipping
        $data['vat'] = 0;
        $data['customer'] = null;
        $data['earns'] = 0;
        $data['session_del'] = ['country_id' => 45]; // Default to Denmark
        $data['in_stock'] = true;
        
        // Calculate total price
        $totalPrice = $this->basketManager->getTotalPrice(
            $this->apiClient,
            [$this, 'wrapObject']
        );
        $data['price'] = $totalPrice;
        $data['total_price'] = $totalPrice;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('basket.html');
    }
    
    private function showSearch()
    {
        $data = $this->getCommonTemplateData();
        
        // Get search query
        $data['search'] = $_GET['search'] ?? '';
        $data['products'] = [];
        
        // If there's a search query, search for products
        if (!empty($data['search'])) {
            try {
                $products = $this->apiClient->getProducts(['search' => $data['search']]);
                $data['products'] = $this->wrapObjects($products, 'Product');
            } catch (\Exception $e) {
                $data['products'] = [];
            }
        }
        
        // Add missing template variables
        $data['pages'] = [];
        $data['landing_pages'] = [];
        $data['categories'] = [];
        $data['blog_posts'] = [];
        $data['category'] = null;
        $data['landing_page'] = null;
        $data['inc'] = null;
        $data['pager'] = null;
        $data['data'] = ['placeholder' => 'Søg efter produkter...'];
        
        // Render template
        $this->template->assign($data);
        $this->template->display('search.html');
    }
    
    private function addToBasket()
    {
        // Handle POST request to add to basket
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0;
            $amount = $_POST['amount'] ?? 1;
            
            if ($productId) {
                // Get product data to cache basic info
                $product = $this->apiClient->getProduct($productId);
                if ($product) {
                    // Add to basket using BasketManager
                    $this->basketManager->addProduct($productId, $amount, $product);
                }
            }
        }
        
        // Redirect back to basket
        header('Location: /basket');
        exit;
    }
    
    private function getCommonTemplateData()
    {
        $data = [];
        $data['webshop'] = $this->getWebshopObject();
        $data['customer'] = $this->getCurrentCustomer();
        $data['meta_title'] = null;
        $data['meta_description'] = null;
        $data['noindex'] = false;
        $data['canonical'] = null;
        $data['open_graph_title'] = null;
        $data['open_graph_description'] = null;
        $data['favicon'] = null;
        $data['theme_url'] = '/themes/Alaska2';
        $data['settings'] = $this->getSettings();
        
        // Get menus from API
        try {
            $menus = $this->apiClient->getMenus();
            $data['menus'] = $this->wrapObjects($menus, 'Menu');
        } catch (\Exception $e) {
            $data['menus'] = [];
        }
        // Get basket data from BasketManager
        $data['basket'] = $this->basketManager->getBasketWithProducts(
            $this->apiClient,
            [$this, 'wrapObject']
        );
        $data['session_order'] = [];
        $data['get'] = $_GET;
        // Ensure search key exists
        if (!isset($data['get']['search'])) {
            $data['get']['search'] = '';
        }
        
        // Add cookie data for tracking
        $data['cookie'] = $_COOKIE;
        if (!isset($data['cookie']['accept_cookies'])) {
            $data['cookie']['accept_cookies'] = '';
        }
        
        // Calculate totals from basket
        $data['total_price'] = $this->basketManager->getTotalPrice(
            $this->apiClient,
            [$this, 'wrapObject']
        );
        $data['total_amount'] = $this->basketManager->getTotalItems();
        return $data;
    }
    
    public function wrapObject($data, $type)
    {
        $className = "\\Hackorama\\Wrappers\\Safe{$type}";
        return new $className($data);
    }
    
    private function wrapObjects($dataArray, $type)
    {
        $wrapped = [];
        foreach ($dataArray as $data) {
            $wrapped[] = $this->wrapObject($data, $type);
        }
        return $wrapped;
    }
    
    private function getWebshopObject()
    {
        // Create a mock webshop object with basic info
        $webshopData = [
            'name' => 'Mortens butik',
            'url' => $this->config['local_url'],
            'theme_url' => '/themes/Alaska2',
            'email' => 'info@hackorama.local',
            'settings' => [],
        ];
        
        $webshop = new \Hackorama\Wrappers\SafeWebshop($webshopData);
        $webshop->setApiClient($this->apiClient);
        return $webshop;
    }
    
    private function getSettings()
    {
        // Return default theme settings
        return [
            'design' => [
                'size' => 'boxed',
                'logo' => null,
                'favicon' => null,
                'color' => '#333333',
                'background_color' => '#ffffff',
            ],
            'contact' => [
                'phone' => '',
                'mail' => '',
            ],
            'some' => [
                'instagram' => '',
                'facebook' => '',
                'twitter' => '',
                'pinterest' => '',
            ],
            'settings' => [
                'show_login' => true,
                'use_wishlist' => false,
                'user_id' => null,
                'disable_admin_menu' => true,
            ],
            'gdpr' => [
                'text' => '',
            ],
        ];
    }
    
    private function getCurrentCustomer()
    {
        if (isset($_SESSION['customer_id'])) {
            // Get customer from API
            $customer = $this->apiClient->getCustomer($_SESSION['customer_id']);
            if ($customer) {
                return $this->wrapObject($customer, 'Customer');
            }
        }
        return null;
    }
    
    private function showUserSignIn()
    {
        // If user is already logged in, redirect to account page
        $data = $this->getCommonTemplateData();
        if ($data['customer']) {
            header('Location: /user-edit');
            exit;
        }
        
        // Handle login form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Since we can't list all customers, try known customer IDs
            // In a real implementation, this would need a proper user lookup
            $knownCustomerIds = [1, 2, 3, 4, 5]; // Test with first few IDs
            
            $found = false;
            foreach ($knownCustomerIds as $customerId) {
                $customerData = $this->apiClient->getCustomer($customerId);
                if ($customerData && isset($customerData['email']) && $customerData['email'] === $email) {
                    // As documented, password is always "password"
                    if ($password === 'password') {
                        $_SESSION['customer_id'] = $customerData['customer_id'];
                        
                        // Redirect to previous page or account
                        $redirect = $_GET['redir'] ?? '/user-edit';
                        header('Location: ' . $redirect);
                        exit;
                    }
                    $found = true;
                    break;
                }
            }
            
            // Invalid login
            $error = 'Forkert email eller password';
        }
        
        $data = $this->getCommonTemplateData();
        $data['error'] = $error ?? null;
        
        $this->template->assign($data);
        $this->template->display('user-sign-in.html');
    }
    
    private function userSignOut()
    {
        // Clear session
        unset($_SESSION['customer_id']);
        session_destroy();
        
        // Redirect to home
        header('Location: /');
        exit;
    }
    
    private function showAddress()
    {
        $data = $this->getCommonTemplateData();
        
        // Check if customer is logged in
        if (!$data['customer']) {
            header('Location: /user-sign-in?redir=/address');
            exit;
        }
        
        // Handle address form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['next']) || isset($_POST['skip_next'])) {
                // Store address data in session (simplified for demo)
                $_SESSION['order_address'] = $_POST;
                
                // If skip_next, go directly to payment, otherwise to shipping
                if (isset($_POST['skip_next'])) {
                    header('Location: /payment');
                } else {
                    header('Location: /shipping');
                }
                exit;
            }
        }
        
        // Initialize session order data with empty values to prevent template warnings
        $data['session_order'] = [
            'exists' => false,
            'missing_address' => false,
            'name' => '',
            'company_name' => '',
            'vat_number' => '',
            'ean_number' => '',
            'address' => '',
            'zipcode' => '',
            'city' => '',
            'country_id' => 45, // Default to Denmark
            'email' => $data['customer'] ? $data['customer']->getEmail() : '',
            'phone' => '',
            'comments' => '',
            'join_mailinglist' => (object)['value' => ''],
            'newsletter' => false,
            'delivery_to_same' => true,
            'delivery_name' => '',
            'delivery_company_name' => '',
            'delivery_address' => '',
            'delivery_zipcode' => '',
            'delivery_city' => '',
            'delivery_country_id' => 45
        ];
        
        // Add missing GET variables for template
        $data['get']['exists'] = false;
        $data['get']['missing_address'] = false;
        
        // Add missing template variables
        $data['join_mailinglist'] = (object)['value' => ''];
        $data['session_del'] = [
            'name' => '',
            'company_name' => '',
            'address' => '',
            'zipcode' => '',
            'city' => '',
            'country_id' => 45
        ];
        
        // Add newsletter settings to prevent warnings
        if (!isset($data['settings']['gdpr'])) {
            $data['settings']['gdpr'] = [];
        }
        if (!isset($data['settings']['gdpr']['newsletter'])) {
            $data['settings']['gdpr']['newsletter'] = '';
        }
        
        $this->template->assign($data);
        $this->template->display('address.html');
    }
    
    private function showShipping()
    {
        $data = $this->getCommonTemplateData();
        
        // Handle shipping form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['next'])) {
                // Store shipping data in session
                $_SESSION['order_shipping'] = $_POST;
                
                // Check if we should skip approval step
                if (isset($_POST['skip_approve']) || $_GET['skip_approve'] ?? false) {
                    header('Location: /payment');
                } else {
                    header('Location: /approval'); // Create approval page later if needed
                }
                exit;
            }
        }
        
        // Get shipping methods
        $shippingMethods = $this->apiClient->getShippingMethods();
        $data['shipping_methods'] = $this->wrapObjects($shippingMethods, 'Shipping');
        $data['shippings'] = $data['shipping_methods']; // Template expects 'shippings'
        
        $this->template->assign($data);
        $this->template->display('shipping.html');
    }
    
    private function showPayment()
    {
        $data = $this->getCommonTemplateData();
        
        // Handle payment form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['complete_order']) || isset($_POST['pay'])) {
                // Simulate order completion
                // In a real implementation, this would process payment and create order
                
                // Clear basket after successful order
                $this->basketManager->clearBasket();
                
                // Clear session data
                unset($_SESSION['order_address']);
                unset($_SESSION['order_shipping']);
                
                // Redirect to order confirmation (or back to basket with success message)
                header('Location: /basket?order_complete=1');
                exit;
            }
        }
        
        // Provide session order data for the template
        $data['session_order'] = $_SESSION['order_address'] ?? [];
        $data['session_shipping'] = $_SESSION['order_shipping'] ?? [];
        
        // Add payment-related data
        $data['payment_methods'] = []; // Empty for now
        $data['order_total'] = $this->basketManager->getTotalPrice(
            $this->apiClient,
            [$this, 'wrapObject']
        );
        
        $this->template->assign($data);
        $this->template->display('payment.html');
    }
    
    private function showUserSignUp()
    {
        // Handle signup form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // For demo purposes, create a new customer with next available ID
            // In real implementation, this would create via API
            $data = $this->getCommonTemplateData();
            $data['created'] = true;
            $data['error'] = null;
            
            // Auto-login the new user (using ID 1 for demo)
            $_SESSION['customer_id'] = 1;
            
            $this->template->assign($data);
            $this->template->display('user-sign-up.html');
            return;
        }
        
        $data = $this->getCommonTemplateData();
        $data['created'] = false;
        $data['error'] = null;
        
        $this->template->assign($data);
        $this->template->display('user-sign-up.html');
    }
    
    private function showUserEdit()
    {
        $data = $this->getCommonTemplateData();
        
        // Check if customer is logged in
        if (!$data['customer']) {
            header('Location: /user-sign-in?redir=/user-edit');
            exit;
        }
        
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // For demo, just show success message
            $data['success'] = true;
            $data['saved'] = true;
        } else {
            $data['success'] = false;
            $data['saved'] = false;
        }
        
        // Add missing GET variables for template
        $data['get']['saved'] = isset($_GET['saved']) ? true : false;
        
        $this->template->assign($data);
        $this->template->display('user-edit.html');
    }
    
    private function showUserOrders()
    {
        $data = $this->getCommonTemplateData();
        
        // Check if customer is logged in
        if (!$data['customer']) {
            header('Location: /user-sign-in?redir=/user-orders');
            exit;
        }
        
        // Fetch orders for the logged-in customer
        try {
            $orders = $this->apiClient->getOrders(['customer_id' => $data['customer']->getCustomerId()]);
            $data['orders'] = $this->wrapObjects($orders, 'Order');
        } catch (\Exception $e) {
            $data['orders'] = [];
        }
        
        $this->template->assign($data);
        $this->template->display('user-orders.html');
    }
    
    private function showLandingPage($id)
    {
        // Get landing page data
        $landingPage = $this->apiClient->getLandingPage($id);
        if (!$landingPage) {
            $this->show404();
            return;
        }
        
        $data = $this->getCommonTemplateData();
        $landingPageWrapper = $this->wrapObject($landingPage, 'LandingPage');
        $landingPageWrapper->setApiClient($this->apiClient);
        $data['landing_page'] = $landingPageWrapper;
        
        // Get products for landing page if available
        $products = $data['landing_page']->getProducts();
        $data['products'] = $products;
        
        // Add missing template variables
        $data['category'] = null;
        $data['page'] = null;
        $data['product'] = null;
        $data['pager'] = null;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('landing_page.html');
    }
    
    private function showLandingPageBySlug($slug)
    {
        // Get all landing pages and find by slug
        $landingPage = null;
        try {
            $landingPages = $this->apiClient->getLandingPages();
            foreach ($landingPages as $page) {
                if (isset($page['slug']) && $page['slug'] === $slug) {
                    $landingPage = $page;
                    break;
                }
            }
        } catch (\Exception $e) {
            // API error, fall through to mock data
        }
        
        // If no landing page found or API error, create mock data for slug "591"
        if (!$landingPage && $slug === '591') {
            $landingPage = [
                'landing_page_id' => 591,
                'name' => 'Alle produkter',
                'title' => 'Alle produkter',
                'content' => '<h1>Alle produkter</h1><p></p>',
                'slug' => '591',
                'visible' => true,
                'products' => [
                    ['id' => 196460],
                    ['id' => 196461],
                    ['id' => 196462],
                    ['id' => 196463],
                    ['id' => 196464],
                    ['id' => 196465]
                ]
            ];
        }
        
        if (!$landingPage) {
            $this->show404();
            return;
        }
        
        $data = $this->getCommonTemplateData();
        $landingPageWrapper = $this->wrapObject($landingPage, 'LandingPage');
        $landingPageWrapper->setApiClient($this->apiClient);
        $data['landing_page'] = $landingPageWrapper;
        
        // Get products for landing page if available
        $products = $data['landing_page']->getProducts();
        $data['products'] = $products;
        
        // Add missing template variables
        $data['category'] = null;
        $data['page'] = null;
        $data['product'] = null;
        $data['pager'] = null;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('landing_page.html');
    }
    
    private function showBlog()
    {
        $data = $this->getCommonTemplateData();
        
        // Get blog posts from API
        try {
            $blogPosts = $this->apiClient->getBlogPosts();
            $data['blog_posts'] = $this->wrapObjects($blogPosts, 'BlogPost');
        } catch (\Exception $e) {
            $data['blog_posts'] = [];
        }
        
        // Add missing template variables
        $data['category'] = null;
        $data['page'] = null;  
        $data['product'] = null;
        $data['landing_page'] = null;
        $data['blog_post'] = null;
        $data['pager'] = null;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('blog.html');
    }
    
    private function showBlogPost($id)
    {
        // Get blog post data from API first
        $blogPost = null;
        try {
            $blogPost = $this->apiClient->getBlogPost($id);
        } catch (\Exception $e) {
            // Fall through to mock data
        }
        
        // If no API data, use mock data
        if (!$blogPost) {
            $mockPosts = [
                1 => [
                    'blog_post_id' => 1,
                    'title' => 'Velkommen til vores blog',
                    'content' => 'Dette er vores første blog post. Her deler vi nyheder og interessante historier med vores kunder. Vi håber I vil følge med i vores opdateringer.',
                    'intro' => 'En introduktion til vores blog',
                    'author' => 'Morten',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-1 week')),
                    'published' => true,
                    'image' => [
                        'url' => '/cache/1/0/8/6/7/box-1200x300x90.png',
                        'alt' => 'Blog billede 1',
                        'width' => 1200,
                        'height' => 300
                    ]
                ],
                2 => [
                    'blog_post_id' => 2,
                    'title' => 'Nyheder fra butikken',
                    'content' => 'Vi har mange spændende nyheder at dele med jer. Vi har udvidet vores sortiment og tilbyder nu endnu flere produkter til gode priser.',
                    'intro' => 'Seneste nyheder',
                    'author' => 'Morten',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
                    'published' => true,
                    'image' => [
                        'url' => '/cache/1/0/8/6/6/box-1200x300x90.png',
                        'alt' => 'Blog billede 2',
                        'width' => 1200,
                        'height' => 300
                    ]
                ]
            ];
            
            if (!isset($mockPosts[$id])) {
                $this->show404();
                return;
            }
            
            $blogPost = $mockPosts[$id];
        }
        
        $data = $this->getCommonTemplateData();
        $data['blog_post'] = $this->wrapObject($blogPost, 'BlogPost');
        
        // Add missing template variables
        $data['category'] = null;
        $data['page'] = null;
        $data['product'] = null;
        $data['landing_page'] = null;
        $data['pager'] = null;
        
        // Render template
        $this->template->assign($data);
        $this->template->display('blog_post.html');
    }
}