<?php
namespace Hackorama\Core;

/**
 * Image cache system that automatically downloads missing images from configured source
 */
class ImageCache
{
    private $cacheDir;
    private $sourceUrl;
    private $config;
    
    public function __construct($config = null, $cacheDir = null)
    {
        $this->config = $config;
        $this->cacheDir = $cacheDir ?: __DIR__ . '/../../cache';
        $this->sourceUrl = $config['images']['source_url'] ?? 'https://your-domain.dk';
    }
    
    /**
     * Get image from cache, download if missing
     */
    public function getImage($cachePath)
    {
        $localPath = $this->cacheDir . $cachePath;
        
        // If image exists locally, return it
        if (file_exists($localPath)) {
            return $localPath;
        }
        
        // Create directory if it doesn't exist
        $dir = dirname($localPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        // Download from mortensbutik.dk
        $sourceUrl = $this->sourceUrl . $cachePath;
        $imageData = $this->downloadImage($sourceUrl);
        
        if ($imageData) {
            file_put_contents($localPath, $imageData);
            return $localPath;
        }
        
        return false;
    }
    
    /**
     * Download image with curl, ignoring SSL issues
     */
    private function downloadImage($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Hackorama/1.0)');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return ($httpCode === 200) ? $data : false;
    }
    
    /**
     * Serve image with proper headers
     */
    public function serveImage($cachePath)
    {
        $localPath = $this->getImage($cachePath);
        
        if (!$localPath || !file_exists($localPath)) {
            http_response_code(404);
            return false;
        }
        
        // Get mime type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $localPath);
        finfo_close($finfo);
        
        // Set headers
        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($localPath));
        header('Cache-Control: public, max-age=31536000'); // 1 year cache
        
        // Output image
        readfile($localPath);
        return true;
    }
}