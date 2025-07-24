<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:50
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/carousel.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882afa6462ff8_69999500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5b406fc3621e3b3bb7daaa775fdf66528ecca7e' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/carousel.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882afa6462ff8_69999500 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.mt_rand.php','function'=>'smarty_modifier_mt_rand',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),2=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
if ($_smarty_tpl->tpl_vars['products']->value) {?>
	<?php $_smarty_tpl->_assignInScope('id', smarty_modifier_mt_rand(0,1000000));?>

	<!-- Headline -->
	<h3 class="headline"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['title']->value);?>
</h3>
	<span class="line margin-bottom-0"></span>

	<!-- Carousel -->
	<div class="showbiz-container carousel-container" >

		<!-- Navigation -->
		<div class="showbiz-navigation">
			<div id="showbiz_left_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
			<div id="showbiz_right_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="clearfix"></div>

		<!-- Products -->
		<div class="showbiz" data-left="#showbiz_left_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-right="#showbiz_right_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-play="#showbiz_play_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
			<div class="overflowholder">

				<ul>
					<?php
$__section_o_11_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['products']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_o_11_total = $__section_o_11_loop;
$_smarty_tpl->tpl_vars['__smarty_section_o'] = new Smarty_Variable(array());
if ($__section_o_11_total !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_o']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_o']->value['iteration'] <= $__section_o_11_total; $_smarty_tpl->tpl_vars['__smarty_section_o']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']++){
?>
						<?php $_smarty_tpl->_assignInScope('images', $_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getImages());?>

						<li>
							<figure class="product">
								<?php if ($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getSalePrice()) {?>
									<div class="product-discount">UDSALG</div>
								<?php }?>
								<div class="mediaholder">
									<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getRemoteUrl());?>
"
										class="productEntity" 
										data-product_name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getName());?>
" 
										data-product_id="<?php echo $_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getProductId();?>
" 
										data-product_price="<?php echo $_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getRealPrice();?>
"
										<?php if ($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getBrand()) {?> 
											data-product_brand="<?php echo $_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getBrandName();?>
" 
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getMainCategory()) {?>
											data-product_category="<?php echo $_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getMainCategoryName();?>
" 
										<?php } elseif ($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getCategory()) {?>
											data-product_category="<?php echo $_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getCategoryName();?>
" 
										<?php }?>
										data-productlist_position="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['iteration'] : null);?>
" 
										data-productlist_name="Opsalg <?php echo mb_strtolower(smarty_modifier_escape($_smarty_tpl->tpl_vars['title']->value), 'UTF-8');?>
" 
									>

										<?php if ($_smarty_tpl->tpl_vars['images']->value) {?>
											<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[0]->getSrc(300,300,'box');?>
" alt="">
										<?php } else { ?>
											<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/images/shop_item_01.jpg" style="height:166px;width:100%;"/>
										<?php }?>

										<div class="cover">
											<?php if ($_smarty_tpl->tpl_vars['images']->value[1]) {?>
												<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[1]->getSrc(300,300,'box');?>
" alt="">
											<?php } elseif ($_smarty_tpl->tpl_vars['images']->value[0]) {?>
												<img src="<?php echo $_smarty_tpl->tpl_vars['images']->value[0]->getSrc(300,300,'box');?>
" alt="">
											<?php } else { ?>
												<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/images/shop_item_01_hover.jpg"/>
											<?php }?>
										</div>
									</a>
									<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getRemoteUrl());?>
" class="product-button"><i class="fa fa-shopping-cart"></i> Se produkt</a>
								</div>

								<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getRemoteUrl());?>
">
									<section>
																				<h5><?php echo smarty_modifier_truncate(smarty_modifier_escape($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getName()),19,"...",true);?>
</h5>
										<span class="product-price"><?php echo number_format($_smarty_tpl->tpl_vars['products']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_o']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_o']->value['index'] : null)]->getRealPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</span>
									</section>
								</a>
							</figure>
						</li>

					<?php
}
}
?>
				</ul>

				<div class="clearfix"></div>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>

<?php }
}
}
