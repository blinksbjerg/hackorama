<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for Webshop object
 */
class SafeWebshop extends DefaultSafe
{
    private $apiClient;
    protected $allowedMethods = [
        'getName',
        'getUrl',
        'getThemeUrl',
        'getLogo',
        'getEmail',
        'getPhone',
        'getAddress',
        'getSettings',
        'templateExists',
        'getFavicon',
        'getCurrency',
        'getEnableTracking',
        'getStylesheet',
        'hasLoyaltyProgram',
        'useReturnCenter',
        'getLanguage',
        'getBlocks',
        'getMenuByLocation',
        'getCategories',
        'getBlogPosts',
        'getDefaultStockLocation',
        'getStockLocations',
        'getFinancialProducts',
        'hasInvoiceAddressSelection',
        'hasDeliveryAddressSelection',
        'getDeliveryCountries',
        'hasSubscriptions',
        'getCustomerFields',
        'getHasUspsBesked',
        'hasPayPalCheckout',
        'getCountries',
        'getProductBySku',
        'getWebshopId',
        'getCheapestShipping',
        'getGaId',
        'getEnableNewTracking',
        'getGoogleAdsConversionId',
        'getGoogleAdsConversionLabelOrder',
        'getFbId',
        'getGoogleMerchantId',
        'getGoogleMerchantDeliveryDays',
        'getGoogleOptimizeId',
        'getGoogleTagManagerId',
        'getGA4MeasurementID',
        'getGooglePlaceID',
        'getPinterestTagID',
        'getPinterestAccessToken',
        'getSnapPixelID',
        'getSnapApiToken',
        'getTikTokPixelID',
        'getTikTokAccessToken',
        'getGoogleAdsConversionActionId',
        'getLinkedInID',
        'getMerchantNumber',
        'getStatus',
        'getHideDelivery',
        'getThemeSetting',
        'getAllCategories',
        'getCategory',
        'getCategoryByTag',
        'getCategoryByTags',
        'getCategoriesByTags',
        'getCompany',
        'getCreated',
        'getFrontCategory',
        'getHtmlFields',
        'getHtmlField',
        'getKlaviyoPublicKey',
        'getLandingPage',
        'getLandingPageByTag',
        'getLandingPages',
        'getLandingPagesByTags',
        'getLatestProductReviews',
        'getLiveSince',
        'getLoyaltyProgramApprovalPeriod',
        'getLoyaltyProgramBaseCost',
        'getLoyaltyProgramBaseExpires',
        'getLoyaltyProgramBasePoints',
        'getLoyaltyProgramFreeShipping',
        'getLoyaltyProgramMaxDiscount',
        'getLoyaltyProgramMinDiscount',
        'getLoyaltyProgramMinPoints',
        'getLoyaltyProgramSignupPoints',
        'getMenu',
        'getMenus',
        'getRootMenus',
        'getOnlineProducts',
        'getPages',
        'getPagesByTag',
        'getPaymentGateways',
        'getPaymentModule',
        'getPayPalClientId',
        'getPayPalSecret',
        'getPopularProducts',
        'getProductByGtin',
        'getProductById',
        'getProductLabels',
        'getProfiles',
        'getPublicVouchers',
        'getRelated',
        'getAfterBasket',
        'getAfterPurchase',
        'getAlsoBought',
        'getRelayUrl',
        'getReturnShipping',
        'getReturnShippingPrice',
        'getReturnShippingVat',
        'getReturnShippingVatFree',
        'getShippings',
        'getSkipApprove',
        'getSuppliers',
        'getTerms',
        'getThemeSettings',
        'getUseCalculatedUnitPrice',
        'getUseEvents',
        'getVouchers',
        'paidOrders',
        'getAttributeValues',
        'getAttributeValuesByTags',
        'getBrands',
        'getBlogTitle',
        'getBlogDescription',
        'getBlogOpenGraphTitle',
        'getBlogOpenGraphDescription',
        'getActiveCampaigns',
        'getAllowBasketPayment',
    ];
    
    public function getName()
    {
        return $this->data['name'] ?? 'Hackorama Shop';
    }
    
    public function getUrl()
    {
        return $this->data['url'] ?? 'http://localhost:8080';
    }
    
