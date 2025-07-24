<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/tracking_top.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e46ee93_66384767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '275f2d2965ec12ac77d3ae21766e30f7bce9e2f4' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/tracking_top.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882af5e46ee93_66384767 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
if ($_smarty_tpl->tpl_vars['webshop']->value->getEnableTracking() && $_smarty_tpl->tpl_vars['cookie']->value['accept_cookies'] == 'accept') {?>
	<?php echo '<script'; ?>
>
	    product = []; // Containing all products of the current page
	    dataLayer = [];
	<?php echo '</script'; ?>
>


		<?php echo '<script'; ?>
>
	    window.dataLayer = window.dataLayer || [];
	    window.dataLayer.push({
	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleAdsConversionId()) {?>
	            'settings.Google.Ads_Conversion_ID': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleAdsConversionId();?>
',
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleAdsConversionLabelOrder()) {?>
	            'settings.Google.Ads_Conversion_Label_Order': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleAdsConversionLabelOrder();?>
',
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGaId()) {?>
	            'settings.Google.Analytics_Tracking_ID': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGaId();?>
',
	        <?php }?>

	        'settings.Google.Analytics_Anonymize_IP': 'true',
	        'settings.Google.Analytics_Enhanced_Link_Attribution': 'true',
	        'settings.Google.Analytics_Checkout_Label_Basket': '/basket',
	        'settings.Google.Analytics_Checkout_Label_Address': '/address',
	        'settings.Google.Analytics_Checkout_Label_Shipping': '/shipping',
	        'settings.Google.Analytics_Checkout_Label_Approve': '/approve',
	        'settings.Google.Analytics_Checkout_Label_Payment': '/payment',

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantId()) {?>
	            'settings.Google.Merchant_Center_ID': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantId();?>
',
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantId()) {?>
	            'settings.Google.Merchant_Center_Customer_Reviews': 'true',
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantDeliveryDays()) {?>
	            'settings.Google.Merchant_Center_Delivery_Days': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantDeliveryDays();?>
',
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleOptimizeId()) {?>
	            'settings.Google.Optimize_Container_ID': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleOptimizeId();?>
',
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getGoogleTagManagerId()) {?>
	            'settings.Google.Tag_Manager_Containder_ID': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleTagManagerId();?>
',
	        <?php }?>
	        
	        <?php if ($_smarty_tpl->tpl_vars['webshop']->value->getFbId()) {?>
			  	'settings.Facebook.Pixel_ID': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getFbId();?>
',
			<?php }?>

	        'event': 'ThemeSettings'
		});
	<?php echo '</script'; ?>
>
	
		    <?php if ($_smarty_tpl->tpl_vars['product']->value) {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getProductId()) {?>
	                        'ecomm_prodid': '<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
',
	                    <?php }?>
	                    'ecomm_pagetype': 'product',
	                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getRealPrice()) {?>
	                        'ecomm_totalvalue': '<?php echo $_smarty_tpl->tpl_vars['product']->value->getRealPrice();?>
',
	                    <?php }?>
	                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getMainCategory()) {?>
	                        <?php $_smarty_tpl->_assignInScope('prodmaincat', $_smarty_tpl->tpl_vars['product']->value->getMainCategory());?>
	                        'ecomm_category': '<?php echo $_smarty_tpl->tpl_vars['prodmaincat']->value->getName();?>
',
	                    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->getCategory()) {?>
	                        'ecomm_category': '<?php echo $_smarty_tpl->tpl_vars['product']->value->getCategoryName();?>
',
	                    <?php }?>
	                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getSalePrice() < 0) {?>
	                        isSaleItem: true
	                    <?php } else { ?>
	                        isSaleItem: false
	                    <?php }?>
	                });
	            <?php echo '</script'; ?>
