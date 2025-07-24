<?php
namespace Hackorama\Core;

/**
 * Template engine wrapper for Smarty
 */
class Template
{
    private $smarty;
    private $config;
    
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->initializeSmarty();
    }
    
    private function initializeSmarty()
    {
        // Determine Smarty version and load appropriate class
        if ($this->config['smarty']['version'] == 4) {
            require_once '/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/Smarty.class.php';
        } else {
            require_once '/Users/mbn/www/lamplite/0.1/includes/Smarty-2.6.26/Smarty.class.php';
        }
        
        $this->smarty = new \Smarty();
        
        // Configure Smarty
        $this->smarty->template_dir = $this->config['theme']['path'] . '/templates/';
        $this->smarty->compile_dir = $this->config['smarty']['compile_dir'];
        $this->smarty->cache_dir = $this->config['smarty']['cache_dir'];
        $this->smarty->left_delimiter = $this->config['smarty']['left_delimiter'];
        $this->smarty->right_delimiter = $this->config['smarty']['right_delimiter'];
        
        // Create directories if they don't exist
        if (!is_dir($this->smarty->compile_dir)) {
            mkdir($this->smarty->compile_dir, 0777, true);
        }
        if (!is_dir($this->smarty->cache_dir)) {
            mkdir($this->smarty->cache_dir, 0777, true);
        }
        
        // Smarty 4 already has t, css, and js plugins built-in
        // No need to register them again
        
        // Set default theme URL
        $this->smarty->assign('theme_url', '/themes/Alaska2');
    }
    
    public function assign($data)
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
    }
    
    public function display($template)
    {
        try {
            // Capture the inner template content
            $contents = $this->smarty->fetch($template);
            
            // Assign contents to be used in global.html
            $this->smarty->assign('contents', $contents);
            
            // Display global.html which will include the contents
            $this->smarty->display('global.html');
        } catch (\Exception $e) {
            if ($this->config['debug']['enabled']) {
                echo '<h1>Template Error</h1>';
                echo '<pre>' . $e->getMessage() . '</pre>';
            } else {
                echo '<h1>An error occurred</h1>';
            }
        }
    }
}