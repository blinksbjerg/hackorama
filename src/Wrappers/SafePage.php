<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for Page objects
 */
class SafePage extends DefaultSafe
{
    protected $allowedMethods = [
        'getId',
        'getTitle',
        'getContent',
        'getUrl',
        'getMetaTitle',
        'getMetaDescription',
        'getMetaKeywords',
        'getPageId',
        'getRemoteUrl',
        'getHeadline',
        'getIsFront',
        'getText',
        'parse',
        'canEdit',
        'getImages',
        'getMetaValues',
        'getMetaValue',
        'getHtmlFields',
        'getHtmlField',
        'getOpenGraphTitle',
        'getOpenGraphDescription',
        'getOpenGraphImage',
        'getPrimarySearchPhrase',
        'getNoIndex',
        'getExtensionValue',
    ];
    
    public function getId()
    {
        return $this->data['id'] ?? 0;
    }
    
    public function getTitle()
    {
        return $this->data['title'] ?? '';
    }
    
    public function getContent()
    {
        return $this->data['content'] ?? '';
    }
    
    public function getUrl()
    {
        // Generate page URL
        $id = $this->getId();
        $title = $this->getTitle();
        $slug = $this->slugify($title);
        return "/page/$id/$slug";
    }
    
    public function getMetaTitle()
    {
        return $this->data['meta_title'] ?? $this->getTitle();
    }
    
    public function getMetaDescription()
    {
        return $this->data['meta_description'] ?? '';
    }
    
    public function getMetaKeywords()
    {
        return $this->data['meta_keywords'] ?? '';
    }
    
    private function slugify($text)
    {
        // Simple slugification
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        return $text;
    }
    
    public function getPageId()
    {
        return $this->getId();
    }
    
    public function getRemoteUrl()
    {
        return $this->data['remote_url'] ?? '';
    }
    
    public function getHeadline()
    {
        return $this->parse($this->data['headline'] ?? $this->getTitle());
    }
    
    public function getIsFront()
    {
        return $this->data['is_front'] ?? false;
    }
    
    public function getText()
    {
        return $this->parse($this->getContent());
    }
    
    public function parse($text)
    {
        // Parse text variables
        $replacements = [
            '[YEAR]' => date('Y'),
            '[WEBSHOP_NAME]' => $this->data['webshop_name'] ?? '',
            '[COMPANY_NAME]' => $this->data['company_name'] ?? '',
            '[COMPANY_REG_NR]' => $this->data['company_reg_nr'] ?? '',
            '[COMPANY_ADDRESS]' => $this->data['company_address'] ?? '',
            '[COMPANY_ZIPCODE]' => $this->data['company_zipcode'] ?? '',
            '[COMPANY_CITY]' => $this->data['company_city'] ?? '',
            '[COMPANY_COUNTRY]' => $this->data['company_country'] ?? '',
            '[COMPANY_EMAIL]' => $this->data['company_email'] ?? '',
            '[COMPANY_PHONE]' => $this->data['company_phone'] ?? '',
            '[FREESHIPPING]' => isset($this->data['free_shipping_over']) ? number_format($this->data['free_shipping_over'], 2, ',', '.') : '',
            '[MONTH]' => date('F'),
            '[SEASON]' => $this->getCurrentSeason(),
        ];
        
        return str_replace(array_keys($replacements), array_values($replacements), $text);
    }
    
    private function getCurrentSeason()
    {
        $month = date('n');
        if ($month >= 3 && $month <= 5) {
            return 'Spring';
        } elseif ($month >= 6 && $month <= 8) {
            return 'Summer';
        } elseif ($month >= 9 && $month <= 11) {
            return 'Autumn';
        } else {
            return 'Winter';
        }
    }
    
    public function canEdit()
    {
        return $this->data['can_edit'] ?? false;
    }
    
    public function getImages()
    {
        $images = [];
        if (!empty($this->data['images'])) {
            foreach ($this->data['images'] as $imageData) {
                $images[] = new SafeImage($imageData);
            }
        }
        return $images;
    }
    
    public function getMetaValues()
    {
        return $this->data['meta_values'] ?? [];
    }
    
    public function getMetaValue($key)
    {
        return $this->data['meta_values'][$key] ?? null;
    }
    
    public function getHtmlFields()
    {
        return $this->data['html_fields'] ?? [];
    }
    
    public function getHtmlField($tag)
    {
        return $this->data['html_fields'][$tag] ?? '';
    }
    
    public function getOpenGraphTitle()
    {
        return $this->data['open_graph_title'] ?? $this->getTitle();
    }
    
    public function getOpenGraphDescription()
    {
        return $this->data['open_graph_description'] ?? $this->getMetaDescription();
    }
    
    public function getOpenGraphImage()
    {
        if (!empty($this->data['open_graph_image'])) {
            return new SafeImage($this->data['open_graph_image']);
        }
        return false;
    }
    
    public function getPrimarySearchPhrase()
    {
        return $this->data['primary_search_phrase'] ?? '';
    }
    
    public function getNoIndex()
    {
        return $this->data['no_index'] ?? false;
    }
    
    public function getExtensionValue($name)
    {
        return $this->data['extension_data'][$name] ?? null;
    }
}