    public function getThemeUrl()
    {
        return $this->data['theme_url'] ?? '/themes/Alaska2';
    }
    
    public function getLogo()
    {
        // Return null - no custom logo
        return null;
    }
    
    public function getEmail()
    {
        return $this->data['email'] ?? 'info@hackorama.local';
    }
    
    public function getPhone()
    {
        return $this->data['phone'] ?? '';
    }
    
    public function getAddress()
    {
        return $this->data['address'] ?? '';
    }
    
    public function getSettings()
    {
        return $this->data['settings'] ?? [];
    }
    
    public function templateExists($template)
    {
        // Check if template exists in theme directory
        $themePath = $_SERVER['DOCUMENT_ROOT'] . $this->getThemeUrl() . '/templates/';
        return file_exists($themePath . $template);
    }
    
    public function getFavicon()
    {
        // Return null for now - no favicon
        return null;
    }
    
    public function getCurrency()
    {
        // Return DKK as default currency
        return 'DKK';
    }
    
    public function getEnableTracking()
    {
        // Return false for now - no tracking
        return false;
    }
    
    public function getStylesheet()
    {
        // Return null for now - no custom stylesheet
        return null;
    }
    
    public function hasLoyaltyProgram()
    {
        // Return false - no loyalty program
        return false;
    }
    
    public function useReturnCenter()
    {
        // Return false - no return center
        return false;
    }
    
    public function getLanguage()
    {
        // Return Danish as default
        return 'DA';
    }
    
    public function getBlocks($position)
    {
        // Return empty array for now - no page blocks
        return [];
    }
    
    public function getMenuByLocation($location)
    {
        // Fetch menus from API and find one by location
        if ($this->apiClient) {
            try {
                $menus = $this->apiClient->getMenus();
                foreach ($menus as $menuData) {
                    if (isset($menuData['location']) && $menuData['location'] === $location) {
                        // Fetch full menu with items
                        $fullMenu = $this->apiClient->getMenu($menuData['menu_id']);
                        return new SafeMenu($fullMenu);
                    }
                    // Also check by tag since some menus might use tag field
                    if (isset($menuData['tag']) && $menuData['tag'] === $location) {
                        // Fetch full menu with items
                        $fullMenu = $this->apiClient->getMenu($menuData['menu_id']);
                        return new SafeMenu($fullMenu);
                    }
                }
            } catch (\Exception $e) {
                // Handle error
            }
        }
        return null;
    }
    
    public function setApiClient($apiClient)
    {
        $this->apiClient = $apiClient;
    }
    
    public function getCategories()
    {
        // Fetch categories from API
        if ($this->apiClient) {
            try {
                $categories = $this->apiClient->getCategories();
                $wrapped = [];
                foreach ($categories as $categoryData) {
                    $wrapped[] = new SafeCategory($categoryData);
                }
                return $wrapped;
            } catch (\Exception $e) {
                return [];
            }
        }
        return [];
    }
    
    public function getBlogPosts($page = 1, $limit = 10)
    {
        // Return empty array - no blog posts
        return [];
    }
    
    public function getDefaultStockLocation()
    {
        // Return default stock location
        return null;
    }
    
    public function getStockLocations()
    {
        // Return stock locations
        return [];
    }
    
    public function getFinancialProducts()
    {
        // Return financial products (insurance, etc.)
        return [];
    }
    
    public function hasInvoiceAddressSelection()
    {
        // Return false - no invoice address selection
        return false;
    }
    
    public function hasDeliveryAddressSelection()
    {
        // Return false - no delivery address selection
        return false;
    }
    
    public function getDeliveryCountries()
    {
        // Return empty array - no delivery countries
        return [];
    }
    
    public function hasSubscriptions()
    {
        // Return false - no subscriptions
        return false;
    }
    
    public function getCustomerFields()
    {
        // Return empty array - no custom customer fields
        return [];
    }
    
    public function getHasUspsBesked()
    {
        // Return false - no USPS besked
        return false;
    }
    
    public function hasPayPalCheckout()
    {
        // Return whether PayPal checkout is enabled
        return false;
    }
    
