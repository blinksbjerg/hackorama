<?php
namespace Hackorama\Wrappers;

/**
 * SafeMenu wrapper class
 */
class SafeMenu extends DefaultSafe
{
    public function getMenuId()
    {
        return $this->data['menu_id'] ?? 0;
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
    
    public function getPosition()
    {
        return $this->data['position'] ?? 0;
    }
    
    public function getType()
    {
        return $this->data['type'] ?? 'menu';
    }
    
    public function getItems()
    {
        $items = [];
        if (isset($this->data['items']) && is_array($this->data['items'])) {
            foreach ($this->data['items'] as $itemData) {
                $items[] = new SafeMenuItem($itemData);
            }
        }
        return $items;
    }
    
    public function getVisible()
    {
        return $this->data['visible'] ?? true;
    }
    
    public function isVisible()
    {
        return $this->getVisible();
    }
}