>
	        
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'view_item',
	                    'ecommerce': {
	                        'detail': {
	                            'products': [{
	                                <?php if ($_smarty_tpl->tpl_vars['product']->value->getName()) {?>
	                                    'name': '<?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
',
	                                <?php }?>
	                                <?php if ($_smarty_tpl->tpl_vars['product']->value->getProductId()) {?>
	                                    'id': '<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
',
	                                <?php }?>
	                                <?php if ($_smarty_tpl->tpl_vars['product']->value->getRealPrice()) {?>
	                                    'price': '<?php echo $_smarty_tpl->tpl_vars['product']->value->getRealPrice();?>
',
	                                <?php }?>
	                                <?php if ($_smarty_tpl->tpl_vars['product']->value->getBrand()) {?>
	                                    <?php $_smarty_tpl->_assignInScope('productbrand', $_smarty_tpl->tpl_vars['product']->value->getBrand());?>
	                                    'brand': '<?php echo $_smarty_tpl->tpl_vars['productbrand']->value->getName();?>
',
	                                <?php }?>
	                                <?php if ($_smarty_tpl->tpl_vars['product']->value->getMainCategory()) {?>
	                                    <?php $_smarty_tpl->_assignInScope('prodmaincat', $_smarty_tpl->tpl_vars['product']->value->getMainCategory());?>
	                                    'category': '<?php echo $_smarty_tpl->tpl_vars['prodmaincat']->value->getName();?>
',
	                                <?php }?>
	                                	                                'google_business_vertical': 'retail'
	                            }]
	                        }
	                    }
	                });
	            <?php echo '</script'; ?>
>
	        
	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	        <?php $_smarty_tpl->_assignInScope('catproducts', $_smarty_tpl->tpl_vars['category']->value->getOnlineProducts());?>

	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    <?php if ($_smarty_tpl->tpl_vars['category']->value->isFront()) {?>
	                        'ecomm_pagetype': 'home',
	                    <?php } else { ?>
	                        'ecomm_pagetype': 'category',
	                        'ecomm_category': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value->getName());?>
'
	                    <?php }?>
	                });
	            <?php echo '</script'; ?>
>
	        
	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['landing_page']->value) {?>
	        <?php $_smarty_tpl->_assignInScope('lpproducts', $_smarty_tpl->tpl_vars['landing_page']->value->getProducts());?>

	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'category'
	                });
	            <?php echo '</script'; ?>
