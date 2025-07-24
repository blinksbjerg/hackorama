<?php
/**
 * Hackorama Configuration
 */

return [
    // API Configuration
    'api' => [
        'key' => '', // API key should be set here
        'host' => 'https://www.shoporama.dk',
    ],

    // Theme Configuration
    'theme' => [
        'path' => __DIR__ . '/themes/Alaska2', // Path to theme directory
    ],

    // Local URL Configuration
    'local_url' => 'http://localhost:8080', // URL where Hackorama can be accessed

    // Cache Configuration
    'cache' => [
        'enabled' => true,
        'ttl' => 3600, // Cache TTL in seconds (1 hour)
        'path' => __DIR__ . '/cache',
    ],

    // Smarty Configuration
    'smarty' => [
        'version' => 4, // Smarty version (2 or 4)
        'compile_dir' => __DIR__ . '/cache/smarty_compile',
        'cache_dir' => __DIR__ . '/cache/smarty_cache',
        'left_delimiter' => '<{',
        'right_delimiter' => '}>',
    ],

    // Debug Configuration
    'debug' => [
        'enabled' => true,
        'show_errors' => true,
    ],
];