    public function getCountries()
    {
        // Return list of countries
        return [];
    }
    
    public function getProductBySku($sku)
    {
        // Search for product by SKU
        // In a real implementation, this would call the API
        return null;
    }
    
    public function getWebshopId()
    {
        return $this->data['webshop_id'] ?? 1;
    }
    
    public function getCheapestShipping()
    {
        return $this->data['cheapest_shipping'] ?? 0;
    }
    
    public function getGaId()
    {
        return $this->data['ga_id'] ?? '';
    }
    
    public function getEnableNewTracking()
    {
        return $this->data['enable_new_tracking'] ?? false;
    }
    
    public function getGoogleAdsConversionId()
    {
        return $this->data['google_ads_conversion_id'] ?? '';
    }
    
    public function getGoogleAdsConversionLabelOrder()
    {
        return $this->data['google_ads_conversion_label_order'] ?? '';
    }
    
    public function getFbId()
    {
        return $this->data['fb_id'] ?? '';
    }
    
    public function getGoogleMerchantId()
    {
        return $this->data['google_merchant_id'] ?? '';
    }
    
    public function getGoogleMerchantDeliveryDays()
    {
        return $this->data['google_merchant_delivery_days'] ?? 0;
    }
    
    public function getGoogleOptimizeId()
    {
        return $this->data['google_optimize_id'] ?? '';
    }
    
    public function getGoogleTagManagerId()
    {
        return $this->data['google_tag_manager_id'] ?? '';
    }
    
    public function getGA4MeasurementID()
    {
        return $this->data['ga4_measurement_id'] ?? '';
    }
    
    public function getGooglePlaceID()
    {
        return $this->data['google_place_id'] ?? '';
    }
    
    public function getPinterestTagID()
    {
        return $this->data['pinterest_tag_id'] ?? '';
    }
    
    public function getPinterestAccessToken()
    {
        return $this->data['pinterest_access_token'] ?? '';
    }
    
    public function getSnapPixelID()
    {
        return $this->data['snap_pixel_id'] ?? '';
    }
    
    public function getSnapApiToken()
    {
        return $this->data['snap_api_token'] ?? '';
    }
    
    public function getTikTokPixelID()
    {
        return $this->data['tiktok_pixel_id'] ?? '';
    }
    
    public function getTikTokAccessToken()
    {
        return $this->data['tiktok_access_token'] ?? '';
    }
    
    public function getGoogleAdsConversionActionId()
    {
        return $this->data['google_ads_conversion_action_id'] ?? '';
    }
    
    public function getLinkedInID()
    {
        return $this->data['linkedin_id'] ?? '';
    }
    
    public function getMerchantNumber()
    {
        return $this->data['merchant_number'] ?? '';
    }
    
    public function getStatus()
    {
        return $this->data['status'] ?? 'active';
    }
    
    public function getHideDelivery()
    {
        return $this->data['hide_delivery'] ?? false;
    }
    
    public function getThemeSetting($element, $name)
    {
        return $this->data['theme_settings'][$element][$name] ?? null;
    }
    
    public function getAllCategories()
    {
        // Return all categories including subcategories
        return $this->getCategories();
    }
    
