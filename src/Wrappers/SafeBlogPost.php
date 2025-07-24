<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for BlogPost data
 */
class SafeBlogPost extends DefaultSafe
{
    public function getBlogPostId()
    {
        return $this->data['blog_post_id'] ?? 0;
    }
    
    public function getTitle()
    {
        return $this->data['title'] ?? '';
    }
    
    public function getName()
    {
        return $this->getTitle();
    }
    
    public function getContent()
    {
        return $this->data['content'] ?? '';
    }
    
    public function getIntro()
    {
        return $this->data['intro'] ?? '';
    }
    
    public function getSlug()
    {
        return $this->data['slug'] ?? '';
    }
    
    public function getCreatedAt()
    {
        return $this->data['created_at'] ?? '';
    }
    
    public function getUpdatedAt()
    {
        return $this->data['updated_at'] ?? '';
    }
    
    public function getImage()
    {
        if (!empty($this->data['image'])) {
            return new SafeImage($this->data['image']);
        }
        return null;
    }
    
    public function getTags()
    {
        if (isset($this->data['tags']) && is_array($this->data['tags'])) {
            return $this->data['tags'];
        }
        return [];
    }
    
    public function getAuthor()
    {
        return $this->data['author'] ?? '';
    }
    
    public function getPublished()
    {
        return $this->data['published'] ?? false;
    }
    
    public function getMetaTitle()
    {
        return $this->data['meta_title'] ?? $this->getTitle();
    }
    
    public function getMetaDescription()
    {
        return $this->data['meta_description'] ?? '';
    }
    
    public function getRemoteUrl()
    {
        return '/blog/' . $this->getBlogPostId();
    }
    
    public function getUrl()
    {
        return 'blog/' . $this->getBlogPostId();
    }
    
    public function getCreated()
    {
        return $this->getCreatedAt();
    }
    
    public function getUserName()
    {
        return $this->getAuthor();
    }
    
    public function getBody()
    {
        return $this->getContent();
    }
    
    public function getImages()
    {
        if (!empty($this->data['images']) && is_array($this->data['images'])) {
            $images = [];
            foreach ($this->data['images'] as $imageData) {
                $images[] = new SafeImage($imageData);
            }
            return $images;
        }
        
        // If single image, return as array
        if (!empty($this->data['image'])) {
            return [new SafeImage($this->data['image'])];
        }
        
        return [];
    }
    
    public function getCategories()
    {
        if (isset($this->data['categories']) && is_array($this->data['categories'])) {
            return $this->data['categories'];
        }
        return [];
    }
    
    public function getProducts()
    {
        if (isset($this->data['products']) && is_array($this->data['products'])) {
            return $this->data['products'];
        }
        return [];
    }
}