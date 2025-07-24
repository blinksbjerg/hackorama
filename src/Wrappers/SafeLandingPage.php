<?php
namespace Hackorama\Wrappers;

/**
 * SafeLandingPage wrapper class
 */
class SafeLandingPage extends DefaultSafe
{
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
                $products[] = new SafeProduct($productData);
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