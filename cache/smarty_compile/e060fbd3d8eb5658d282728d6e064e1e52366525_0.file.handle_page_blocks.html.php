<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:15
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/handle_page_blocks.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af837a3504_26444509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e060fbd3d8eb5658d282728d6e064e1e52366525' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/handle_page_blocks.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/".((string)$_smarty_tpl->tpl_vars[\'type\']->value).".html' => 1,
  ),
),false)) {
function content_6882af837a3504_26444509 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['page_blocks']->value) {?>

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page_blocks']->value, 'section');
$_smarty_tpl->tpl_vars['section']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
$_smarty_tpl->tpl_vars['section']->do_else = false;
?>
		<?php $_smarty_tpl->_assignInScope('type', $_smarty_tpl->tpl_vars['section']->value['_type']);?>

		<?php if ($_smarty_tpl->tpl_vars['webshop']->value->templateExists("sections/".((string)$_smarty_tpl->tpl_vars['type']->value).".html")) {?>

			<?php if ($_smarty_tpl->tpl_vars['section']->value['display'] == $_smarty_tpl->tpl_vars['display']->value) {?>

				<?php $_smarty_tpl->_subTemplateRender("file:sections/".((string)$_smarty_tpl->tpl_vars['type']->value).".html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

			<?php }?>

		<?php }?>

	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
}
