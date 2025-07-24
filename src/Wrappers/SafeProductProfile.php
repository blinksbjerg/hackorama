<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for Product Profile objects
 */
class SafeProductProfile extends DefaultSafe
{
    protected $allowedMethods = [
        'getAttributeList',
        'getAttributes',
        'getId',
        'getName',
        'getTag',
        'getProfileId',
    ];
    
    public function getAttributeList()
    {
        // Return attributes list
        return $this->data['attributes'] ?? [];
    }
    
    public function getAttributes()
    {
        return $this->getAttributeList();
    }
    
    public function getId()
    {
        return $this->data['id'] ?? 0;
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getTag()
    {
        return $this->data['tag'] ?? '';
    }
    
    public function getProfileId()
    {
        return $this->getId();
    }
}