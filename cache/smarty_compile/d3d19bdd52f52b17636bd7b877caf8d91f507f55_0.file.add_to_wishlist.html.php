<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:50
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/add_to_wishlist.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882afa64594f1_53175827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3d19bdd52f52b17636bd7b877caf8d91f507f55' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/add_to_wishlist.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882afa64594f1_53175827 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/block.t.php','function'=>'smarty_block_t',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
if ($_smarty_tpl->tpl_vars['product']->value && $_smarty_tpl->tpl_vars['customer']->value && $_smarty_tpl->tpl_vars['settings']->value['settings']['use_wishlist']) {?>

	<?php $_prefixVariable6 = $_smarty_tpl->tpl_vars['customer']->value->getWishlists();
$_smarty_tpl->_assignInScope('wishlists', $_prefixVariable6);
if ($_prefixVariable6) {?>

		<form action="" method="post">
			<input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
"/>

			<section class="variables">
				<label><?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>Vælg ønskeliste:<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?></label>
				<select name="wishlist_id">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlists']->value, 'wishlist');
$_smarty_tpl->tpl_vars['wishlist']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wishlist']->value) {
$_smarty_tpl->tpl_vars['wishlist']->do_else = false;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['wishlist']->value->getWishlistId();?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['wishlist']->value->getName());?>
</option>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>
			</section>

			<?php $_prefixVariable7 = $_smarty_tpl->tpl_vars['product']->value->getVariant();
$_smarty_tpl->_assignInScope('variant', $_prefixVariable7);
if ($_prefixVariable7) {?>
				<section class="variables">
					<label><?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>Vælg variant:<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?></label>

					<select name="attribute_value_id">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['variant']->value->getValues(), 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->getAttributeValueId();?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['variant']->value->getName());?>
: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value->getVal());?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</section>
			<?php }?>

			<section class="linking">
				<input class="button color" type="submit" value="<?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>Tilføj til ønskeliste<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>">
			</section>
		</form>

	<?php }?>

<?php }
}
}
