<?php
namespace Hackorama\Wrappers;

/**
 * SafeOrderItem wrapper class
 */
class SafeOrderItem extends DefaultSafe
{
    public function getItemId()
    {
        return $this->data['item_id'] ?? 0;
    }
    
    public function getProductId()
    {
        return $this->data['product_id'] ?? 0;
    }
    
    public function getProductName()
    {
        return $this->data['product_name'] ?? '';
    }
    
    public function getProductSku()
    {
        return $this->data['product_sku'] ?? '';
    }
    
    public function getQuantity()
    {
        return $this->data['quantity'] ?? 1;
    }
    
    public function getAmount()
    {
        return $this->getQuantity();
    }
    
    public function getPrice()
    {
        return $this->data['price'] ?? 0.0;
    }
    
    public function getTotalPrice()
    {
        return $this->getPrice() * $this->getQuantity();
    }
    
    public function getVat()
    {
        return $this->data['vat'] ?? 0.0;
    }
    
    public function getProduct()
    {
        // If we have full product data, return a SafeProduct
        if (isset($this->data['product']) && is_array($this->data['product'])) {
            return new SafeProduct($this->data['product']);
        }
        return null;
    }
    
    public function getAttributes()
    {
        return $this->data['attributes'] ?? [];
    }
}