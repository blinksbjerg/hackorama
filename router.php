<?php
/**
 * Router for PHP built-in webserver
 * Usage: php -S localhost:8080 router.php
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Allow direct access to PHP test files
if (preg_match('/\.php$/i', $uri) && $uri !== '/index.php' && file_exists(__DIR__ . $uri)) {
    require __DIR__ . $uri;
    return true;
}

// Allow access to theme assets and cache images
if (preg_match('/\.(css|js|jpg|jpeg|png|gif|svg|ico|woff|woff2|ttf|eot)$/i', $uri)) {
    // Handle cache images with automatic download
    if (strpos($uri, '/cache/') === 0) {
        $config = require __DIR__ . '/setup.php';
        require_once __DIR__ . '/src/Core/ImageCache.php';
        $imageCache = new \Hackorama\Core\ImageCache($config);
        
        if ($imageCache->serveImage($uri)) {
            return true;
        }
        // If image cache fails, try local file
        $filePath = __DIR__ . '/public' . $uri;
    }
    // Then check if it's a theme file with full path
    elseif (strpos($uri, '/themes/') === 0) {
        $filePath = __DIR__ . $uri;
    } else {
        // Otherwise check in theme directory
        $filePath = __DIR__ . '/themes/Alaska2' . $uri;
    }
    
    if (isset($filePath) && file_exists($filePath)) {
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'woff' => 'application/font-woff',
            'woff2' => 'application/font-woff2',
            'ttf' => 'application/x-font-ttf',
            'eot' => 'application/vnd.ms-fontobject',
        ];
        
        $ext = strtolower(pathinfo($uri, PATHINFO_EXTENSION));
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
        }
        
        readfile($filePath);
        return true;
    }
}

// All other requests go to index.php
require __DIR__ . '/index.php';