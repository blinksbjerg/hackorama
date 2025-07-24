<?php
namespace Hackorama\Wrappers;

/**
 * Safe wrapper for Product objects
 */
class SafeProduct extends DefaultSafe
{
    protected $allowedMethods = [
        'getId',
        'getName',
        'getDescription',
        'getDescriptionShort',
        'getPrice',
        'getSalePrice',
        'getRealPrice',
        'getUrl',
        'getImage',
        'getImages',
        'getInStock',
        'getStockCount',
        'getSku',
        'getWeight',
        'getCategories',
        'getCategory',
        'getAttributes',
        'getBrand',
        'getMetaTitle',
        'getMetaDescription',
        'getMetaKeywords',
        'hasDiscount',
        'getDiscountPercent',
        'getRemoteUrl',
        'getProductId',
        'getBrandName',
        'getMainCategory',
        'getMainCategoryName',
        'getCategoryName',
        'getOwnId',
        'getAvgRating',
        'getParsedDescription',
        'getProfile',
        'getIsInStock',
        'getAllowNegativeStock',
        'getDeliveryTime',
        'getVariants',
        'getFiles',
        'getTags',
        'getRelatedProducts',
        'getPackage',
        'getUnit',
        'getMinAmount',
        'getGroups',
        'getPdfFiles',
        'hasBundleProducts',
        'getBundleProducts',
        'getShareLink',
        'getProductReviews',
        'getManufacturer',
        'getSafetyProfile',
        'getManufacturerUrl',
        'hasWideImage',
        'getWideImage',
        'getMaxAmount',
        'getQualityHtml',
        'getQualityDescription',
        'hasCombiProfile',
        'getCombiProfile',
        'getProductReviewsAvg',
        'getProductReviewsCount',
        'getProductsInBundle',
        'getSimilarProducts',
        'getDeliveryTimeNotInStock',
        'getLocationStock',
        'getBundleProductsCount',
        'getAttributePrice',
        'getGtin',
        'getMpn',
        'getSecOwnId',
        'getLocation',
        'hasVariant',
        'hasVariants',
        'getVariant',
        'getCampaigns',
        'hasCampaigns',
        'getIsVoucher',
        'getVoucherDays',
        'getVoucherAmount',
        'getNeverFreeShipping',
        'getRequiresAgeVerification',
        'getSubscriptionInterval',
        'getSubscriptionPrice',
        'canEdit',
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
        'getSiblings',
        'getAlsoBought',
        'getShipping',
        'getShippingWeight',
        'getApproxShipping',
        'getShippingInclVat',
        'getCountryOfOrigin',
        'getTariffCode',
        'getGoogleCategory',
        'getGoogleShoppingTitle',
        'getGoogleShoppingImage',
        'getListDescription',
        'getComment',
        'getPriceExVat',
        'getSalePriceExVat',
        'getRealPriceExVat',
        'getVat',
        'getProductVat',
        'getRealVat',
        'getUnitPrice',
        'getUnitVat',
        'getDiscountPrice',
        'getPercentSave',
        'getSave',
        'getLowestPrice',
        'getLowestRealPrice',
        'getLowestSalePrice',
        'getLowestPriceAttributeValueId',
        'getLowestRealPriceAttributeValueId',
        'getLowestSalePriceAttributeValueId',
        'getAttributeSalePrice',
        'getAttributeSubscriptionPrice',
        'hasAttributePrice',
        'getCategoryNames',
        'getSupplier',
        'getSupplierName',
        'getManufacturerName',
        'getSafetyProfileName',
        'getWishlistAmount',
        'getWishlistComment',
        'getWishlistAttributeId',
        'getWishlistAttributeValueId',
        'getWishlistVariantName',
        'getWishlistVariantValue',
        'getFile',
        'getFileDownloadUrl',
        'getInStockVariants',
        'getStockVariants',
        'getNegativeStockCount',
        'getOnlineHours',
        'getOnlineSince',
        'getAttributeTag',
        'getAttributeValue',
        'getAttributeValueByName',
        'getAttributeValueIdBySku',
        'getLocationByOwnId',
        'getBulkDiscount',
        'getBulkDiscountOver',
        'getBulkDiscountPrice',
        'getDiscountIntervals',
        'getDiscountIntervalPrice',
        'getDiscountIntervalPriceExVat',
        'getDiscountPriceInclVat',
        'getBundleProductIds',
        'getCampaignInfo',
        'hasCategory',
        'getNoShopping',
        'getHasCreditUntil',
        'getCreditUntil',
        'getHasCreditDays',
        'getCreditDays',
        'getHasCreditDate',
        'getCreditDate',
        'getAmount',
        'getPurchasePrice',
        'getRealSubscriptionPrice',
        'getRealSubscriptionVat',
        'getSubscriptionFixation',
        'getNext',
        'getPrev',
        'getSearch',
        'getSafeProduct',
        'getSimilarProductRatings',
        'getSimilarProductReviews',
        'getPDF',
    ];
    
