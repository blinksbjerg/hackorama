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
            case 'basket':
                $this->showBasket();
                break;
                
            case 'basket_add':
                $this->addToBasket();
                break;
            case 'search':
                $this->showSearch();
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
        $data['get']['search'] = $_GET['search'] ?? '';
        $data['voucher'] = $_GET['voucher'] ?? '';
        $data['campaign_ids'] = null;
        $data['campaign_matches'] = [];
        $data['products_matches'] = [];
        $data['campaign_discount'] = 0;
        $data['voucher_discount'] = 0;
        $data['product'] = null;
        $data['use_points'] = 0;
        $data['point_discount'] = 0;
        $data['shipping_price'] = 0;
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
        $data['customer'] = null;
        $data['meta_title'] = null;
        $data['meta_description'] = null;
        $data['noindex'] = false;
        $data['canonical'] = null;
        $data['open_graph_title'] = null;
        $data['open_graph_description'] = null;
        $data['favicon'] = null;
        $data['theme_url'] = '/themes/Alaska2';
        $data['settings'] = $this->getSettings();
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
}