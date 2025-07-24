<?php
namespace Hackorama\Wrappers;

/**
 * Base class for all Safe wrappers
 * Mimics Shoporama's DefaultSafe behavior
 */
abstract class DefaultSafe
{
    protected $data;
    protected $allowedMethods = [];
    
    public function __construct($data = [])
    {
        $this->data = $data;
    }
    
    public function __call($method, $args)
    {
        // Check if method is allowed
        if (!in_array($method, $this->allowedMethods)) {
            throw new \Exception("Method $method is not allowed on " . get_class($this));
        }
        
        // Handle getter methods
        if (strpos($method, 'get') === 0) {
            $property = lcfirst(substr($method, 3));
            return $this->getProperty($property);
        }
        
        return null;
    }
    
    protected function getProperty($property)
    {
        // Convert camelCase to snake_case
        $property = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $property));
        
        return $this->data[$property] ?? null;
    }
    
    public function __get($property)
    {
        throw new \Exception("Direct property access is not allowed. Use getter methods instead.");
    }
    
    public function __set($property, $value)
    {
        throw new \Exception("Direct property modification is not allowed.");
    }
}