    public function getCategory($categoryId)
    {
        // Get a specific category by ID
        if ($this->apiClient) {
            try {
                $categoryData = $this->apiClient->getCategory($categoryId);
                return new SafeCategory($categoryData);
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }
    
    public function getCategoryByTag($tag)
    {
        // Get category by tag
        return $this->data['categories_by_tag'][$tag] ?? null;
    }
    
    public function getCategoryByTags($tags = null)
    {
        // Get categories by tags
        $categories = [];
        if ($tags && isset($this->data['categories_by_tags'])) {
            foreach ($tags as $tag) {
                if (isset($this->data['categories_by_tags'][$tag])) {
                    $categories[] = new SafeCategory($this->data['categories_by_tags'][$tag]);
                }
            }
        }
        return $categories;
    }
    
    public function getCategoriesByTags($tags = null)
    {
        return $this->getCategoryByTags($tags);
    }
    
    public function getCompany()
    {
        return $this->data['company'] ?? null;
    }
    
    public function getCreated()
    {
        return $this->data['created'] ?? null;
    }
    
    public function getFrontCategory()
    {
        // Return the front page category
        if (isset($this->data['front_category'])) {
            return new SafeCategory($this->data['front_category']);
        }
        return null;
    }
    
    public function getHtmlFields()
    {
        return $this->data['html_fields'] ?? [];
    }
    
    public function getHtmlField($tag)
    {
        return $this->data['html_fields'][$tag] ?? '';
    }
    
    public function getKlaviyoPublicKey()
    {
        return $this->data['klaviyo_public_key'] ?? '';
    }
    
    public function getLandingPage($landingPageId)
    {
        return $this->data['landing_pages'][$landingPageId] ?? null;
    }
    
    public function getLandingPageByTag($tag)
    {
        return $this->data['landing_pages_by_tag'][$tag] ?? null;
    }
    
    public function getLandingPages()
    {
        return $this->data['landing_pages'] ?? [];
    }
    
    public function getLandingPagesByTags($tags)
    {
        $pages = [];
        foreach ($tags as $tag) {
            if (isset($this->data['landing_pages_by_tag'][$tag])) {
                $pages[] = $this->data['landing_pages_by_tag'][$tag];
            }
        }
        return $pages;
    }
    
    public function getLatestProductReviews($limit = 10)
    {
        $reviews = $this->data['latest_product_reviews'] ?? [];
        return array_slice($reviews, 0, $limit);
    }
    
    public function getLiveSince()
    {
        return $this->data['live_since'] ?? null;
    }
    
    public function getLoyaltyProgramApprovalPeriod()
    {
        return $this->data['loyalty_program_approval_period'] ?? 0;
    }
    
    public function getLoyaltyProgramBaseCost()
    {
        return $this->data['loyalty_program_base_cost'] ?? 0;
    }
    
    public function getLoyaltyProgramBaseExpires()
    {
        return $this->data['loyalty_program_base_expires'] ?? 0;
    }
    
    public function getLoyaltyProgramBasePoints()
    {
        return $this->data['loyalty_program_base_points'] ?? 0;
    }
    
    public function getLoyaltyProgramFreeShipping()
    {
        return $this->data['loyalty_program_free_shipping'] ?? false;
    }
    
    public function getLoyaltyProgramMaxDiscount()
    {
        return $this->data['loyalty_program_max_discount'] ?? 0;
    }
    
    public function getLoyaltyProgramMinDiscount()
    {
        return $this->data['loyalty_program_min_discount'] ?? 0;
    }
    
    public function getLoyaltyProgramMinPoints()
    {
        return $this->data['loyalty_program_min_points'] ?? 0;
    }
    
    public function getLoyaltyProgramSignupPoints()
    {
        return $this->data['loyalty_program_signup_points'] ?? 0;
    }
    
    public function getMenu($tag)
    {
        return $this->data['menus'][$tag] ?? null;
    }
    
    public function getMenus()
    {
        return $this->data['menus'] ?? [];
    }
    
    public function getRootMenus()
    {
        return $this->data['root_menus'] ?? [];
    }
    
    public function getOnlineProducts($fieldsStr = "")
    {
        // Return online products
        $products = [];
        if ($this->apiClient) {
            try {
                $productData = $this->apiClient->getProducts();
                foreach ($productData as $product) {
                    $products[] = new SafeProduct($product);
                }
            } catch (\Exception $e) {
                // Handle error
            }
        }
        return $products;
    }
    
    public function getPages()
    {
        $pages = [];
        if (!empty($this->data['pages'])) {
            foreach ($this->data['pages'] as $pageData) {
                $pages[] = new SafePage($pageData);
            }
        }
        return $pages;
    }
    
    public function getPagesByTag($tag)
    {
        return $this->data['pages_by_tag'][$tag] ?? [];
    }
    
    public function getPaymentGateways()
    {
        return $this->data['payment_gateways'] ?? [];
    }
    
    public function getPaymentModule()
    {
        return $this->data['payment_module'] ?? null;
    }
    
    public function getPayPalClientId()
    {
        return $this->data['paypal_client_id'] ?? '';
    }
    
    public function getPayPalSecret($basketId)
    {
        return $this->data['paypal_secret'] ?? '';
    }
    
    public function getPopularProducts($limit = 25, $days = 90, $exclude = null)
    {
        $products = [];
        if (!empty($this->data['popular_products'])) {
            $filtered = $this->data['popular_products'];
            
            // Apply exclusions
            if ($exclude && is_array($exclude)) {
                $filtered = array_filter($filtered, function($product) use ($exclude) {
                    return !in_array($product['id'] ?? 0, $exclude);
                });
            }
            
            // Apply limit
            $filtered = array_slice($filtered, 0, $limit);
            
            foreach ($filtered as $productData) {
                $products[] = new SafeProduct($productData);
            }
        }
        return $products;
    }
    
    public function getProductByGtin($gtin)
    {
        // Search for product by GTIN
        return null;
    }
    
    public function getProductById($productId)
    {
        if ($this->apiClient) {
            try {
                $productData = $this->apiClient->getProduct($productId);
                return new SafeProduct($productData);
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }
    
    public function getProductLabels()
    {
        return $this->data['product_labels'] ?? [];
    }
    
    public function getProfiles()
    {
        return $this->data['profiles'] ?? [];
    }
    
    public function getPublicVouchers()
    {
        return $this->data['public_vouchers'] ?? [];
    }
    
    public function getRelated($products)
    {
        // Get related products based on input products
        return [];
    }
    
    public function getAfterBasket()
    {
        // Get after basket products
        return [];
    }
    
    public function getAfterPurchase($products)
    {
        // Get after purchase suggestions
        return [];
    }
    
    public function getAlsoBought($products)
    {
        // Get also bought products
        return [];
    }
    
    public function getRelayUrl($page = "")
    {
        return $this->data['relay_url'] ?? '';
    }
    
    public function getReturnShipping()
    {
        return $this->data['return_shipping'] ?? null;
    }
    
    public function getReturnShippingPrice($countryId = null)
    {
        return $this->data['return_shipping_price'] ?? 0.0;
    }
    
    public function getReturnShippingVat($shippingPrice, $countryId = null)
    {
        return $this->data['return_shipping_vat'] ?? 0.0;
    }
    
    public function getReturnShippingVatFree()
    {
        return $this->data['return_shipping_vat_free'] ?? false;
    }
    
    public function getShippings()
    {
        return $this->data['shippings'] ?? [];
    }
    
    public function getSkipApprove()
    {
        return $this->data['skip_approve'] ?? false;
    }
    
    public function getSuppliers()
    {
        return $this->data['suppliers'] ?? [];
    }
    
    public function getTerms()
    {
        return $this->data['terms'] ?? '';
    }
    
    public function getThemeSettings()
    {
        return $this->data['theme_settings'] ?? [];
    }
    
    public function getUseCalculatedUnitPrice()
    {
        return $this->data['use_calculated_unit_price'] ?? false;
    }
    
    public function getUseEvents()
    {
        return $this->data['use_events'] ?? false;
    }
    
    public function getVouchers()
    {
        return $this->data['vouchers'] ?? [];
    }
    
    public function paidOrders($email)
    {
        // Check if email has paid orders
        return false;
    }
    
    public function getAttributeValues($categoryIds = [])
    {
        return $this->data['attribute_values'] ?? [];
    }
    
    public function getAttributeValuesByTags()
    {
        return $this->data['attribute_values_by_tags'] ?? [];
    }
    
    public function getBrands()
    {
        return $this->data['brands'] ?? [];
    }
    
    public function getBlogTitle()
    {
        return $this->data['blog_title'] ?? 'Blog';
    }
    
    public function getBlogDescription()
    {
        return $this->data['blog_description'] ?? '';
    }
    
    public function getBlogOpenGraphTitle()
    {
        return $this->data['blog_open_graph_title'] ?? $this->getBlogTitle();
    }
    
    public function getBlogOpenGraphDescription()
    {
        return $this->data['blog_open_graph_description'] ?? $this->getBlogDescription();
    }
    
    public function getActiveCampaigns()
    {
        return $this->data['active_campaigns'] ?? [];
    }
    
    public function getAllowBasketPayment()
    {
        return $this->data['allow_basket_payment'] ?? false;
    }
}