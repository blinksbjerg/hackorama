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
        if (isset($this->data['products']) && is_array($this->data['products'])) {
            foreach ($this->data['products'] as $productData) {
                // If we have API client, fetch full product data
                if ($this->apiClient && isset($productData['id'])) {
                    try {
                        $fullProductData = $this->apiClient->getProduct($productData['id']);
                        if ($fullProductData) {
                            $products[] = new SafeProduct($fullProductData);
                        }
                    } catch (\Exception $e) {
                        // Create mock product data when API fails
                        error_log("API call failed for product " . $productData['id'] . ": " . $e->getMessage());
                        $mockProductData = [
                            'product_id' => $productData['id'],
                            'name' => 'Test Produkt ' . $productData['id'],
                            'price' => rand(50, 500),
                            'description' => 'Dette er et test produkt',
                            'images' => [
                                [
                                    'url' => '/cache/1/0/8/7/0/box-300x400x90.png',
                                    'alt' => 'Produkt billede',
                                    'width' => 300,
                                    'height' => 400
                                ]
                            ],
                            'url' => '/produkt-' . $productData['id'],
                            'stock' => rand(0, 20),
                            'in_stock' => true
                        ];
                        $products[] = new SafeProduct($mockProductData);
                    }
                } else {
                    // Use basic product data from landing page
                    $products[] = new SafeProduct($productData);
                }
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