<?php
namespace Hackorama\Core;

/**
 * Product cache system that fetches and caches all products from API
 */
class ProductCache
{
    private $apiClient;
    private $cacheFile;
    private $cacheTtl = 3600; // 1 hour
    private $products = [];
    
    public function __construct($apiClient, $cacheDir = null)
    {
        $this->apiClient = $apiClient;
        $cacheDir = $cacheDir ?: dirname(dirname(__DIR__)) . '/cache';
        $this->cacheFile = $cacheDir . '/products_cache.json';
    }
    
    /**
     * Get all products (cached or fresh from API)
     */
    public function getAllProducts()
    {
        if (empty($this->products)) {
            $this->loadProducts();
        }
        return $this->products;
    }
    
    /**
     * Get specific product by ID
     */
    public function getProduct($productId)
    {
        $products = $this->getAllProducts();
        return $products[$productId] ?? null;
    }
    
    /**
     * Load products from cache or API
     */
    private function loadProducts()
    {
        // Try to load from cache first
        if ($this->loadFromCache()) {
            return;
        }
        
        // Cache miss or expired, fetch from API
        $this->fetchFromApi();
        $this->saveToCache();
    }
    
    /**
     * Load products from cache file
     */
    private function loadFromCache()
    {
        if (!file_exists($this->cacheFile)) {
            return false;
        }
        
        $cacheData = json_decode(file_get_contents($this->cacheFile), true);
        if (!$cacheData || !isset($cacheData['timestamp'], $cacheData['products'])) {
            return false;
        }
        
        // Check if cache is still valid
        if (time() - $cacheData['timestamp'] > $this->cacheTtl) {
            return false;
        }
        
        $this->products = $cacheData['products'];
        return true;
    }
    
    /**
     * Fetch all products from API
     */
    private function fetchFromApi()
    {
        echo "Fetching products from API...\n";
        $this->products = [];
        
        try {
            // Fetch products in batches
            $limit = 100;
            $offset = 0;
            
            do {
                $batch = $this->apiClient->getProducts([
                    'limit' => $limit,
                    'offset' => $offset
                ]);
                
                if (empty($batch)) {
                    break;
                }
                
                // Index products by ID for fast lookup
                foreach ($batch as $product) {
                    if (isset($product['product_id'])) {
                        $this->products[$product['product_id']] = $product;
                    }
                }
                
                $offset += $limit;
                echo "Fetched " . count($batch) . " products (total: " . count($this->products) . ")\n";
                
            } while (count($batch) == $limit);
            
            echo "Total products cached: " . count($this->products) . "\n";
            
        } catch (\Exception $e) {
            echo "API error: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Save products to cache file
     */
    private function saveToCache()
    {
        $cacheData = [
            'timestamp' => time(),
            'products' => $this->products
        ];
        
        file_put_contents($this->cacheFile, json_encode($cacheData, JSON_PRETTY_PRINT));
        echo "Products saved to cache\n";
    }
    
    /**
     * Force refresh of product cache
     */
    public function refresh()
    {
        $this->products = [];
        if (file_exists($this->cacheFile)) {
            unlink($this->cacheFile);
        }
        $this->loadProducts();
    }
    
    /**
     * Get products for a landing page
     */
    public function getProductsForLandingPage($landingPageId)
    {
        $allProducts = $this->getAllProducts();
        
        // For landing page 591 (alle-produkter), return a selection of products
        if ($landingPageId == 591) {
            return array_slice($allProducts, 0, 12, true);
        }
        
        return [];
    }
}