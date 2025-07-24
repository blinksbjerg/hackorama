<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:15
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/inner_index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af837abbd6_76013338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f24f1feb3e26e1858eb5b39e3517e45da68bedc' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/inner_index.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:front.html' => 1,
    'file:category.html' => 1,
    'file:landing_page.html' => 1,
    'file:product.html' => 1,
    'file:page.html' => 1,
    'file:blog_post.html' => 1,
  ),
),false)) {
function content_6882af837abbd6_76013338 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['inc']->value) {?>

	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['inc']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['category']->value) {?>

	<?php if ($_smarty_tpl->tpl_vars['category']->value->isFront()) {?>

		<?php $_smarty_tpl->_subTemplateRender("file:front.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category'=>$_smarty_tpl->tpl_vars['category']->value), 0, false);
?>

	<?php } else { ?>

		<div class="products">
			<?php $_smarty_tpl->_subTemplateRender("file:category.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category'=>$_smarty_tpl->tpl_vars['category']->value), 0, false);
?>
		</div>

	<?php }?>

<?php } elseif ($_smarty_tpl->tpl_vars['landing_page']->value) {?>

	<div class="products">
		<?php $_smarty_tpl->_subTemplateRender("file:landing_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('landing_page'=>$_smarty_tpl->tpl_vars['landing_page']->value), 0, false);
?>
	</div>

<?php } elseif ($_smarty_tpl->tpl_vars['product']->value) {?>

	<?php $_smarty_tpl->_subTemplateRender("file:product.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, false);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['page']->value) {?>

	<?php $_smarty_tpl->_subTemplateRender("file:page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['page']->value), 0, false);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['blog_post']->value) {?>

	<?php $_smarty_tpl->_subTemplateRender("file:blog_post.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['blog_post']->value), 0, false);
?>

<?php }
}
}