>
	        
	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['page']->value) {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['blog_post']->value || $_smarty_tpl->tpl_vars['blog']->value) {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "search.html") {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'searchresults'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "basket.html") {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_prodid': [
							<?php
$__section_retargeting_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['basket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_retargeting_1_total = $__section_retargeting_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_retargeting'] = new Smarty_Variable(array());
if ($__section_retargeting_1_total !== 0) {
for ($__section_retargeting_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['index'] = 0; $__section_retargeting_1_iteration <= $__section_retargeting_1_total; $__section_retargeting_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['last'] = ($__section_retargeting_1_iteration === $__section_retargeting_1_total);
?>'<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['index'] : null)]['id'];?>
'<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_retargeting']->value['last'] : null)) {?>,<?php }
}
}
?>
						],
	                    'ecomm_pagetype': 'cart',
	                    'ecomm_totalvalue': <?php echo $_smarty_tpl->tpl_vars['price']->value;?>

	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value != "thanks.html" && $_smarty_tpl->tpl_vars['order']->value) {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "thanks.html" && $_smarty_tpl->tpl_vars['order']->value) {?>
	        	            <?php if (!$_smarty_tpl->tpl_vars['order']->value->getTrackingCalled()) {?>
	                <?php $_smarty_tpl->_assignInScope('orderproducts', $_smarty_tpl->tpl_vars['order']->value->getProducts());?>

	                	                    <?php echo '<script'; ?>
>
	                        window.dataLayer = window.dataLayer || [];
	                        window.dataLayer.push({
	                            'event': 'GoogleAdsDynamicRemarketing',
	                            'ecomm_prodid': [
	                                <?php
$__section_orderproductids_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['orderproducts']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_orderproductids_2_total = $__section_orderproductids_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_orderproductids'] = new Smarty_Variable(array());
if ($__section_orderproductids_2_total !== 0) {
for ($__section_orderproductids_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['index'] = 0; $__section_orderproductids_2_iteration <= $__section_orderproductids_2_total; $__section_orderproductids_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['last'] = ($__section_orderproductids_2_iteration === $__section_orderproductids_2_total);
?>
	                                    '<?php echo $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['index'] : null)]->getProductId();?>
'
	                                    <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproductids']->value['last'] : null)) {?>,<?php }?>
	                                <?php
}
}
?>
	                                ],
	                            'ecomm_pagetype': 'purchase',
	                            'ecomm_totalvalue': <?php echo $_smarty_tpl->tpl_vars['order']->value->getPrice();?>
,
	                        });
	                    <?php echo '</script'; ?>
>
	                
	                	                    <?php echo '<script'; ?>
>
	                        window.dataLayer = window.dataLayer || [];
	                        window.dataLayer.push({
	                            'event': 'eecPurchase',
	                            'ecommerce': {
	                                'currencyCode': '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
',
	                                'purchase': {
	                                    'actionField': {
	                                        <?php if ($_smarty_tpl->tpl_vars['order']->value->getWebshopOrderId()) {?>
	                                            'id': '<?php echo $_smarty_tpl->tpl_vars['order']->value->getWebshopOrderId();?>
',
	                                        <?php }?>
	                                        <?php if ($_smarty_tpl->tpl_vars['order']->value->getPrice()) {?>
	                                            'revenue': '<?php echo $_smarty_tpl->tpl_vars['order']->value->getPrice();?>
',
	                                        <?php }?>
	                                        <?php if ($_smarty_tpl->tpl_vars['order']->value->getVat()) {?>
	                                            'tax':'<?php echo $_smarty_tpl->tpl_vars['order']->value->getVat();?>
',
	                                        <?php }?>
	                                        <?php if ($_smarty_tpl->tpl_vars['order']->value->getShippingPrice()) {?>
	                                            'shipping': '<?php echo $_smarty_tpl->tpl_vars['order']->value->getShippingPrice();?>
',
	                                        <?php }?>
	                                        <?php if ($_smarty_tpl->tpl_vars['order']->value->getVoucherCode()) {?>
	                                            'coupon': '<?php echo $_smarty_tpl->tpl_vars['order']->value->getVoucherCode();?>
'
	                                        <?php }?>
	                                    },
	                                    'products': [
	                                        <?php $_smarty_tpl->_assignInScope('orderproducts', $_smarty_tpl->tpl_vars['order']->value->getProducts());
$__section_orderproducts_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['orderproducts']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_orderproducts_3_total = $__section_orderproducts_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_orderproducts'] = new Smarty_Variable(array());
if ($__section_orderproducts_3_total !== 0) {
for ($__section_orderproducts_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] = 0; $__section_orderproducts_3_iteration <= $__section_orderproducts_3_total; $__section_orderproducts_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['last'] = ($__section_orderproducts_3_iteration === $__section_orderproducts_3_total);
?>{<?php if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getName()) {?>'name': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getName());?>
',<?php }
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getProductId()) {?>'id': '<?php echo $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getProductId();?>
',<?php }
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getGtin()) {?>'gtin': '<?php echo $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getGtin();?>
',<?php }
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getUnitPrice()) {?>'price': '<?php echo $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getUnitPrice();?>
',<?php }
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getBrand()) {
$_smarty_tpl->_assignInScope('productbrand', $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getBrand());?>'brand': '<?php echo $_smarty_tpl->tpl_vars['productbrand']->value->getName();?>
',<?php }
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getMainCategory()) {
$_smarty_tpl->_assignInScope('prodmaincat', $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getMainCategory());?>'category': '<?php echo $_smarty_tpl->tpl_vars['prodmaincat']->value->getName();?>
',<?php }
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->hasVariants()) {?>,<?php $_smarty_tpl->_assignInScope('attributes', $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getAttributes());
if ($_smarty_tpl->tpl_vars['attributes']->value) {
$__section_j_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attributes']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_4_total = $__section_j_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_4_total !== 0) {
for ($__section_j_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_4_iteration <= $__section_j_4_total; $__section_j_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>'variant': '<?php echo $_smarty_tpl->tpl_vars['attributes']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['val'];?>
'<?php
}
}
}
}
if ($_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getAmount()) {?>'quantity': <?php echo $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['index'] : null)]->getAmount();
}?>}<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_orderproducts']->value['last'] : null)) {
} else { ?>,<?php }
}
}
?>
	                                    ]
	                                }
	                            }
	                        });
	                    <?php echo '</script'; ?>
