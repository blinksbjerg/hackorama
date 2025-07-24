<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for Category objects
 */
class SafeCategory extends DefaultSafe
{
    protected $allowedMethods = [
        'getId',
        'getName',
        'getDescriptionA',
        'getDescriptionB',
        'getUrl',
        'getImage',
        'getImages',
        'getOnlineProducts',
        'getChildren',
        'getParents',
        'getParent',
        'hasChildren',
        'getMetaTitle',
        'getMetaDescription',
        'getMetaKeywords',
        'isFront',
        'getInMenu',
        'getProducts',
        'getObjectType',
        'getIsOnline',
        'getProductCount',
        'getRemoteUrl',
        'getSlugName',
        'getCategoryId',
        'getParentId',
        'getCategoriesFromLevel',
        'canEdit',
        'getTree',
        'getBlogPosts',
        'getMetaValues',
        'getMetaValue',
        'getHtmlFields',
        'getHtmlField',
        'getTag',
        'getOpenGraphTitle',
        'getOpenGraphDescription',
        'getOpenGraphImage',
        'getPrimarySearchPhrase',
        'getNoIndex',
        'getPopularProducts',
        'getGoogleCategory',
        'getExtensionValue',
        'getBlogPostUrl',
    ];
    
    public function getId()
    {
        return $this->data['id'] ?? 0;
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getDescriptionA()
    {
        return $this->data['description_a'] ?? '';
    }
    
    public function getDescriptionB()
    {
        return $this->data['description_b'] ?? '';
    }
    
    public function getUrl()
    {
        // Generate category URL
        $id = $this->getId();
        $name = $this->getName();
        $slug = $this->slugify($name);
        return "/category/$id/$slug";
    }
    
    public function getImage()
    {
        if (!empty($this->data['image'])) {
            return new SafeImage($this->data['image']);
        }
        return null;
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
    
    public function getOnlineProducts()
    {
        // Check if products were pre-loaded (for front page)
        if (isset($this->data['_products'])) {
            return $this->data['_products'];
        }
        
        // This would normally fetch products from API
        // For now return empty array
        return [];
    }
    
    public function isFront()
    {
        return !empty($this->data['is_front']);
    }
    
    public function getInMenu()
    {
        return $this->data['in_menu'] ?? true;
    }
    
    public function getProducts()
    {
        return $this->getOnlineProducts();
    }
    
    public function getChildren()
    {
        $children = [];
        if (!empty($this->data['children'])) {
            foreach ($this->data['children'] as $childData) {
                $children[] = new SafeCategory($childData);
            }
        }
        return $children;
    }
    
    public function getParents()
    {
        $parents = [];
        if (!empty($this->data['parents'])) {
            foreach ($this->data['parents'] as $parentData) {
                $parents[] = new SafeCategory($parentData);
            }
        }
        return $parents;
    }
    
    public function getParent()
    {
        if (!empty($this->data['parent'])) {
            return new SafeCategory($this->data['parent']);
        }
        return null;
    }
    
    public function hasChildren()
    {
        return !empty($this->data['children']);
    }
    
    public function getMetaTitle()
    {
        return $this->data['meta_title'] ?? $this->getName();
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
    
    public function getObjectType()
    {
        return 'category';
    }
    
    public function getIsOnline()
    {
        return $this->data['is_online'] ?? true;
    }
    
    public function getProductCount()
    {
        return $this->data['product_count'] ?? 0;
    }
    
    public function getRemoteUrl()
    {
        return $this->data['remote_url'] ?? '';
    }
    
    public function getSlugName()
    {
        return $this->data['slug_name'] ?? $this->slugify($this->getName());
    }
    
    public function getCategoryId()
    {
        return $this->getId();
    }
    
    public function getParentId()
    {
        return $this->data['parent_id'] ?? 0;
    }
    
    public function getCategoriesFromLevel($level)
    {
        // Return categories from a specific level in the hierarchy
        $categories = [];
        if (!empty($this->data['categories_by_level'][$level])) {
            foreach ($this->data['categories_by_level'][$level] as $categoryData) {
                $categories[] = new SafeCategory($categoryData);
            }
        }
        return $categories;
    }
    
    public function canEdit()
    {
        return $this->data['can_edit'] ?? false;
    }
    
    public function getTree()
    {
        // Return combined parents and children
        return array_merge($this->getParents(), $this->getChildren());
    }
    
    public function getBlogPosts($limit = 2500, $offset = 0, &$count = null, $sort = null, $sort_order = 'DESC')
    {
        $blogPosts = [];
        $count = 0;
        
        if (!empty($this->data['blog_posts'])) {
            $count = count($this->data['blog_posts']);
            $sliced = array_slice($this->data['blog_posts'], $offset, $limit);
            
            foreach ($sliced as $blogPostData) {
                $blogPosts[] = new \stdClass(); // Would normally be SafeBlogPost
            }
        }
        
        return $blogPosts;
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
    
    public function getTag()
    {
        return $this->data['tag'] ?? '';
    }
    
    public function getOpenGraphTitle()
    {
        return $this->data['open_graph_title'] ?? $this->getName();
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
    
    public function getPopularProducts($limit = 25, $days = 90, $exclude = null)
    {
        $products = [];
        if (!empty($this->data['popular_products'])) {
            $filtered = $this->data['popular_products'];
            
            // Apply exclusions if provided
            if ($exclude && is_array($exclude)) {
                $filtered = array_filter($filtered, function($product) use ($exclude) {
                    return !in_array($product['id'] ?? 0, $exclude);
                });
            }
            
            // Apply limit
            $filtered = array_slice($filtered, 0, $limit);
            
            foreach ($filtered as $productData) {
                $products[] = new SafeProduct($productData);
            }
        }
        return $products;
    }
    
    public function getGoogleCategory()
    {
        return $this->data['google_category'] ?? '';
    }
    
    public function getExtensionValue($name)
    {
        return $this->data['extension_data'][$name] ?? null;
    }
    
    public function getBlogPostUrl()
    {
        $slug = $this->getSlugName();
        return "/blog/c/$slug";
    }
}