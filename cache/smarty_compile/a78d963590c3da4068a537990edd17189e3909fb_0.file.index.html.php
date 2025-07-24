<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:15
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af8379a124_21866186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a78d963590c3da4068a537990edd17189e3909fb' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/index.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:handle_page_blocks.html' => 2,
    'file:inner_index.html' => 1,
  ),
),false)) {
function content_6882af8379a124_21866186 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">

	<?php $_smarty_tpl->_subTemplateRender("file:handle_page_blocks.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('display'=>"top"), 0, false);
?>

	<?php $_smarty_tpl->_subTemplateRender("file:inner_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->_subTemplateRender("file:handle_page_blocks.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('display'=>"bottom"), 0, true);
?>

</div><?php }
}
