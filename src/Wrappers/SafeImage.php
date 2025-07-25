<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for Image objects
 */
class SafeImage extends DefaultSafe
{
    protected $allowedMethods = [
        'getId',
        'getUrl',
        'getThumb',
        'getAlt',
        'getTitle',
        'getWidth',
        'getHeight',
        'getSrc',
        'getDescription',
        'getHtmlSize',
        'getImageId',
        'getInline',
        'getVariantAttributeValueId',
        'getVariantName',
        'getVariantTag',
    ];
    
    public function getId()
    {
        return $this->data['image_id'] ?? $this->data['id'] ?? 0;
    }
    
    public function getUrl()
    {
        return $this->data['url'] ?? '';
    }
    
    public function getThumb($width = 200, $height = 200)
    {
        // In real implementation, this would generate thumbnail URL
        // For now, just return the original URL
        return $this->getUrl();
    }
    
    public function getAlt()
    {
        return $this->data['alt'] ?? '';
    }
    
    public function getTitle()
    {
        return $this->data['title'] ?? '';
    }
    
    public function getWidth()
    {
        return $this->data['width'] ?? 0;
    }
    
    public function getHeight()
    {
        return $this->data['height'] ?? 0;
    }
    
    public function getSrc($width = null, $height = null, $mode = 'fit', $format = null, $quality = null)
    {
        // Generate scaled image URL using Shoporama's image service
        $url = $this->getUrl();
        
        if (!$url) {
            return '';
        }
        
        // If no dimensions specified, return original via image proxy
        if (!$width && !$height) {
            return '/images.php?path=' . urlencode($url);
        }
        
        // Parse the original URL to get the image path structure
        // Example input: https://mortensbutik.dk/cache/1/0/8/7/9/fit-1000x1000x90.png
        // Should become: /cache/1/0/8/7/9/box-300x400x90.png
        if (preg_match('#/cache/(\d+/\d+/\d+/\d+/\d+)/(fit|box)-\d+x\d+x\d+\.(png|jpg|jpeg)#', $url, $matches)) {
            $imagePath = $matches[1];
            $extension = $matches[3];
            
            // Format: MODE-WIDTHxHEIGHTx90.EXTENSION
            $filename = $mode . '-' . ($width ?: 0) . 'x' . ($height ?: 0) . 'x90.' . $extension;
            $cachePath = '/cache/' . $imagePath . '/' . $filename;
            
            // Return via image proxy to handle auto-download from mortensbutik.dk
            return '/images.php?path=' . urlencode($cachePath);
        }
        
        // Fallback to original URL via proxy if pattern doesn't match
        return '/images.php?path=' . urlencode($url);
    }
    
    public function getDescription()
    {
        return $this->data['description'] ?? '';
    }
    
    public function getHtmlSize($w = null, $h = null, $t = 'fit', $format = 'png', $quality = 100)
    {
        // If dimensions provided, calculate the actual output dimensions
        if ($w || $h) {
            $originalWidth = $this->getWidth();
            $originalHeight = $this->getHeight();
            
            if ($originalWidth && $originalHeight) {
                if ($t === 'fit') {
                    // Calculate dimensions maintaining aspect ratio
                    $ratio = min($w / $originalWidth, $h / $originalHeight);
                    $outputWidth = round($originalWidth * $ratio);
                    $outputHeight = round($originalHeight * $ratio);
                } else {
                    // Box mode - use provided dimensions
                    $outputWidth = $w;
                    $outputHeight = $h;
                }
                
                return sprintf('width="%d" height="%d"', $outputWidth, $outputHeight);
            }
        }
        
        // Fallback to original dimensions
        $width = $this->getWidth();
        $height = $this->getHeight();
        
        if ($width && $height) {
            return sprintf('width="%d" height="%d"', $width, $height);
        }
        return '';
    }
    
    public function getImageId()
    {
        return $this->getId();
    }
    
    public function getInline($width, $height, $type = 'fit', $format = null, $quality = 100)
    {
        // Generate base64 inline image
        // In a real implementation, this would fetch and encode the image
        // For now, return a data URI placeholder
        $src = $this->getSrc($width, $height, $type, $format, $quality);
        
        // This is a placeholder - real implementation would fetch and encode the actual image
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==';
    }
    
    public function getVariantAttributeValueId()
    {
        return $this->data['variant_attribute_value_id'] ?? false;
    }
    
    public function getVariantName()
    {
        return $this->data['variant_name'] ?? false;
    }
    
    public function getVariantTag()
    {
        return $this->data['variant_tag'] ?? false;
    }
}