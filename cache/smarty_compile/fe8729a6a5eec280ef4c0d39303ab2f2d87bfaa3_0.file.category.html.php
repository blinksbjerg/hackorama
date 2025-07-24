<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:13
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/category.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af81b48a41_75194635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe8729a6a5eec280ef4c0d39303ab2f2d87bfaa3' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/category.html',
      1 => 1753393227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inner-product.html' => 1,
  ),
),false)) {
function content_6882af81b48a41_75194635 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "title", null, null);
echo $_smarty_tpl->tpl_vars['category']->value->getName();
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div class="container">
	<h1><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value->getName());?>
</h1>

	<p><?php echo $_smarty_tpl->tpl_vars['category']->value->getDescriptionA();?>
</>

	<div class="products">
		<div class="row">
			<?php $_smarty_tpl->_assignInScope('productposition', 1);?>
			<?php
$__section_productlist_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['products']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_productlist_0_total = $__section_productlist_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_productlist'] = new Smarty_Variable(array());
if ($__section_productlist_0_total !== 0) {
for ($__section_productlist_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index'] = 0; $__section_productlist_0_iteration <= $__section_productlist_0_total; $__section_productlist_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index']++){
?>
				<div class="col-lg-3 col-md-4 col-6 mb-3">
					<?php $_smarty_tpl->_subTemplateRender("file:inner-product.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['index'] : null)]), 0, true);
?>
				</div>
			<?php
}
}
?>
		</div>
	</div>

	<p><?php echo $_smarty_tpl->tpl_vars['category']->value->getDescriptionB();?>
</>

	<?php if ($_smarty_tpl->tpl_vars['pager']->value) {?>
		<?php $_smarty_tpl->_assignInScope('pages', $_smarty_tpl->tpl_vars['pager']->value->render());?>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value) {?>
			<p class="pager" id="pager"><?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</p>
		<?php }?>
	<?php }?>
</div><?php }
}
