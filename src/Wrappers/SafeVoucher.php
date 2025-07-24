<?php
namespace Hackorama\Wrappers;

class SafeVoucher extends DefaultSafe
{
    public function getCode()
    {
        return $this->data['code'] ?? '';
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getDescription()
    {
        return $this->data['description'] ?? '';
    }
    
    public function getPercentDiscount()
    {
        return (float)($this->data['percent_discount'] ?? 0);
    }
    
    public function getPriceDiscount()
    {
        return (float)($this->data['price_discount'] ?? 0);
    }
    
    public function getFreeShipping()
    {
        return $this->data['free_shipping'] ?? false;
    }
    
    public function getMinAmount()
    {
        return (float)($this->data['min_amount'] ?? 0);
    }
    
    public function getMaxUses()
    {
        return $this->data['max_uses'] ?? null;
    }
    
    public function getUsedCount()
    {
        return $this->data['used_count'] ?? 0;
    }
    
    public function getStartDate()
    {
        return $this->data['start_date'] ?? null;
    }
    
    public function getEndDate()
    {
        return $this->data['end_date'] ?? null;
    }
    
    public function getIsActive()
    {
        return $this->data['is_active'] ?? true;
    }
    
    public function getRequiresLogin()
    {
        return $this->data['requires_login'] ?? false;
    }
    
    public function getCustomerGroups()
    {
        return $this->data['customer_groups'] ?? [];
    }
    
    public function getProducts()
    {
        return $this->data['products'] ?? [];
    }
    
    public function getCategories()
    {
        return $this->data['categories'] ?? [];
    }
    
    public function isValidForCustomer($customer)
    {
        // Check if requires login
        if ($this->getRequiresLogin() && !$customer) {
            return false;
        }
        
        // Check customer groups
        $groups = $this->getCustomerGroups();
        if (!empty($groups) && $customer) {
            $hasGroup = false;
            foreach ($groups as $groupId) {
                if ($customer->isInGroup($groupId)) {
                    $hasGroup = true;
                    break;
                }
            }
            if (!$hasGroup) {
                return false;
            }
        }
        
        return true;
    }
    
    public function isValidForAmount($amount)
    {
        return $amount >= $this->getMinAmount();
    }
    
    public function isValidForProduct($productId)
    {
        $products = $this->getProducts();
        if (empty($products)) {
            return true; // Valid for all products
        }
        
        return in_array($productId, $products);
    }
    
    public function isValidForCategory($categoryId)
    {
        $categories = $this->getCategories();
        if (empty($categories)) {
            return true; // Valid for all categories
        }
        
        return in_array($categoryId, $categories);
    }
    
    public function calculateDiscount($basketTotal, $shippingPrice = 0)
    {
        $discount = 0;
        
        // Percent discount
        if ($this->getPercentDiscount() > 0) {
            $discount = $basketTotal * ($this->getPercentDiscount() / 100);
        }
        
        // Fixed price discount
        if ($this->getPriceDiscount() > 0) {
            $discount = $this->getPriceDiscount();
        }
        
        // Make sure discount doesn't exceed basket total
        if ($discount > $basketTotal) {
            $discount = $basketTotal;
        }
        
        return $discount;
    }
    
    public function getType()
    {
        if ($this->getPercentDiscount() > 0) {
            return 'percent';
        }
        if ($this->getPriceDiscount() > 0) {
            return 'fixed';
        }
        if ($this->getFreeShipping()) {
            return 'free_shipping';
        }
        return 'unknown';
    }
}