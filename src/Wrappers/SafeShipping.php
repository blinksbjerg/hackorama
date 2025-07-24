<?php
namespace Hackorama\Wrappers;

class SafeShipping extends DefaultSafe
{
    public function getShippingId()
    {
        return $this->data['shipping_id'] ?? 0;
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getDescription()
    {
        return $this->data['description'] ?? '';
    }
    
    public function getPrice()
    {
        return (float)($this->data['price'] ?? 0);
    }
    
    public function getFormattedPrice()
    {
        return number_format($this->getPrice(), 2, ',', '.');
    }
    
    public function getIsFree()
    {
        return $this->getPrice() == 0;
    }
    
    public function getFreeFromAmount()
    {
        return (float)($this->data['free_from_amount'] ?? 0);
    }
    
    public function getMinAmount()
    {
        return (float)($this->data['min_amount'] ?? 0);
    }
    
    public function getMaxAmount()
    {
        return (float)($this->data['max_amount'] ?? null);
    }
    
    public function getMinWeight()
    {
        return (float)($this->data['min_weight'] ?? 0);
    }
    
    public function getMaxWeight()
    {
        return (float)($this->data['max_weight'] ?? null);
    }
    
    public function getCountries()
    {
        return $this->data['countries'] ?? ['DK'];
    }
    
    public function isAvailableForCountry($country)
    {
        $countries = $this->getCountries();
        return empty($countries) || in_array($country, $countries);
    }
    
    public function getDeliveryTime()
    {
        return $this->data['delivery_time'] ?? '1-3 hverdage';
    }
    
    public function getCarrier()
    {
        return $this->data['carrier'] ?? '';
    }
    
    public function getCarrierCode()
    {
        return $this->data['carrier_code'] ?? '';
    }
    
    public function getRequiresAddress()
    {
        return $this->data['requires_address'] ?? true;
    }
    
    public function getIsPickup()
    {
        return $this->data['is_pickup'] ?? false;
    }
    
    public function getPickupLocations()
    {
        return $this->data['pickup_locations'] ?? [];
    }
    
    public function getTrackingUrl()
    {
        return $this->data['tracking_url'] ?? '';
    }
    
    public function getSortOrder()
    {
        return $this->data['sort_order'] ?? 0;
    }
    
    public function getIsActive()
    {
        return $this->data['is_active'] ?? true;
    }
    
    public function getIcon()
    {
        return $this->data['icon'] ?? '';
    }
    
    public function getExcludedPostalCodes()
    {
        return $this->data['excluded_postal_codes'] ?? [];
    }
    
    public function isAvailableForPostalCode($postalCode)
    {
        $excluded = $this->getExcludedPostalCodes();
        if (empty($excluded)) {
            return true;
        }
        
        foreach ($excluded as $pattern) {
            if (fnmatch($pattern, $postalCode)) {
                return false;
            }
        }
        
        return true;
    }
    
    public function getRequiredCustomerGroups()
    {
        return $this->data['required_customer_groups'] ?? [];
    }
    
    public function isAvailableForCustomer($customer)
    {
        $requiredGroups = $this->getRequiredCustomerGroups();
        if (empty($requiredGroups)) {
            return true;
        }
        
        if (!$customer) {
            return false;
        }
        
        foreach ($requiredGroups as $groupId) {
            if ($customer->isInGroup($groupId)) {
                return true;
            }
        }
        
        return false;
    }
    
    public function calculatePrice($basketTotal, $weight = 0)
    {
        // Check if free shipping applies
        if ($this->getFreeFromAmount() > 0 && $basketTotal >= $this->getFreeFromAmount()) {
            return 0;
        }
        
        // Check weight limits
        if ($this->getMaxWeight() && $weight > $this->getMaxWeight()) {
            return null; // Not available
        }
        
        if ($weight < $this->getMinWeight()) {
            return null; // Not available
        }
        
        // Check amount limits
        if ($this->getMaxAmount() && $basketTotal > $this->getMaxAmount()) {
            return null; // Not available
        }
        
        if ($basketTotal < $this->getMinAmount()) {
            return null; // Not available
        }
        
        return $this->getPrice();
    }
    
    public function getPaymentMethods()
    {
        return $this->data['payment_methods'] ?? [];
    }
    
    public function supportsPaymentMethod($paymentMethodId)
    {
        $methods = $this->getPaymentMethods();
        return empty($methods) || in_array($paymentMethodId, $methods);
    }
}