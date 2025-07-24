<!DOCTYPE html>
<html>
<head>
    <title>Hackorama Visual Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .status { padding: 10px; margin: 10px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
        iframe { width: 100%; height: 600px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Hackorama Visual Test</h1>
    
    <?php
    require_once __DIR__ . '/src/Core/Autoloader.php';
    $autoloader = new \Hackorama\Core\Autoloader();
    $autoloader->register();
    $config = require __DIR__ . '/setup.php';
    
    try {
        $client = new \Hackorama\API\Client($config['api']);
        $products = $client->getProducts(['limit' => 3]);
        ?>
        <div class="status success">
            ✓ API Connection OK - Found <?= count($products) ?> products
        </div>
        <?php
    } catch (Exception $e) {
        ?>
        <div class="status error">
            ✗ API Error: <?= htmlspecialchars($e->getMessage()) ?>
        </div>
        <?php
    }
    ?>
    
    <h2>Homepage Preview:</h2>
    <iframe src="/" frameborder="0"></iframe>
    
    <h2>Product Data:</h2>
    <pre><?php 
    if (!empty($products)) {
        echo "First product:\n";
        print_r($products[0]);
    }
    ?></pre>
</body>
</html>