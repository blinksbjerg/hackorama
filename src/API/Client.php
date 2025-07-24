<?php
namespace Hackorama\API;

/**
 * API Client for Shoporama REST API
 */
class Client
{
    private $config;
    private $baseUrl;
    private $apiKey;
    private $cacheDir;
    
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->baseUrl = rtrim($config['host'], '/') . '/REST';
        $this->apiKey = $config['key'];
        $this->cacheDir = dirname(dirname(__DIR__)) . '/cache/api/';
        
        // Create cache directory if it doesn't exist
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
    }
    
    private function request($endpoint, $params = [])
    {
        // Build URL
        $url = $this->baseUrl . $endpoint;
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        // Check cache first
        $cacheKey = md5($url);
        $cacheFile = $this->cacheDir . $cacheKey . '.json';
        
        if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < 3600)) {
            $data = file_get_contents($cacheFile);
            return json_decode($data, true);
        }
        
        // Make request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        // Add Authorization header with API key
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $this->apiKey,
            'Accept: application/json'
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode !== 200) {
            throw new \Exception("API request failed with HTTP code: $httpCode");
        }
        
        // Cache response
        file_put_contents($cacheFile, $response);
        
        return json_decode($response, true);
    }
    
    public function getCategories($params = [])
    {
        try {
            $response = $this->request('/category', $params);
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getCategory($id)
    {
        try {
            $response = $this->request('/category/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getProducts($params = [])
    {
        try {
            $response = $this->request('/product', $params);
            // Products come in a structure with 'products' array and 'paging' info
            if (isset($response['products'])) {
                return $response['products'];
            }
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getProduct($id)
    {
        try {
            $response = $this->request('/product/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getPages($params = [])
    {
        try {
            $response = $this->request('/page', $params);
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getPage($id)
    {
        try {
            $response = $this->request('/page/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getCustomers($params = [])
    {
        try {
            $response = $this->request('/customer', $params);
            // Customers come in a structure with 'customers' array and 'paging' info
            if (isset($response['customers'])) {
                return $response['customers'];
            }
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getCustomer($id)
    {
        try {
            $response = $this->request('/customer/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getShippingMethods($params = [])
    {
        try {
            $response = $this->request('/shipping', $params);
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getShippingMethod($id)
    {
        try {
            $response = $this->request('/shipping/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getVouchers($params = [])
    {
        try {
            $response = $this->request('/voucher', $params);
            // Vouchers come in a structure with 'vouchers' array and 'paging' info
            if (isset($response['vouchers'])) {
                return $response['vouchers'];
            }
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getVoucher($id)
    {
        try {
            $response = $this->request('/voucher/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getMenus($params = [])
    {
        try {
            $response = $this->request('/menu', $params);
            // Menus come in a structure with 'menus' array and 'paging' info
            if (isset($response['menus'])) {
                return $response['menus'];
            }
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getMenu($id)
    {
        try {
            $response = $this->request('/menu/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getLandingPages($params = [])
    {
        try {
            $response = $this->request('/landing-page', $params);
            // Landing pages come in a structure with 'landing_pages' array and 'paging' info
            if (isset($response['landing_pages'])) {
                return $response['landing_pages'];
            }
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getLandingPage($id)
    {
        try {
            $response = $this->request('/landing-page/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
    public function getOrders($params = [])
    {
        try {
            $response = $this->request('/order', $params);
            // Orders come in a structure with 'orders' array and 'paging' info
            if (isset($response['orders'])) {
                return $response['orders'];
            }
            return $response ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
    
    public function getOrder($id)
    {
        try {
            $response = $this->request('/order/' . $id);
            return $response ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
}