>
	                
	                	                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['Google']['Merchant_Center_Customer_Reviews'] == "true") {?>
	                        <?php echo '<script'; ?>
 src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer><?php echo '</script'; ?>
>
	                        <?php echo '<script'; ?>
>
	                            window.renderOptIn = function() {
	                                window.gapi.load('surveyoptin', function() {
	                                    window.gapi.surveyoptin.render(
	                                        {
	                                            "merchant_id": <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantId();?>
,
	                                            "order_id": "<?php echo $_smarty_tpl->tpl_vars['order']->value->getWebshopOrderId();?>
",
	                                            "email": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getEmail());?>
",
	                                            "delivery_country": "DK",
	                                            "estimated_delivery_date": "<?php echo smarty_modifier_date_format((("+").($_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantDeliveryDays())).(" days"),"%Y-%m-%d");?>
",

	                                            <?php if ($_smarty_tpl->tpl_vars['settings']->value['Google']['Merchant_Center_Product_Reviews'] == "true") {?>
	                                                "products":
	                                                [<?php
$__section_gtin_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['orderproducts']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_gtin_5_total = $__section_gtin_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_gtin'] = new Smarty_Variable(array());
if ($__section_gtin_5_total !== 0) {
for ($__section_gtin_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['index'] = 0; $__section_gtin_5_iteration <= $__section_gtin_5_total; $__section_gtin_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['last'] = ($__section_gtin_5_iteration === $__section_gtin_5_total);
?>{<?php $_smarty_tpl->_assignInScope('prodgtin', $_smarty_tpl->tpl_vars['orderproducts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['index'] : null)]->getGtin());
if ($_smarty_tpl->tpl_vars['prodgtin']->value) {?>"gtin":"<?php echo $_smarty_tpl->tpl_vars['prodgtin']->value;?>
"<?php }?>}<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_gtin']->value['last'] : null)) {
} else { ?>,<?php }
}
}
?>]
	                                            <?php }?>
	                                        });
	                                });
	                            }
	                        <?php echo '</script'; ?>
>
	                    <?php }?>
	                
	                	                    <?php echo '<script'; ?>
>
	                        window.dataLayer = window.dataLayer || [];
	                        window.dataLayer.push({
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getEmail()) {?>
	                                'order.email': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getEmail());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getPhone()) {?>
	                                'order.phone': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getPhone());?>
',
	                            <?php }?>
	                           <?php if ($_smarty_tpl->tpl_vars['order']->value->getOrderName()) {?>
	                                'order.name': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getOrderName());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getOrderCompanyName()) {?>
	                                'order.companyname': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getOrderCompanyName());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getOrderAddress()) {?>
	                                'order.address': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getOrderAddress());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getOrderZipcode()) {?>
	                                'order.zipcode': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getOrderZipcode());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getOrderCity()) {?>
	                                'order.city': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getOrderCity());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getOrderCountry()) {?>
	                                'order.country': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getOrderCountry());?>
',
	                            <?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['order']->value->getDelCountry()) {?>
	                                'del.country': '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['order']->value->getDelCountry());?>
',
	                            <?php }?>
	                            "del.date": "<?php echo smarty_modifier_date_format((("+").($_smarty_tpl->tpl_vars['webshop']->value->getGoogleMerchantDeliveryDays())).(" days"),"%Y-%m-%d");?>
"
	                            }
	                        );
	                    <?php echo '</script'; ?>
>
	                	            <?php }?>

	            <?php echo $_smarty_tpl->tpl_vars['order']->value->setTrackingCalled();?>

	        
	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "404.html") {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "410.html") {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "user-sign-in.html" && $_smarty_tpl->tpl_vars['customer']->value) {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php if ($_smarty_tpl->tpl_vars['inc']->value == "user-sign-up.html" && $_smarty_tpl->tpl_vars['created']->value) {?>
	        	            <?php echo '<script'; ?>
>
	                window.dataLayer = window.dataLayer || [];
	                window.dataLayer.push({
	                    'event': 'GoogleAdsDynamicRemarketing',
	                    'ecomm_pagetype': 'other'
	                });
	            <?php echo '</script'; ?>
>
	        	    <?php }?>
	
		    <?php echo '<script'; ?>
>
	        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	        })(window,document,'script','dataLayer','<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleTagManagerId();?>
');
	    <?php echo '</script'; ?>
>
	
<?php }
}
}
