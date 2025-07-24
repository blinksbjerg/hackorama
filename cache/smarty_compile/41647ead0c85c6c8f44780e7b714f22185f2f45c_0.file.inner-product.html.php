<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:13
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/inner-product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af81b6ce07_33284191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41647ead0c85c6c8f44780e7b714f22185f2f45c' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/inner-product.html',
      1 => 1753392267,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882af81b6ce07_33284191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_assignInScope('images', $_smarty_tpl->tpl_vars['product']->value->getImages());?>

<?php if ((isset($_smarty_tpl->tpl_vars['images']->value[1])) && $_smarty_tpl->tpl_vars['images']->value[1]) {?>

	<figure class="product">
		<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
"
			class="productEntity"
			data-product_name="<?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
"
			data-product_id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
"
			data-product_price="<?php echo $_smarty_tpl->tpl_vars['product']->value->getRealPrice();?>
"

			<?php if ($_smarty_tpl->tpl_vars['product']->value->getBrand()) {?> data-product_brand="<?php echo $_smarty_tpl->tpl_vars['product']->value->getBrandName();?>
"<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['product']->value->getMainCategory()) {?>
				data-product_category="<?php echo $_smarty_tpl->tpl_vars['product']->value->getMainCategoryName();?>
"
			<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->getCategory()) {?>
				data-product_category="<?php echo $_smarty_tpl->tpl_vars['product']->value->getCategoryName();?>
"
			<?php }?>

			data-productlist_position="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['iteration'] : null);?>
"

			<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
				data-productlist_name="<?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
"
			<?php } elseif ($_smarty_tpl->tpl_vars['landing_page']->value) {?>
				data-productlist_name="<?php echo $_smarty_tpl->tpl_vars['landing_page']->value->getName();?>
"
			<?php } elseif ($_smarty_tpl->tpl_vars['inc']->value == "search.html") {?>
				data-productlist_name="searchresults"
			<?php }?>
		>
			<div class="mediaholder">

				<?php if ($_smarty_tpl->tpl_vars['images']->value && (isset($_smarty_tpl->tpl_vars['images']->value[0]))) {?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[0]->getSrc(300,400,'box');?>
" alt="">
				<?php } else { ?>
					<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/images/shop_item_01.jpg"/>
				<?php }?>

				<div class="cover">
					<?php if ((isset($_smarty_tpl->tpl_vars['images']->value[1])) && $_smarty_tpl->tpl_vars['images']->value[1]) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[1]->getSrc(300,400,'box');?>
" alt="">
					<?php } elseif ((isset($_smarty_tpl->tpl_vars['images']->value[0])) && $_smarty_tpl->tpl_vars['images']->value[0]) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[0]->getSrc(300,400,'box');?>
" alt="">
					<?php } else { ?>
						<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/images/shop_item_01_hover.jpg"/>
					<?php }?>
				</div>

				<div class="product-button"><i class="fa fa-arrow-circle-right"></i> Se mere</div>

			</div>

			<section>
								<h5><?php echo smarty_modifier_truncate(smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName()),49,"...",true);?>
</h5>
				<span class="product-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</span>
			</section>
		</a>
	</figure>

<?php } else { ?>

	<div class="product">
		<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
"
			class="productEntity"
			data-product_name="<?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
"
			data-product_id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
"
			data-product_price="<?php echo $_smarty_tpl->tpl_vars['product']->value->getRealPrice();?>
"
			<?php if ($_smarty_tpl->tpl_vars['product']->value->getBrand()) {?>
				data-product_brand="<?php echo $_smarty_tpl->tpl_vars['product']->value->getBrandName();?>
"
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->getMainCategory()) {?>
				data-product_category="<?php echo $_smarty_tpl->tpl_vars['product']->value->getMainCategoryName();?>
"
			<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->getCategory()) {?>
				data-product_category="<?php echo $_smarty_tpl->tpl_vars['product']->value->getCategoryName();?>
"
			<?php }?>
			data-productlist_position="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_productlist']->value['iteration'] : null);?>
"
			<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
				data-productlist_name="<?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
"
			<?php } elseif ($_smarty_tpl->tpl_vars['landing_page']->value) {?>
				data-productlist_name="<?php echo $_smarty_tpl->tpl_vars['landing_page']->value->getName();?>
"
			<?php } elseif ($_smarty_tpl->tpl_vars['inc']->value == "search.html") {?>
				data-productlist_name="searchresults"
			<?php }?>
		>
			<div class="mediaholder">
				<?php if ($_smarty_tpl->tpl_vars['images']->value && (isset($_smarty_tpl->tpl_vars['images']->value[0]))) {?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[0]->getSrc(300,400,'box');?>
" alt="">
				<?php } else { ?>
					<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/images/shop_item_01.jpg" style="height:160px;width:100%;"/>
				<?php }?>

				<div class="product-button"><i class="fa fa-arrow-circle-right"></i> Se mere</div>
			</div>

			<section>
								<h5><?php echo smarty_modifier_truncate(smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName()),49,"...",true);?>
</h5>
				<span class="product-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</span>
			</section>
		</a>
	</div>

<?php }
}
}
