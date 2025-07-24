<?php
namespace Hackorama\Wrappers;

/**
 * SafeOrder wrapper class
 */
class SafeOrder extends DefaultSafe
{
    public function getOrderId()
    {
        return $this->data['order_id'] ?? 0;
    }
    
    public function getOrderNumber()
    {
        return $this->data['order_number'] ?? '';
    }
    
    public function getStatus()
    {
        return $this->data['status'] ?? '';
    }
    
    public function getStatusName()
    {
        // Map status codes to readable names
        $statusMap = [
            'pending' => 'Afventer',
            'processing' => 'Behandles',
            'shipped' => 'Sendt',
            'delivered' => 'Leveret',
            'cancelled' => 'Annulleret',
            'refunded' => 'Refunderet'
        ];
        
        $status = $this->getStatus();
        return $statusMap[$status] ?? $status;
    }
    
    public function getDate()
    {
        return $this->data['date'] ?? '';
    }
    
    public function getCreatedAt()
    {
        return $this->data['created_at'] ?? '';
    }
    
    public function getTotalPrice()
    {
        return $this->data['total_price'] ?? 0.0;
    }
    
    public function getSubtotal()
    {
        return $this->data['subtotal'] ?? 0.0;
    }
    
    public function getShippingPrice()
    {
        return $this->data['shipping_price'] ?? 0.0;
    }
    
    public function getVat()
    {
        return $this->data['vat'] ?? 0.0;
    }
    
    public function getCurrency()
    {
        return $this->data['currency'] ?? 'DKK';
    }
    
    public function getCustomerId()
    {
        return $this->data['customer_id'] ?? 0;
    }
    
    public function getCustomerName()
    {
        return $this->data['customer_name'] ?? '';
    }
    
    public function getCustomerEmail()
    {
        return $this->data['customer_email'] ?? '';
    }
    
    public function getShippingAddress()
    {
        return $this->data['shipping_address'] ?? [];
    }
    
    public function getBillingAddress()
    {
        return $this->data['billing_address'] ?? [];
    }
    
    public function getItems()
    {
        $items = [];
        if (isset($this->data['items']) && is_array($this->data['items'])) {
            foreach ($this->data['items'] as $itemData) {
                $items[] = new SafeOrderItem($itemData);
            }
        }
        return $items;
    }
    
    public function getPaymentMethod()
    {
        return $this->data['payment_method'] ?? '';
    }
    
    public function getShippingMethod()
    {
        return $this->data['shipping_method'] ?? '';
    }
    
    public function getTrackingNumber()
    {
        return $this->data['tracking_number'] ?? '';
    }
    
    public function getNotes()
    {
        return $this->data['notes'] ?? '';
    }
}