<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:50
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/ratings.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882afa6429653_25591261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fcb42f0cfaaa05c270a636ac18637190c92ebb4' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/ratings.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882afa6429653_25591261 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['rating']->value) {?>
	<?php $_smarty_tpl->_assignInScope('star_class', "one");?>

	<?php if ($_smarty_tpl->tpl_vars['rating']->value > 4) {?>
		<?php $_smarty_tpl->_assignInScope('star_class', "five");?>
	<?php } elseif ($_smarty_tpl->tpl_vars['rating']->value > 3) {?>
		<?php $_smarty_tpl->_assignInScope('star_class', "four");?>
	<?php } elseif ($_smarty_tpl->tpl_vars['rating']->value > 2) {?>
		<?php $_smarty_tpl->_assignInScope('star_class', "three");?>
	<?php } elseif ($_smarty_tpl->tpl_vars['rating']->value > 1) {?>
		<?php $_smarty_tpl->_assignInScope('star_class', "two");?>
	<?php } elseif ($_smarty_tpl->tpl_vars['rating']->value > 0) {?>
		<?php $_smarty_tpl->_assignInScope('star_class', "one");?>
	<?php }?>

	<div class="rating <?php echo $_smarty_tpl->tpl_vars['star_class']->value;?>
-stars">
		<div class="star-rating"></div>
		<div class="star-bg"></div>
	</div>
<?php }
}
}
