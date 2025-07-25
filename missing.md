# Missing API Endpoints and Data in Shoporama REST API

This document lists all the missing API endpoints and data fields that were discovered while implementing Hackorama with the Alaska2 theme.

## Missing API Endpoints

### Customers
- `/customer` endpoint returns empty array instead of list of customers
- Can only fetch individual customers by ID with `/customer/{id}`
- No search/filter parameters work on customer endpoint
- Must know customer ID in advance to fetch data

### Categories
- Categories are missing proper IDs (currently returning 0)
- Missing `in_menu` field to determine if category should be shown in navigation
- Missing child categories structure

### Products  
- Missing fields:
  - `own_id` - Product's own identifier
  - `avg_rating` - Average customer rating
  - `profile` - Product profile/attribute data structure
  - `allow_negative_stock` - Whether negative stock is allowed
  - `delivery_time` - Delivery time in days
  - `package` - Package information
  - `unit` - Unit of measurement (stk, kg, etc.)
  - `min_amount` - Minimum order amount
  - `groups` - Product groups
  - `variants` - Product variants
  - `files` - Downloadable files (manuals, etc.)
  - `tags` - Product tags
  - `related_products` - Related/recommended products

### Images
- Missing fields:
  - `width` - Image width
  - `height` - Image height
  - `description` - Image description/alt text

### Webshop Methods
These methods are called by templates but not available through REST API:
- `getFinancialProducts()` - Financial/payment products
- `getStockLocations()` - Available stock locations
- `getDefaultStockLocation()` - Default stock location
- `getMenuByLocation($location)` - Menu structure by location

### Menu System ✅ IMPLEMENTED
- `/menu` endpoint now available in Shoporama API
- Templates expect menu items with:
  - `getClass()` - CSS class for menu item
  - `getUrl()` - URL for menu item  
  - `getTitel()` - Title for menu item (note the Danish spelling)
  - `getChildren()` - Child menu items

### Landing Pages ✅ IMPLEMENTED
- `/landing-page` endpoint now available in Shoporama API
- Templates expect landing pages with product listings
- Used for campaign/promotional pages

### Missing Pages/Endpoints
- `/basket` - Basket/cart functionality
- `/search` - Search functionality  
- `/address` - Checkout address page
- `/shipping` - Shipping options
- `/payment` - Payment options
- `/user-sign-in` - User login
- `/user-sign-up` - User registration
- `/user-edit` - User profile edit
- `/user-orders` - Order history
- `/blog` - Blog functionality

### Additional Webshop Methods Found
These are called by basket/checkout templates:
- `hasPayPalCheckout()` - PayPal checkout availability
- `hasInvoiceAddressSelection()` - Invoice address selection
- `hasDeliveryAddressSelection()` - Delivery address selection
- `getDeliveryCountries()` - Available delivery countries
- `hasSubscriptions()` - Subscription functionality
- `getCustomerFields()` - Custom customer fields
- `getHasUspsBesked()` - USPS besked functionality
- `getCountries()` - List of available countries
- `getProductBySku($sku)` - Find product by SKU

### Product Methods Found
Additional methods called by product templates:
- `getProductReviews()` - Product reviews
- `getManufacturer()` - Product manufacturer
- `getSafetyProfile()` - Safety profile data
- `getManufacturerUrl()` - Manufacturer URL
- `hasWideImage()` / `getWideImage()` - Wide image support
- `getMaxAmount()` - Maximum order amount
- `getQualityHtml()` / `getQualityDescription()` - Quality info
- `hasCombiProfile()` / `getCombiProfile()` - Combination profiles
- `getProductReviewsAvg()` / `getProductReviewsCount()` - Review statistics
- `getSimilarProducts()` - Similar/related products
- `getPdfFiles()` - PDF files need proper structure with url, filename, and size fields

## Data Structure Issues

### Product Price Methods
The templates expect these price-related methods with parameters:
- `getRealPrice($amount, $attributes)` - Should calculate price based on amount and attributes
- Price should be returned as float, not formatted string

### Category Products
- Categories need a way to fetch their products
- Currently using `getOnlineProducts()` but this needs API support

### Settings Structure
Templates expect these settings:
- `settings.design.color`
- `settings.design.background_color`
- `settings.settings.disable_admin_menu`
- `settings.settings.user_id`

## Template Variables Missing
These variables are expected by templates but need to be provided:
- `viabill_code` - ViaBill payment integration code
- `mail` - Contact email for product inquiries
- `contact_on_products` - Whether to show contact option on products
- `show_reviews` - Whether to show product reviews
- `wrong_voucher` - Error flag for invalid voucher codes
- `pager` - Pagination object for category pages

## Recommendations

1. Add proper REST endpoints for all missing functionality
2. Include all required fields in API responses
3. Consider implementing a `/webshop/info` endpoint that returns webshop configuration including menus, settings, etc.
4. Add support for filtering/searching products with proper parameters
5. Implement user/session management endpoints for basket and user functionality
6. Add reviews endpoint to fetch and submit product reviews
7. Implement proper category hierarchy with parent/child relationships
8. Add menu system API for dynamic navigation

## Implemented in Hackorama

The following features have been implemented locally in Hackorama to work around missing API endpoints:

1. **BasketManager** - Cookie-based basket management with JSON storage
2. **Image Scaling** - Local image caching and scaling functionality
3. **SafePdfFile** - Wrapper for PDF file objects with proper methods
4. **Template Fixes** - Added isset() checks to prevent undefined array key warnings
5. **Error Suppression** - Configured to suppress deprecation warnings

All Safe* wrapper methods from Shoporama source have been implemented, including:
- 150+ methods in SafeProduct
- All required methods in SafeCategory, SafeWebshop, SafeImage, etc.
- **SafeMenu** and **SafeMenuItem** - Full menu system integration
- **SafeLandingPage** - Landing page support with real products from API (no longer mock data)
- **Menu Navigation** - Templates now use actual Shoporama menu data via `getMenuByLocation()`
- **Voucher Template Fix** - Fixed htmlspecialchars error in basket template
- **ProductCache System** - Advanced caching system that fetches all products from API
- **ImageCache System** - Automatic image download and caching from configurable source
- **Image Dimensions** - Correct image dimensions matching production site (300x400px box mode for landing pages, 500x500px fit mode for product pages)
- **User System** - Complete user sign-in, profile editing, and order history
- **Blog System** - Full blog functionality with real images from cache
- **Search System** - Product search with proper template integration