    public function getId()
    {
        return $this->data['product_id'] ?? $this->data['id'] ?? 0;
    }
    
    public function getProductId()
    {
        return $this->getId();
    }
    
    public function getName()
    {
        return $this->data['name'] ?? '';
    }
    
    public function getDescription()
    {
        return $this->data['description'] ?? '';
    }
    
    public function getDescriptionShort()
    {
        return $this->data['description_short'] ?? '';
    }
    
    public function getPrice()
    {
        // Price including VAT - return as float for calculations
        return floatval($this->data['price'] ?? 0);
    }
    
    public function getSalePrice()
    {
        // Sale price if product is on sale
        if ($this->hasDiscount()) {
            return floatval($this->data['sale_price'] ?? $this->data['price'] ?? 0);
        }
        return $this->getPrice();
    }
    
    public function getRealPrice($amount = 1, $attributes = [])
    {
        // The actual price customer pays (sale price if on sale, otherwise regular price)
        $basePrice = $this->hasDiscount() ? $this->getSalePrice() : $this->getPrice();
        return $basePrice * $amount;
    }
    
    public function getUrl()
    {
        // Generate product URL
        $id = $this->getId();
        $name = $this->getName();
        $slug = $this->slugify($name);
        return "/product/$id/$slug";
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
        
        // Check for product images in data
        if (!empty($this->data['images'])) {
            foreach ($this->data['images'] as $imageData) {
                $images[] = new SafeImage($imageData);
            }
        }
        
        // If we have an image URL directly, use it
        if (empty($images) && !empty($this->data['image'])) {
            $images[] = new SafeImage(['url' => $this->data['image']]);
        }
        
        return $images;
    }
    
    public function getInStock($attributeId = null, $attributeValueId = null)
    {
        // Return stock count, optionally for specific attribute combination
        if ($attributeId && $attributeValueId) {
            return $this->data['variant_stock'][$attributeId][$attributeValueId] ?? 0;
        }
        $stock = $this->data['stock'] ?? 0;
        return $stock > 0;
    }
    
    public function getStockCount()
    {
        return $this->data['stock'] ?? 0;
    }
    
    public function getSku()
    {
        return $this->data['sku'] ?? '';
    }
    
    public function getWeight()
    {
        return $this->data['weight'] ?? 0;
    }
    
    public function getCategories()
    {
        $categories = [];
        if (!empty($this->data['categories'])) {
            foreach ($this->data['categories'] as $categoryData) {
                $categories[] = new SafeCategory($categoryData);
            }
        }
        return $categories;
    }
    
    public function getCategory()
    {
        // Return primary category
        $categories = $this->getCategories();
        return !empty($categories) ? $categories[0] : null;
    }
    
    public function getAttributes()
    {
        return $this->data['attributes'] ?? [];
    }
    
    public function getBrand()
    {
        return $this->data['brand'] ?? '';
    }
    
