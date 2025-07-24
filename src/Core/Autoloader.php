<?php
namespace Hackorama\Core;

/**
 * PSR-4 Autoloader for Hackorama
 */
class Autoloader
{
    private $baseDir;
    
    public function __construct()
    {
        $this->baseDir = dirname(__DIR__);
    }
    
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }
    
    public function loadClass($className)
    {
        // Check if it's a Hackorama class
        if (strpos($className, 'Hackorama\\') !== 0) {
            return;
        }
        
        // Remove namespace prefix and convert to file path
        $relativeClass = substr($className, 10); // Remove 'Hackorama\'
        $file = $this->baseDir . '/' . str_replace('\\', '/', $relativeClass) . '.php';
        
        if (file_exists($file)) {
            require $file;
        }
    }
}