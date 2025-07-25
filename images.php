<?php
/**
 * Image proxy that automatically downloads missing cache images from mortensbutik.dk
 * Usage: /images.php?path=/cache/1/0/8/7/2/box-300x400x90.png
 */

require_once __DIR__ . '/src/Core/ImageCache.php';

// Get requested path
$path = $_GET['path'] ?? '';

// Security check - only allow cache paths
if (empty($path) || strpos($path, '/cache/') !== 0) {
    http_response_code(400);
    echo 'Invalid path';
    exit;
}

// Validate path format
if (!preg_match('#^/cache/\d+/\d+/\d+/\d+/\d+/[a-zA-Z0-9_-]+\.(png|jpg|jpeg|gif)$#', $path)) {
    http_response_code(400);
    echo 'Invalid cache path format';
    exit;
}

// Initialize image cache
$imageCache = new \Hackorama\Core\ImageCache();

// Serve the image (download if missing)
if (!$imageCache->serveImage($path)) {
    http_response_code(404);
    echo 'Image not found';
}