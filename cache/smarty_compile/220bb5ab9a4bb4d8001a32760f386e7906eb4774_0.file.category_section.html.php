<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/category_section.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e4933b6_01504606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '220bb5ab9a4bb4d8001a32760f386e7906eb4774' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/category_section.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:category_section.html' => 2,
  ),
),false)) {
function content_6882af5e4933b6_01504606 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
if ($_smarty_tpl->tpl_vars['categories']->value) {?>

	<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'side_tb') {?>

		<ul>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat', false, NULL, 'i', array (
));
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
				<?php if ($_smarty_tpl->tpl_vars['cat']->value->getInMenu()) {?>
					<?php $_smarty_tpl->_assignInScope('children', $_smarty_tpl->tpl_vars['cat']->value->getChildren());?>
					<?php $_smarty_tpl->_assignInScope('cnt', smarty_modifier_count($_smarty_tpl->tpl_vars['children']->value));?>

					<li>
						<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value->getUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value->getName());?>
 <?php if ($_smarty_tpl->tpl_vars['cnt']->value) {?><span>(<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
)</span><?php }?></a>
						<?php $_smarty_tpl->_subTemplateRender("file:category_section.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('categories'=>$_smarty_tpl->tpl_vars['children']->value,'mode'=>"side_tb"), 0, true);
?>
					</li>
				<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>

	<?php } else { ?>

		<ul>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat', false, NULL, 'i', array (
));
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
				<?php if ($_smarty_tpl->tpl_vars['cat']->value->getInMenu()) {?>
					<li>
						<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value->getUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value->getName());?>
</a>
					</li>
				<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	<?php }?>

<?php }
}
}
