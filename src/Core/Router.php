<?php
namespace Hackorama\Core;

/**
 * Simple router for Hackorama
 */
class Router
{
    public function route($path)
    {
        // Remove trailing slash
        $path = rtrim($path, '/');
        
        // Home page
        if ($path === '' || $path === '/') {
            return ['type' => 'home'];
        }
        
        // Category pages
        if (preg_match('/^\/category\/(\d+)/', $path, $matches)) {
            return ['type' => 'category', 'id' => $matches[1]];
        }
        
        // Product pages
        if (preg_match('/^\/product\/(\d+)/', $path, $matches)) {
            return ['type' => 'product', 'id' => $matches[1]];
        }
        
        // Static pages
        if (preg_match('/^\/page\/(\d+)/', $path, $matches)) {
            return ['type' => 'page', 'id' => $matches[1]];
        }
        
        // Basket
        if ($path === '/basket') {
            return ['type' => 'basket'];
        }
        
        // Add to basket
        if ($path === '/basket/add') {
            return ['type' => 'basket_add'];
        }
        
        // Search
        if ($path === '/search') {
            return ['type' => 'search'];
        }
        
        // Default to 404
        return ['type' => '404'];
    }
}