    public function getBrandName()
    {
        return $this->getBrand();
    }
    
    public function getMainCategory()
    {
        // Return primary category
        return $this->getCategory();
    }
    
    public function getMainCategoryName()
    {
        $mainCategory = $this->getMainCategory();
        return $mainCategory ? $mainCategory->getName() : '';
    }
    
    public function getCategoryName()
    {
        $category = $this->getCategory();
        return $category ? $category->getName() : '';
    }
    
    public function getOwnId()
    {
        return $this->data['own_id'] ?? '';
    }
    
    public function getAvgRating()
    {
        return $this->data['avg_rating'] ?? 0;
    }
    
    public function getParsedDescription()
    {
        // Return the description with any parsing (for now, just return the raw description)
        return $this->getDescription();
    }
    
    public function getProfile()
    {
        // Return product profile object
        $profileData = $this->data['profile'] ?? ['attributes' => []];
        return new SafeProductProfile($profileData);
    }
    
    public function getIsInStock()
    {
        // Alias for getInStock
        return $this->getInStock();
    }
    
    public function getAllowNegativeStock()
    {
        // Return whether negative stock is allowed
        return $this->data['allow_negative_stock'] ?? false;
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
    
    public function hasDiscount()
    {
        return !empty($this->data['sale_price']) && 
               $this->data['sale_price'] < $this->data['price'];
    }
    
    public function getDiscountPercent()
    {
        if (!$this->hasDiscount()) {
            return 0;
        }
        
        $regular = $this->data['price'] ?? 0;
        $sale = $this->data['sale_price'] ?? 0;
        
        if ($regular > 0) {
            return round((($regular - $sale) / $regular) * 100);
        }
        
        return 0;
    }
    
    public function getRemoteUrl()
    {
        // Return the product URL
        return $this->getUrl();
    }
    
    public function getDeliveryTime()
    {
        // Return delivery time in days
        return $this->data['delivery_time'] ?? 3;
    }
    
    public function getVariants()
    {
        // Return product variants
        $variants = [];
        if (!empty($this->data['variants'])) {
            foreach ($this->data['variants'] as $variantData) {
                $variants[] = new SafeProduct($variantData);
            }
        }
        return $variants;
    }
    
    public function getFiles()
    {
        // Return product files (e.g., manuals, downloads)
        return $this->data['files'] ?? [];
    }
    
    public function getTags()
    {
        // Return product tags
        return $this->data['tags'] ?? [];
    }
    
    public function getRelatedProducts()
    {
        // Return related products
        $relatedProducts = [];
        if (!empty($this->data['related_products'])) {
            foreach ($this->data['related_products'] as $productData) {
                $relatedProducts[] = new SafeProduct($productData);
            }
        }
        return $relatedProducts;
    }
    
    public function getPackage()
    {
        return $this->data['package'] ?? null;
    }
    
    public function getUnit()
    {
        return $this->data['unit'] ?? 'stk';
    }
    
    public function getMinAmount()
    {
        return $this->data['min_amount'] ?? 1;
    }
    
    public function getGroups()
    {
        return $this->data['groups'] ?? [];
    }
    
    public function getPdfFiles()
    {
        // Return PDF files associated with the product
        $pdfFiles = [];
        if (isset($this->data['pdf_files'])) {
            foreach ($this->data['pdf_files'] as $pdfData) {
                $pdfFiles[] = new SafePdfFile($pdfData);
            }
        }
        return $pdfFiles;
    }
    
    public function hasBundleProducts()
    {
        // Check if this product has bundle products
        return !empty($this->data['bundle_products']);
    }
    
    public function getBundleProducts()
    {
        // Return bundle products
        $bundleProducts = [];
        if (!empty($this->data['bundle_products'])) {
            foreach ($this->data['bundle_products'] as $productData) {
                $bundleProducts[] = new SafeProduct($productData);
            }
        }
        return $bundleProducts;
    }
    
    public function getShareLink()
    {
        // Generate share link for the product
        $baseUrl = $this->data['base_url'] ?? '';
        $productUrl = $this->getUrl();
        return $baseUrl . $productUrl;
    }
    
    public function getProductReviews()
    {
        // Return product reviews
        return $this->data['reviews'] ?? [];
    }
    
    public function getManufacturer()
    {
        // Return manufacturer/brand information
        return $this->getBrand();
    }
    
    public function getSafetyProfile()
    {
        // Return safety profile data
        return $this->data['safety_profile'] ?? null;
    }
    
    public function getManufacturerUrl()
    {
        // Return manufacturer URL
        return $this->data['manufacturer_url'] ?? '';
    }
    
    public function hasWideImage()
    {
        // Check if product has wide image
        return !empty($this->data['wide_image']);
    }
    
    public function getWideImage()
    {
        // Return wide image
        if ($this->hasWideImage()) {
            return new SafeImage($this->data['wide_image']);
        }
        return null;
    }
    
    public function getMaxAmount()
    {
        // Return maximum order amount
        return $this->data['max_amount'] ?? 999;
    }
    
    public function getQualityHtml()
    {
        // Return quality HTML
        return $this->data['quality_html'] ?? '';
    }
    
    public function getQualityDescription()
    {
        // Return quality description
        return $this->data['quality_description'] ?? '';
    }
    
    public function hasCombiProfile()
    {
        // Check if product has combination profile
        return !empty($this->data['combi_profile']);
    }
    
    public function getCombiProfile()
    {
        // Return combination profile
        return $this->data['combi_profile'] ?? null;
    }
    
    public function getProductReviewsAvg()
    {
        // Return average rating from reviews
        return $this->getAvgRating();
    }
    
    public function getProductReviewsCount()
    {
        // Return number of reviews
        $reviews = $this->getProductReviews();
        return is_array($reviews) ? count($reviews) : 0;
    }
    
    public function getProductsInBundle()
    {
        // Alias for getBundleProducts
        return $this->getBundleProducts();
    }
    
    public function getSimilarProducts()
    {
        // Return similar/related products
        return $this->getRelatedProducts();
    }
    
    public function getDeliveryTimeNotInStock()
    {
        // Return delivery time when not in stock
        return $this->data['delivery_time_not_in_stock'] ?? '7-14 dage';
    }
    
    public function getLocationStock($locationId)
    {
        // Return stock count for specific location
        return $this->data['location_stock'][$locationId] ?? 0;
    }
    
    public function getBundleProductsCount()
    {
        // Return bundle products with count
        $bundleProducts = [];
        if (!empty($this->data['bundle_products'])) {
            foreach ($this->data['bundle_products'] as $bundleData) {
                $bundleProducts[] = [
                    'product' => new SafeProduct($bundleData['product'] ?? $bundleData),
                    'count' => $bundleData['count'] ?? 1
                ];
            }
        }
        return $bundleProducts;
    }
    
    public function getAttributePrice($attributeValueId)
    {
        // Return additional price for attribute value
        return $this->data['attribute_prices'][$attributeValueId] ?? 0;
    }
    
    
    public function getGtin($attributeValueId = null, $attributeId = null)
    {
        if ($attributeId && $attributeValueId) {
            return $this->data['variant_gtin'][$attributeId][$attributeValueId] ?? '';
        }
        return $this->data['gtin'] ?? '';
    }
    
    public function getMpn($attributeValueId = null, $attributeId = null)
    {
        if ($attributeId && $attributeValueId) {
            return $this->data['variant_mpn'][$attributeId][$attributeValueId] ?? '';
        }
        return $this->data['mpn'] ?? '';
    }
    
    public function getSecOwnId($attributeId = null, $attributeValueId = null)
    {
        if ($attributeId && $attributeValueId) {
            return $this->data['variant_sec_own_id'][$attributeId][$attributeValueId] ?? '';
        }
        return $this->data['sec_own_id'] ?? '';
    }
    
    public function getLocation($attributeValueId = null, $attributeId = null)
    {
        if ($attributeId && $attributeValueId) {
            return $this->data['variant_location'][$attributeId][$attributeValueId] ?? '';
        }
        return $this->data['location'] ?? '';
    }
    
    public function hasVariant()
    {
        return !empty($this->data['has_variant']) || !empty($this->data['variants']);
    }
    
    public function hasVariants()
    {
        return $this->hasVariant();
    }
    
    public function getVariant()
    {
        // Return variant attribute info
        return $this->data['variant'] ?? false;
    }
    
    public function getCampaigns()
    {
        return $this->data['campaigns'] ?? [];
    }
    
    public function hasCampaigns()
    {
        return !empty($this->data['campaigns']);
    }
    
    public function getIsVoucher()
    {
        return $this->data['is_voucher'] ?? false;
    }
    
    public function getVoucherDays()
    {
        return $this->data['voucher_days'] ?? 0;
    }
    
    public function getVoucherAmount()
    {
        return $this->data['voucher_amount'] ?? 0;
    }
    
    public function getNeverFreeShipping()
    {
        return $this->data['never_free_shipping'] ?? false;
    }
    
    public function getRequiresAgeVerification()
    {
        return $this->data['requires_age_verification'] ?? 0;
    }
    
    public function getSubscriptionInterval()
    {
        return $this->data['subscription_interval'] ?? 0;
    }
    
    public function getSubscriptionPrice($countryId = null)
    {
        $price = $this->data['subscription_price'] ?? 0;
        // Add VAT if needed based on country
        if ($price > 0) {
            $vat = $this->getProductVat($countryId);
            $price += $price * ($vat / 100);
        }
        return $price;
    }
    
    public function canEdit()
    {
        return $this->data['can_edit'] ?? false;
    }
    
    public function getMetaValues($parsed = true)
    {
        return $this->data['meta_values'] ?? [];
    }
    
    public function getMetaValue($key, $parsed = true)
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
    
    public function getExtensionValue($name)
    {
        return $this->data['extension_data'][$name] ?? null;
    }
    
    public function getSiblings()
    {
        $siblings = [];
        if (!empty($this->data['siblings'])) {
            foreach ($this->data['siblings'] as $siblingData) {
                $siblings[] = new SafeProduct($siblingData);
            }
        }
        return $siblings;
    }
    
    public function getAlsoBought($limit = 25)
    {
        $products = [];
        if (!empty($this->data['also_bought'])) {
            $sliced = array_slice($this->data['also_bought'], 0, $limit);
            foreach ($sliced as $productData) {
                $products[] = new SafeProduct($productData);
            }
        }
        return $products;
    }
    
    public function getShipping()
    {
        return $this->data['shipping'] ?? 0;
    }
    
    public function getShippingWeight()
    {
        return $this->data['shipping_weight'] ?? 0;
    }
    
    public function getApproxShipping()
    {
        return $this->data['approx_shipping'] ?? 0;
    }
    
    public function getShippingInclVat()
    {
        $shipping = $this->getShipping();
        $vat = $this->getVat();
        return $shipping + ($shipping * ($vat / 100));
    }
    
    public function getCountryOfOrigin()
    {
        return $this->data['country_of_origin'] ?? '';
    }
    
    public function getTariffCode()
    {
        return $this->data['tariff_code'] ?? '';
    }
    
    public function getGoogleCategory()
    {
        return $this->data['google_category'] ?? '';
    }
    
    public function getGoogleShoppingTitle()
    {
        return $this->data['google_shopping_title'] ?? $this->getName();
    }
    
    public function getGoogleShoppingImage()
    {
        if (!empty($this->data['google_shopping_image'])) {
            return new SafeImage($this->data['google_shopping_image']);
        }
        return $this->getImage();
    }
    
    public function getListDescription()
    {
        return $this->data['list_description'] ?? '';
    }
    
    public function getComment()
    {
        return $this->data['comment'] ?? '';
    }
    
    public function getPriceExVat()
    {
        $price = $this->getPrice();
        $vat = $this->getVat();
        return $price / (1 + ($vat / 100));
    }
    
    public function getSalePriceExVat()
    {
        $price = $this->getSalePrice();
        $vat = $this->getVat();
        return $price / (1 + ($vat / 100));
    }
    
    public function getRealPriceExVat($amount = 1, $attributes = [])
    {
        $price = $this->getRealPrice($amount, $attributes);
        $vat = $this->getVat();
        return $price / (1 + ($vat / 100));
    }
    
    public function getVat()
    {
        return $this->data['vat'] ?? 25; // Default 25% VAT
    }
    
    public function getProductVat($countryId = null)
    {
        // Return VAT based on country
        if ($countryId && isset($this->data['country_vat'][$countryId])) {
            return $this->data['country_vat'][$countryId];
        }
        return $this->getVat();
    }
    
    public function getRealVat($amount = 1, $attributes = [])
    {
        return $this->getVat();
    }
    
    public function getUnitPrice()
    {
        return $this->data['unit_price'] ?? 0;
    }
    
    public function getUnitVat()
    {
        return $this->data['unit_vat'] ?? 0;
    }
    
    public function getDiscountPrice()
    {
        if ($this->hasDiscount()) {
            return $this->getPrice() - $this->getSalePrice();
        }
        return 0;
    }
    
    public function getPercentSave()
    {
        if ($this->hasDiscount() && $this->getPrice() > 0) {
            return round((($this->getPrice() - $this->getSalePrice()) / $this->getPrice()) * 100);
        }
        return 0;
    }
    
    public function getSave()
    {
        return $this->getDiscountPrice();
    }
    
    public function getLowestPrice()
    {
        return $this->data['lowest_price'] ?? $this->getPrice();
    }
    
    public function getLowestRealPrice()
    {
        return $this->data['lowest_real_price'] ?? $this->getRealPrice();
    }
    
    public function getLowestSalePrice()
    {
        return $this->data['lowest_sale_price'] ?? $this->getSalePrice();
    }
    
    public function getLowestPriceAttributeValueId()
    {
        return $this->data['lowest_price_attribute_value_id'] ?? null;
    }
    
    public function getLowestRealPriceAttributeValueId()
    {
        return $this->data['lowest_real_price_attribute_value_id'] ?? null;
    }
    
    public function getLowestSalePriceAttributeValueId()
    {
        return $this->data['lowest_sale_price_attribute_value_id'] ?? null;
    }
    
    public function getAttributeSalePrice($attributeValueId)
    {
        return $this->data['attribute_sale_prices'][$attributeValueId] ?? 0;
    }
    
    public function getAttributeSubscriptionPrice($attributeValueId, $countryId = null)
    {
        $price = $this->data['attribute_subscription_prices'][$attributeValueId] ?? 0;
        if ($price > 0) {
            $vat = $this->getProductVat($countryId);
            $price += $price * ($vat / 100);
        }
        return $price;
    }
    
    public function hasAttributePrice()
    {
        return !empty($this->data['attribute_prices']);
    }
    
    public function getCategoryNames($pre = "", $sep = " ", $post = "")
    {
        $names = [];
        foreach ($this->getCategories() as $category) {
            $names[] = $category->getName();
        }
        return $pre . implode($sep, $names) . $post;
    }
    
    public function getSupplier()
    {
        return $this->data['supplier'] ?? null;
    }
    
    public function getSupplierName()
    {
        return $this->data['supplier_name'] ?? '';
    }
    
    public function getManufacturerName()
    {
        return $this->data['manufacturer_name'] ?? $this->getBrandName();
    }
    
    public function getSafetyProfileName()
    {
        return $this->data['safety_profile_name'] ?? '';
    }
    
    public function getWishlistAmount()
    {
        return $this->data['wishlist_amount'] ?? 1;
    }
    
    public function getWishlistComment()
    {
        return $this->data['wishlist_comment'] ?? '';
    }
    
    public function getWishlistAttributeId()
    {
        return $this->data['wishlist_attribute_id'] ?? null;
    }
    
    public function getWishlistAttributeValueId()
    {
        return $this->data['wishlist_attribute_value_id'] ?? null;
    }
    
    public function getWishlistVariantName()
    {
        return $this->data['wishlist_variant_name'] ?? '';
    }
    
    public function getWishlistVariantValue()
    {
        return $this->data['wishlist_variant_value'] ?? '';
    }
    
    public function getFile()
    {
        return $this->data['file'] ?? null;
    }
    
    public function getFileDownloadUrl($orderId = null)
    {
        if ($this->getFile()) {
            $baseUrl = '/product/download/' . $this->getId();
            if ($orderId) {
                $baseUrl .= '?order=' . $orderId;
            }
            return $baseUrl;
        }
        return '';
    }
    
    public function getInStockVariants()
    {
        $variants = [];
        if (!empty($this->data['stock_variants'])) {
            foreach ($this->data['stock_variants'] as $variantData) {
                if ($variantData['in_stock'] ?? false) {
                    $variants[] = $variantData;
                }
            }
        }
        return $variants;
    }
    
    public function getStockVariants($onlyInStock = false, $hideStock = false)
    {
        $variants = [];
        if (!empty($this->data['stock_variants'])) {
            foreach ($this->data['stock_variants'] as $variantData) {
                if (!$onlyInStock || ($variantData['in_stock'] ?? false)) {
                    if ($hideStock) {
                        unset($variantData['stock_count']);
                    }
                    $variants[] = $variantData;
                }
            }
        }
        return $variants;
    }
    
    public function getNegativeStockCount()
    {
        $stock = $this->getStockCount();
        return $stock < 0 ? abs($stock) : 0;
    }
    
    public function getOnlineHours()
    {
        return $this->data['online_hours'] ?? 0;
    }
    
    public function getOnlineSince()
    {
        return $this->data['online_since'] ?? null;
    }
    
    public function getAttributeTag($i)
    {
        if (isset($this->data['attributes'][$i])) {
            return $this->data['attributes'][$i]['tag'] ?? '';
        }
        return '';
    }
    
    public function getAttributeValue($i)
    {
        if (isset($this->data['attributes'][$i])) {
            return $this->data['attributes'][$i]['value'] ?? '';
        }
        return '';
    }
    
    public function getAttributeValueByName($name)
    {
        foreach ($this->data['attributes'] ?? [] as $attr) {
            if ($attr['name'] === $name) {
                return $attr['value'] ?? '';
            }
        }
        return '';
    }
    
    public function getAttributeValueIdBySku($sku)
    {
        foreach ($this->data['attribute_skus'] ?? [] as $attributeValueId => $attrSku) {
            if ($attrSku === $sku) {
                return $attributeValueId;
            }
        }
        return null;
    }
    
    public function getLocationByOwnId($ownId)
    {
        return $this->data['locations_by_own_id'][$ownId] ?? '';
    }
    
    public function getBulkDiscount()
    {
        return $this->data['bulk_discount'] ?? 0;
    }
    
    public function getBulkDiscountOver()
    {
        return $this->data['bulk_discount_over'] ?? 0;
    }
    
    public function getBulkDiscountPrice($attributes = [])
    {
        $price = $this->getRealPrice(1, $attributes);
        $discount = $this->getBulkDiscount();
        if ($discount > 0) {
            return $price * (1 - ($discount / 100));
        }
        return $price;
    }
    
    public function getDiscountIntervals()
    {
        return $this->data['discount_intervals'] ?? [];
    }
    
    public function getDiscountIntervalPrice($amount, $attributeValueId = 0)
    {
        $intervals = $this->getDiscountIntervals();
        $basePrice = $this->getPrice();
        if ($attributeValueId) {
            $basePrice += $this->getAttributePrice($attributeValueId);
        }
        
        foreach ($intervals as $interval) {
            if ($amount >= $interval['from'] && $amount <= $interval['to']) {
                return $basePrice * (1 - ($interval['discount'] / 100));
            }
        }
        return $basePrice;
    }
    
    public function getDiscountIntervalPriceExVat($amount, $attributeValueId = 0)
    {
        $price = $this->getDiscountIntervalPrice($amount, $attributeValueId);
        $vat = $this->getVat();
        return $price / (1 + ($vat / 100));
    }
    
    public function getDiscountPriceInclVat($amount, $attributeValueId)
    {
        return $this->getDiscountIntervalPrice($amount, $attributeValueId);
    }
    
    public function getBundleProductIds()
    {
        $ids = [];
        if (!empty($this->data['bundle_product_ids'])) {
            return $this->data['bundle_product_ids'];
        }
        // Extract from bundle products
        foreach ($this->getBundleProducts() as $bundle) {
            $ids[] = $bundle['product']->getId();
        }
        return $ids;
    }
    
    public function getCampaignInfo()
    {
        return $this->data['campaign_info'] ?? null;
    }
    
    public function hasCategory($categoryId)
    {
        foreach ($this->getCategories() as $category) {
            if ($category->getId() == $categoryId) {
                return true;
            }
        }
        return false;
    }
    
    public function getNoShopping()
    {
        return $this->data['no_shopping'] ?? false;
    }
    
    public function getHasCreditUntil()
    {
        return !empty($this->data['credit_until']);
    }
    
    public function getCreditUntil()
    {
        return $this->data['credit_until'] ?? null;
    }
    
    public function getHasCreditDays()
    {
        return !empty($this->data['credit_days']);
    }
    
    public function getCreditDays()
    {
        return $this->data['credit_days'] ?? 0;
    }
    
    public function getHasCreditDate()
    {
        return !empty($this->data['credit_date']);
    }
    
    public function getCreditDate()
    {
        return $this->data['credit_date'] ?? null;
    }
    
    public function getAmount()
    {
        return $this->data['amount'] ?? 1;
    }
    
    public function getPurchasePrice($attributeId = null, $attributeValueId = null)
    {
        if ($attributeId && $attributeValueId) {
            return $this->data['variant_purchase_price'][$attributeId][$attributeValueId] ?? 0;
        }
        return $this->data['purchase_price'] ?? 0;
    }
    
    public function getRealSubscriptionPrice($amount = 1, $attributes = [], $countryId = null)
    {
        $price = $this->getSubscriptionPrice($countryId);
        // Add attribute prices if any
        foreach ($attributes as $attributeValueId) {
            $price += $this->getAttributeSubscriptionPrice($attributeValueId, $countryId);
        }
        return $price * $amount;
    }
    
    public function getRealSubscriptionVat($amount = 1, $attributes = [], $countryId = null)
    {
        return $this->getProductVat($countryId);
    }
    
    public function getSubscriptionFixation()
    {
        return $this->data['subscription_fixation'] ?? 0;
    }
    
    public function getNext()
    {
        if (!empty($this->data['next_product'])) {
            return new SafeProduct($this->data['next_product']);
        }
        return null;
    }
    
    public function getPrev()
    {
        if (!empty($this->data['prev_product'])) {
            return new SafeProduct($this->data['prev_product']);
        }
        return null;
    }
    
    public function getSearch()
    {
        return $this->data['search'] ?? '';
    }
    
    public function getSafeProduct()
    {
        return $this;
    }
    
    public function getSimilarProductRatings()
    {
        return $this->data['similar_product_ratings'] ?? [];
    }
    
    public function getSimilarProductReviews()
    {
        return $this->data['similar_product_reviews'] ?? [];
    }
    
    public function getPDF()
    {
        return $this->data['pdf'] ?? null;
    }
    
    private function formatPrice($price)
    {
        // Format price as needed (could be configurable)
        return number_format($price, 2, ',', '.');
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
}