<?php
namespace Hackorama\Wrappers;

/**
 * SafeMenuItem wrapper class
 */
class SafeMenuItem extends DefaultSafe
{
    public function getItemId()
    {
        return $this->data['item_id'] ?? 0;
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getTitle()
    {
        return $this->data['title'] ?? $this->getName();
    }
    
    public function getTitel()
    {
        // Handle Danish spelling used in templates
        return $this->data['titel'] ?? $this->data['title'] ?? $this->getName();
    }
    
    public function getUrl()
    {
        // Always return local URLs instead of external cached_url
        $type = $this->getType();
        $val = $this->data['val'] ?? '';
        
        switch ($type) {
            case 'category':
                return "/category/{$val}";
            case 'landing_page':
                return "/landing/{$val}";
            case 'url':
                // For URL type, use the val as the path
                return "/{$val}";
            default:
                // Fallback to cached_url only if we can't determine local URL
                if (isset($this->data['cached_url'])) {
                    // Extract path from cached_url if it's external
                    $cachedUrl = $this->data['cached_url'];
                    if (strpos($cachedUrl, 'http') === 0) {
                        $parsedUrl = parse_url($cachedUrl);
                        return $parsedUrl['path'] ?? '/';
                    }
                    return $cachedUrl;
                }
                return $this->data['url'] ?? '';
        }
    }
    
    public function getType()
    {
        return $this->data['type'] ?? 'link';
    }
    
    public function getPosition()
    {
        return $this->data['position'] ?? 0;
    }
    
    public function getParentId()
    {
        return $this->data['parent_id'] ?? 0;
    }
    
    public function getVisible()
    {
        return $this->data['visible'] ?? true;
    }
    
    public function isVisible()
    {
        return $this->getVisible();
    }
    
    public function getTarget()
    {
        return $this->data['target'] ?? '_self';
    }
    
    public function getClass()
    {
        return $this->data['class'] ?? '';
    }
    
    public function getSubItems()
    {
        $items = [];
        if (isset($this->data['sub_items']) && is_array($this->data['sub_items'])) {
            foreach ($this->data['sub_items'] as $itemData) {
                $items[] = new SafeMenuItem($itemData);
            }
        }
        return $items;
    }
}