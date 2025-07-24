<?php
namespace Hackorama\Core;

/**
 * Simple basket manager using JSON files and cookies
 */
class BasketManager
{
    private $basketPath;
    private $basketId;
    private $basket;
    
    public function __construct($cachePath)
    {
        $this->basketPath = $cachePath . '/baskets';
        
        // Create basket directory if not exists
        if (!is_dir($this->basketPath)) {
            mkdir($this->basketPath, 0777, true);
        }
        
        // Get or create basket ID from cookie
        $this->basketId = $_COOKIE['basket_id'] ?? null;
        if (!$this->basketId) {
            $this->basketId = uniqid('basket_', true);
            setcookie('basket_id', $this->basketId, time() + (86400 * 30), '/'); // 30 days
        }
        
        // Load basket
        $this->loadBasket();
    }
    
    private function loadBasket()
    {
        $basketFile = $this->basketPath . '/' . $this->basketId . '.json';
        
        if (file_exists($basketFile)) {
            $content = file_get_contents($basketFile);
            $this->basket = json_decode($content, true) ?: [];
        } else {
            $this->basket = [];
        }
        
        // Clean old basket files (older than 30 days)
        $this->cleanOldBaskets();
    }
    
    private function saveBasket()
    {
        $basketFile = $this->basketPath . '/' . $this->basketId . '.json';
        file_put_contents($basketFile, json_encode($this->basket, JSON_PRETTY_PRINT));
    }
    
    private function cleanOldBaskets()
    {
        $files = glob($this->basketPath . '/*.json');
        $now = time();
        
        foreach ($files as $file) {
            if ($now - filemtime($file) >= 86400 * 30) { // 30 days
                unlink($file);
            }
        }
    }
    
    public function addProduct($productId, $amount = 1, $productData = null)
    {
        // Check if product already in basket
        $found = false;
        foreach ($this->basket as &$item) {
            if ($item['product_id'] == $productId) {
                $item['amount'] += $amount;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            $this->basket[] = [
                'product_id' => $productId,
                'amount' => $amount,
                'product_data' => $productData,
                'attributes' => [],
                'added_at' => time()
            ];
        }
        
        $this->saveBasket();
    }
    
    public function removeProduct($productId)
    {
        $this->basket = array_filter($this->basket, function($item) use ($productId) {
            return $item['product_id'] != $productId;
        });
        
        $this->basket = array_values($this->basket); // Reindex array
        $this->saveBasket();
    }
    
    public function updateAmount($productId, $amount)
    {
        if ($amount <= 0) {
            $this->removeProduct($productId);
            return;
        }
        
        foreach ($this->basket as &$item) {
            if ($item['product_id'] == $productId) {
                $item['amount'] = $amount;
                break;
            }
        }
        
        $this->saveBasket();
    }
    
    public function getBasket()
    {
        return $this->basket;
    }
    
    public function clearBasket()
    {
        $this->basket = [];
        $this->saveBasket();
    }
    
    public function getTotalItems()
    {
        $total = 0;
        foreach ($this->basket as $item) {
            $total += $item['amount'];
        }
        return $total;
    }
    
    public function getTotalPrice($apiClient, $wrapperFactory)
    {
        $total = 0;
        foreach ($this->basket as $item) {
            // Get fresh product data
            $product = $apiClient->getProduct($item['product_id']);
            if ($product) {
                $wrappedProduct = $wrapperFactory($product, 'Product');
                $total += $wrappedProduct->getRealPrice() * $item['amount'];
            }
        }
        return $total;
    }
    
    public function getBasketWithProducts($apiClient, $wrapperFactory)
    {
        $basketWithProducts = [];
        
        foreach ($this->basket as $index => $item) {
            // Get fresh product data
            $product = $apiClient->getProduct($item['product_id']);
            if ($product) {
                $basketItem = $item;
                $basketItem['id'] = $index; // Add index as id for template
                $basketItem['product'] = $wrapperFactory($product, 'Product');
                $basketWithProducts[] = $basketItem;
            }
        }
        
        return $basketWithProducts;
    }
}