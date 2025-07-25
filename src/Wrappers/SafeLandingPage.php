<?php
namespace Hackorama\Wrappers;

/**
 * SafeLandingPage wrapper class
 */
class SafeLandingPage extends DefaultSafe
{
    private $apiClient;
    
    public function setApiClient($apiClient)
    {
        $this->apiClient = $apiClient;
    }
    public function getLandingPageId()
    {
        return $this->data['landing_page_id'] ?? 0;
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getTitle()
    {
        return $this->data['title'] ?? $this->getName();
    }
    
    public function getDescription()
    {
        return $this->data['description'] ?? '';
    }
    
    public function getContent()
    {
        return $this->data['content'] ?? '';
    }
    
    public function getUrl()
    {
        return $this->data['url'] ?? '';
    }
    
    public function getSlug()
    {
        return $this->data['slug'] ?? '';
    }
    
    public function getMetaTitle()
    {
        return $this->data['meta_title'] ?? $this->getTitle();
    }
    
    public function getMetaDescription()
    {
        return $this->data['meta_description'] ?? $this->getDescription();
    }
    
    public function getVisible()
    {
        return $this->data['visible'] ?? true;
    }
    
    public function isVisible()
    {
        return $this->getVisible();
    }
    
    public function getCreatedAt()
    {
        return $this->data['created_at'] ?? '';
    }
    
    public function getUpdatedAt()
    {
        return $this->data['updated_at'] ?? '';
    }
    
    public function getProducts()
    {
        $products = [];
        
        // If landing page has products array, use those IDs to get real product data
        if (isset($this->data['products']) && is_array($this->data['products'])) {
            foreach ($this->data['products'] as $productData) {
                if ($this->apiClient && isset($productData['id'])) {
                    try {
                        $fullProductData = $this->apiClient->getProduct($productData['id']);
                        if ($fullProductData) {
                            $products[] = new SafeProduct($fullProductData);
                        }
                    } catch (\Exception $e) {
                        // API failed - skip this product
                    }
                }
            }
        }
        
        // For all landing pages, if they have a product_count, get products from the cache system
        if ($this->apiClient && $this->data['product_count'] > 0) {
            try {
                $productCount = $this->data['product_count'] ?? 12;
                $allProducts = $this->apiClient->getProducts(['limit' => $productCount]);
                
                foreach ($allProducts as $productData) {
                    $products[] = new SafeProduct($productData);
                }
            } catch (\Exception $e) {
                // API failed - no products
            }
        }
        
        return $products;
    }
    
    public function getCategories()
    {
        $categories = [];
        if (isset($this->data['categories']) && is_array($this->data['categories'])) {
            foreach ($this->data['categories'] as $categoryData) {
                $categories[] = new SafeCategory($categoryData);
            }
        }
        return $categories;
    }
}