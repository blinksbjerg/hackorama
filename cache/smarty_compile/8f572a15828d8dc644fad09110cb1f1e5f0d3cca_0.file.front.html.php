<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:15
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/front.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af837b14d2_93501316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f572a15828d8dc644fad09110cb1f1e5f0d3cca' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/front.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inner-product.html' => 1,
  ),
),false)) {
function content_6882af837b14d2_93501316 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "title", null, null);
echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
 - <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getName();
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div class="products">

	<div class="row">
		<?php $_smarty_tpl->_assignInScope('products', $_smarty_tpl->tpl_vars['category']->value->getOnlineProducts());?>

		<?php
$__section_productlist_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['products']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_productlist_0_total = $__section_productlist_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_productlist'] = new Smarty_Variable(array());
if ($__section_productlist_0_total !== 0) {
for ($__section_productlist_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index'] = 0; $__section_productlist_0_iteration <= $__section_productlist_0_total; $__section_productlist_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index']++){
?>
			<div class="col-6 col-lg-3 col-md-3 col-sm-6 mb-4">
				<?php $_smarty_tpl->_subTemplateRender("file:inner-product.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index'] : null)]), 0, true);
?>
			</div>
		<?php
}
}
?>

	</div>

</div><?php }
}
