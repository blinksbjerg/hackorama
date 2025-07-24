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
        
        // Landing pages
        if (preg_match('/^\/landing\/(\d+)/', $path, $matches)) {
            return ['type' => 'landing_page', 'id' => $matches[1]];
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
        
        // Customer pages
        if ($path === '/user-sign-in') {
            return ['type' => 'user-sign-in'];
        }
        if ($path === '/user-sign-up') {
            return ['type' => 'user-sign-up'];
        }
        if ($path === '/user-sign-out') {
            return ['type' => 'user-sign-out'];
        }
        if ($path === '/user-edit') {
            return ['type' => 'user-edit'];
        }
        if ($path === '/user-orders') {
            return ['type' => 'user-orders'];
        }
        
        // Checkout pages
        if ($path === '/address') {
            return ['type' => 'address'];
        }
        if ($path === '/shipping') {
            return ['type' => 'shipping'];
        }
        if ($path === '/payment') {
            return ['type' => 'payment'];
        }
        
        // Landing pages by slug (must be last to avoid conflicts)
        if (preg_match('/^\/([a-z0-9\-]+)$/', $path, $matches)) {
            return ['type' => 'landing_page_slug', 'slug' => $matches[1]];
        }
        
        // Default to 404
        return ['type' => '404'];
    }
}