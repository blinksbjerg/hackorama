<?php
// Debug script to test basic functionality
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Hackorama Debug</h1>";

// Test 1: Check if config loads
echo "<h2>1. Loading config</h2>";
try {
    $config = require __DIR__ . '/setup.php';
    echo "<pre>Config loaded successfully:\n";
    print_r($config);
    echo "</pre>";
} catch (Exception $e) {
    echo "<p style='color:red'>Error loading config: " . $e->getMessage() . "</p>";
}

// Test 2: Check autoloader
echo "<h2>2. Testing autoloader</h2>";
try {
    require_once __DIR__ . '/src/Core/Autoloader.php';
    $autoloader = new \Hackorama\Core\Autoloader();
    $autoloader->register();
    echo "<p style='color:green'>Autoloader registered successfully</p>";
} catch (Exception $e) {
    echo "<p style='color:red'>Error with autoloader: " . $e->getMessage() . "</p>";
}

// Test 3: Check API Client
echo "<h2>3. Testing API Client</h2>";
try {
    $client = new \Hackorama\API\Client($config['api']);
    echo "<p style='color:green'>API Client created successfully</p>";
    
    // Test API call
    $categories = $client->getCategories(['limit' => 1]);
    echo "<p>Found " . count($categories) . " categories</p>";
    
    // Test landing pages
    echo "<h3>Testing Landing Pages</h3>";
    $landingPages = $client->getLandingPages();
    echo "<p>Found " . count($landingPages) . " landing pages</p>";
    if (!empty($landingPages)) {
        echo "<pre>First landing page:\n";
        print_r($landingPages[0]);
        echo "</pre>";
    }
    
    // Test specific landing page 591
    echo "<h3>Testing Landing Page 591</h3>";
    $landingPage591 = $client->getLandingPage(591);
    if ($landingPage591) {
        echo "<p style='color:green'>Landing page 591 found!</p>";
        echo "<pre>";
        print_r($landingPage591);
        echo "</pre>";
    } else {
        echo "<p style='color:red'>Landing page 591 not found</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red'>Error with API Client: " . $e->getMessage() . "</p>";
}

// Test 4: Check Smarty
echo "<h2>4. Testing Smarty</h2>";
try {
    if (file_exists('/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/Smarty.class.php')) {
        echo "<p style='color:green'>Smarty 4 found</p>";
    } else {
        echo "<p style='color:red'>Smarty 4 not found at expected location</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red'>Error checking Smarty: " . $e->getMessage() . "</p>";
}

// Test 5: Check theme directory
echo "<h2>5. Testing theme directory</h2>";
$themeDir = $config['theme']['path'];
if (is_dir($themeDir)) {
    echo "<p style='color:green'>Theme directory exists: $themeDir</p>";
    if (is_dir($themeDir . '/templates')) {
        echo "<p style='color:green'>Templates directory exists</p>";
    } else {
        echo "<p style='color:red'>Templates directory missing</p>";
    }
} else {
    echo "<p style='color:red'>Theme directory not found: $themeDir</p>";
}

// Test 6: Check cache directories
echo "<h2>6. Testing cache directories</h2>";
$dirs = [
    'cache' => __DIR__ . '/cache',
    'api cache' => __DIR__ . '/cache/api',
    'smarty compile' => $config['smarty']['compile_dir'],
    'smarty cache' => $config['smarty']['cache_dir'],
];

foreach ($dirs as $name => $dir) {
    if (is_dir($dir)) {
        echo "<p style='color:green'>$name exists: $dir</p>";
    } else {
        echo "<p style='color:orange'>$name missing (will be created): $dir</p>";
    }
}