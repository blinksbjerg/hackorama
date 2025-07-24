<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:06:32
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/klaviyo_add_to_cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882ae685c27e8_85457944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85a884e1537ea761727f4f17dc9c9ed2d0e9fc8a' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/klaviyo_add_to_cart.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882ae685c27e8_85457944 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
if ($_smarty_tpl->tpl_vars['product']->value && $_smarty_tpl->tpl_vars['webshop']->value->getEnableTracking() && $_smarty_tpl->tpl_vars['webshop']->value->getUseEvents() && $_smarty_tpl->tpl_vars['cookie']->value['accept_cookies'] == 'accept') {?>

	 <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "item_names", null, null);
$__section_i_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['basket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_5_total = $__section_i_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_5_total !== 0) {
for ($__section_i_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_5_iteration <= $__section_i_5_total; $__section_i_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_i']->value['last'] = ($__section_i_5_iteration === $__section_i_5_total);
$_smarty_tpl->_assignInScope('p', $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product']);?>"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value->getName());?>
"<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['last'] : null)) {?>,<?php }
}
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

	 <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "added_item_categories", null, null);
$_smarty_tpl->_assignInScope('categories', $_smarty_tpl->tpl_vars['product']->value->getCategories());
$__section_i_6_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['categories']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_6_total = $__section_i_6_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_6_total !== 0) {
for ($__section_i_6_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_6_iteration <= $__section_i_6_total; $__section_i_6_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_i']->value['last'] = ($__section_i_6_iteration === $__section_i_6_total);
?>"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categories']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getName());?>
"<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['last'] : null)) {?>,<?php }
}
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

	 <?php $_smarty_tpl->_assignInScope('image', $_smarty_tpl->tpl_vars['product']->value->getImage());?>

	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() {

		var show = true;

		if ('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
' == 'product' && window.location.hash != '#added') {
			show = false;
		}

		_learnq.push(["track", "Added to Cart", {
		     "$value": <?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2,".",'');?>
,

		     "AddedItemProductName": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName());?>
",
		     "AddedItemProductID": "<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
",
		     "AddedItemSKU": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getOwnId());?>
",
		     "AddedItemCategories": [<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'added_item_categories');?>
],
		     "AddedItemImageURL": "<?php if ($_smarty_tpl->tpl_vars['image']->value) {
echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getUrl());
echo $_smarty_tpl->tpl_vars['image']->value->getSrc(500,500,'fit');
}?>",
		     "AddedItemURL": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
",
		     "AddedItemPrice": <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(),2,".",'');?>
,
		     "AddedItemQuantity": 1,
		     "ItemNames": [<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'item_names');?>
],
		     "CheckoutURL": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getUrl());?>
/basket",

		     "Items": [
				<?php
$__section_i_7_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['basket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_7_total = $__section_i_7_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_7_total !== 0) {
for ($__section_i_7_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_7_iteration <= $__section_i_7_total; $__section_i_7_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_i']->value['last'] = ($__section_i_7_iteration === $__section_i_7_total);
?>
					<?php $_smarty_tpl->_assignInScope('p', $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product']);?>
				 	<?php $_smarty_tpl->_assignInScope('image', $_smarty_tpl->tpl_vars['p']->value->getImage());?>
					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "product_categories", null, null);
$_smarty_tpl->_assignInScope('categories', $_smarty_tpl->tpl_vars['p']->value->getCategories());
$__section_j_8_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['categories']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_8_total = $__section_j_8_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_8_total !== 0) {
for ($__section_j_8_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_8_iteration <= $__section_j_8_total; $__section_j_8_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_j']->value['last'] = ($__section_j_8_iteration === $__section_j_8_total);
?>"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categories']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getName());?>
"<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['last'] : null)) {?>,<?php }
}
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

					 {
			         "ProductID": "<?php echo $_smarty_tpl->tpl_vars['p']->value->getProductId();?>
",
			         "SKU": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value->getOwnId());?>
",
			         "ProductName": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value->getName());?>
",
			         "Quantity": <?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amount'];?>
,
			         "ItemPrice": <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(1,$_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes']),2,".",'');?>
,
			         "RowTotal": <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice($_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amount'],$_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes']),2,".",'');?>
,
			         "ProductURL": "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
",
			         "ImageURL": "<?php if ($_smarty_tpl->tpl_vars['image']->value) {
echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getUrl());
echo $_smarty_tpl->tpl_vars['image']->value->getSrc(500,500,'fit');
}?>",
			         "ProductCategories": [<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'product_categories');?>
]
				 	}
				 	<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['last'] : null)) {?>,<?php }?>
				<?php
}
}
?>
		     ]
		   }]);

	   });

	<?php echo '</script'; ?>
>

<?php }
}
}
