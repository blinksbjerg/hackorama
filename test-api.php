<?php
/**
 * Test API connection
 */

require_once __DIR__ . '/src/Core/Autoloader.php';

$autoloader = new \Hackorama\Core\Autoloader();
$autoloader->register();

$config = require __DIR__ . '/setup.php';

try {
    $client = new \Hackorama\API\Client($config['api']);
    
    echo "Testing API connection to: " . $config['api']['host'] . "\n\n";
    
    // Test raw API response
    echo "Testing raw API response...\n";
    $ch = curl_init($config['api']['host'] . '/REST/category');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: ' . $config['api']['key'],
        'Accept: application/json'
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "HTTP Code: $httpCode\n";
    echo "Response: " . substr($response, 0, 200) . "...\n\n";
    
    // Test categories
    echo "Fetching categories...\n";
    $categories = $client->getCategories();
    echo "Found " . count($categories) . " categories\n";
    
    if (!empty($categories)) {
        $first = $categories[0];
        echo "First category: " . ($first['name'] ?? 'N/A') . " (ID: " . ($first['category_id'] ?? 'N/A') . ")\n";
    }
    
    echo "\n";
    
    // Test products
    echo "Fetching products...\n";
    $products = $client->getProducts(['limit' => 5]);
    echo "Found " . count($products) . " products\n";
    
    if (!empty($products)) {
        $first = $products[0];
        echo "First product: " . ($first['name'] ?? 'N/A') . " (ID: " . ($first['product_id'] ?? 'N/A') . ")\n";
        echo "Image: " . ($first['image'] ?? 'No image') . "\n";
        echo "Images array: ";
        if (!empty($first['images'])) {
            echo count($first['images']) . " images\n";
            echo "First image data:\n";
            print_r($first['images'][0]);
        } else {
            echo "No images array\n";
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}