<?php
namespace Hackorama\Wrappers;

class SafeCustomer extends DefaultSafe
{
    public function getCustomerId()
    {
        return $this->data['customer_id'] ?? 0;
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getEmail()
    {
        return $this->data['email'] ?? '';
    }
    
    public function getPhone()
    {
        return $this->data['phone'] ?? '';
    }
    
    public function getAddress()
    {
        return $this->data['address'] ?? '';
    }
    
    public function getZip()
    {
        return $this->data['zip'] ?? '';
    }
    
    public function getCity()
    {
        return $this->data['city'] ?? '';
    }
    
    public function getCountry()
    {
        return $this->data['country'] ?? 'DK';
    }
    
    public function getCountryName()
    {
        $countries = [
            'DK' => 'Danmark',
            'SE' => 'Sverige',
            'NO' => 'Norge',
            'DE' => 'Tyskland'
        ];
        $country = $this->getCountry();
        return $countries[$country] ?? $country;
    }
    
    public function getCompany()
    {
        return $this->data['company'] ?? '';
    }
    
    public function getCvr()
    {
        return $this->data['cvr'] ?? '';
    }
    
    public function getEan()
    {
        return $this->data['ean'] ?? '';
    }
    
    public function getActivePoints()
    {
        return $this->data['active_points'] ?? 0;
    }
    
    public function getPendingPoints()
    {
        return $this->data['pending_points'] ?? 0;
    }
    
    public function getTotalPoints()
    {
        return $this->getActivePoints() + $this->getPendingPoints();
    }
    
    public function getNewsletterSignup()
    {
        return $this->data['newsletter_signup'] ?? false;
    }
    
    public function getCreated()
    {
        return $this->data['created'] ?? date('Y-m-d H:i:s');
    }
    
    public function getLastLogin()
    {
        return $this->data['last_login'] ?? null;
    }
    
    public function getIsActive()
    {
        return $this->data['is_active'] ?? true;
    }
    
    public function getGroups()
    {
        return $this->data['groups'] ?? [];
    }
    
    public function isInGroup($groupId)
    {
        $groups = $this->getGroups();
        return in_array($groupId, $groups);
    }
    
    public function getDeliveryAddress()
    {
        if (isset($this->data['delivery_address'])) {
            return $this->data['delivery_address'];
        }
        
        // Return main address as delivery address if not set
        return [
            'name' => $this->getName(),
            'address' => $this->getAddress(),
            'zip' => $this->getZip(),
            'city' => $this->getCity(),
            'country' => $this->getCountry()
        ];
    }
    
    public function getInvoiceAddress()
    {
        if (isset($this->data['invoice_address'])) {
            return $this->data['invoice_address'];
        }
        
        // Return main address as invoice address if not set
        return [
            'name' => $this->getName(),
            'company' => $this->getCompany(),
            'address' => $this->getAddress(),
            'zip' => $this->getZip(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'cvr' => $this->getCvr(),
            'ean' => $this->getEan()
        ];
    }
    
    public function getCustomerNumber()
    {
        return $this->data['customer_number'] ?? $this->getCustomerId();
    }
    
    public function getDiscountPercent()
    {
        return $this->data['discount_percent'] ?? 0;
    }
    
    public function getBirthdate()
    {
        return $this->data['birthdate'] ?? null;
    }
    
    public function getGender()
    {
        return $this->data['gender'] ?? null;
    }
    
    public function getComment()
    {
        return $this->data['comment'] ?? '';
    }
    
    public function getTags()
    {
        return $this->data['tags'] ?? [];
    }
    
    public function hasTag($tag)
    {
        return in_array($tag, $this->getTags());
    }
    
    // Authentication method - always returns true with password "password"
    public function checkPassword($password)
    {
        // As documented, password is always "password" in Hackorama
        return $password === 'password';
    }
    
    public function getOrders()
    {
        // Would need to implement order fetching
        return [];
    }
    
    public function getWishlists()
    {
        // Would need to implement wishlist fetching
        return [];
    }
}