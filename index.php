<?php
/**
 * Hackorama - Local Shoporama Development Framework
 * Main entry point
 */

// Load configuration
$config = require __DIR__ . '/setup.php';

// Set error reporting - suppress deprecation warnings and notices
if ($config['debug']['enabled']) {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
    ini_set('display_errors', $config['debug']['show_errors'] ? 1 : 0);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// No need for sessions - using cookies and JSON files instead

// Include required files
require_once __DIR__ . '/src/Core/Autoloader.php';

// Initialize autoloader
$autoloader = new \Hackorama\Core\Autoloader();
$autoloader->register();

// Initialize Hackorama
try {
    $hackorama = new \Hackorama\Core\Hackorama($config);
    $hackorama->run();
} catch (Exception $e) {
    if ($config['debug']['enabled']) {
        echo '<h1>Error</h1>';
        echo '<pre>' . $e->getMessage() . '</pre>';
        echo '<pre>' . $e->getTraceAsString() . '</pre>';
    } else {
        echo '<h1>An error occurred</h1>';
        echo '<p>Please check the configuration and try again.</p>';
    }
}