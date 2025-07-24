<?php
// Test output to see what's happening

require_once __DIR__ . '/src/Core/Autoloader.php';

$autoloader = new \Hackorama\Core\Autoloader();
$autoloader->register();

$config = require __DIR__ . '/setup.php';

try {
    $client = new \Hackorama\API\Client($config['api']);
    
    // Get some products
    $products = $client->getProducts(['limit' => 3]);
    
    echo "<h1>Test Output</h1>";
    echo "<h2>Products from API:</h2>";
    echo "<pre>";
    print_r($products);
    echo "</pre>";
    
    // Test wrapper
    echo "<h2>Wrapped Products:</h2>";
    foreach ($products as $productData) {
        $product = new \Hackorama\Wrappers\SafeProduct($productData);
        echo "<div>";
        echo "<h3>" . htmlspecialchars($product->getName()) . "</h3>";
        echo "<p>Price: " . $product->getPrice() . "</p>";
        echo "<p>ID: " . $product->getId() . "</p>";
        echo "<p>URL: " . $product->getUrl() . "</p>";
        echo "</div>";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}