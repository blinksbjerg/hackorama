<?php
namespace Hackorama\Wrappers;

class SafePdfFile extends DefaultSafe
{
    public function getUrl()
    {
        return $this->data['url'] ?? '';
    }
    
    public function getFilename()
    {
        return $this->data['filename'] ?? '';
    }
    
    public function getMB()
    {
        return $this->data['mb'] ?? 0;
    }
    
    public function getSize()
    {
        return $this->data['size'] ?? 0;
    }
}