<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:50
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882afa641c563_33659084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28b1c50290aec5477bd89444de05328ab8f1623c' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/product.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ratings.html' => 2,
    'file:add_to_basket.html' => 1,
    'file:carousel.html' => 2,
    'file:klaviyo_add_to_cart.html' => 1,
  ),
),false)) {
function content_6882afa641c563_33659084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.count.php','function'=>'smarty_modifier_count',),2=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),3=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/block.t.php','function'=>'smarty_block_t',),));
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "title", null, null);
echo $_smarty_tpl->tpl_vars['product']->value->getName();
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->_assignInScope('images', $_smarty_tpl->tpl_vars['product']->value->getImages());?>

<div class="container">
	<div class="row justify-content-center productEntity productEntityDetailPage"
		data-product_name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName());?>
"
		data-product_pid="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getOwnId());?>
"
		data-product_id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getProductId());?>
"

		<?php $_smarty_tpl->_assignInScope('tempcat', $_smarty_tpl->tpl_vars['product']->value->getMainCategory());?>
		<?php if ($_smarty_tpl->tpl_vars['tempcat']->value) {?>
			data-product_category="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['tempcat']->value->getName());?>
"
		<?php } else { ?>
			data-product_category="Ingen hovedkategori"
		<?php }?>
		>
		<div class="col-10 col-md-6">
			<div class="slider-padding">
				<div id="product-slider" class="royalSlider rsDefault">
					<?php
$__section_j_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['images']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_0_total = $__section_j_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_0_total !== 0) {
for ($__section_j_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_0_iteration <= $__section_j_0_total; $__section_j_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
						<img class="rsImg" src="<?php echo $_smarty_tpl->tpl_vars['images']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getSrc(500,500,'fit');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['images']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDescription());?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['images']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDescription());?>
" <?php echo $_smarty_tpl->tpl_vars['images']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getHtmlSize(500,500,'fit');?>
 data-rsTmb="<?php echo $_smarty_tpl->tpl_vars['images']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getSrc(100,100,'box');?>
"/>
					<?php
}
}
?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="col-11 col-md-6">
			<div class="product-page">
				<section class="title">
					<h1><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName());?>
</h1>
					<span class="product-price<?php if ($_smarty_tpl->tpl_vars['product']->value->getSalePrice()) {?>-discount<?php }?>">

						<?php if ($_smarty_tpl->tpl_vars['product']->value->getSalePrice()) {?>

							<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>

							<i><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</i>

						<?php } else { ?>

							<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>


						<?php }?>

					</span>
					<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['viabill_code']) {?>
						<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['viabill_type'] == 'graphic') {?>
							<div class="ViaBill_pricetag_product" price="<?php echo $_smarty_tpl->tpl_vars['product']->value->getRealPrice();?>
"></div>
						<?php } else { ?>
							<div class="ViaBill_pricetag_list" price="<?php echo $_smarty_tpl->tpl_vars['product']->value->getRealPrice();?>
"></div>
						<?php }?>
					<?php }?>

					<?php $_smarty_tpl->_subTemplateRender("file:ratings.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('rating'=>$_smarty_tpl->tpl_vars['product']->value->getAvgRating()), 0, false);
?>

				</section>

				<?php if ($_smarty_tpl->tpl_vars['product']->value->getParsedDescription()) {?>
					<section class="product-description">
						<p class="margin-reset"><?php echo $_smarty_tpl->tpl_vars['product']->value->getParsedDescription();?>
</p>

						<div class="clearfix"></div>
					</section>
				<?php }?>

				<?php $_smarty_tpl->_subTemplateRender("file:add_to_basket.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, false);
?>

				<?php if ($_smarty_tpl->tpl_vars['get']->value['mail']) {?>
					<div class="notification success closeable my-4">
						<p><span>Tak!</span> Vi har modtaget din henvendelse og vender tilbage hurtigst muligt.</p>
						<a class="close" href="#"></a>
					</div>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['contact_on_products']) {?>

					<div class="row justify-content-center">

						<div class="my-4">
							<a href="#small-dialog" class="popup-with-zoom-anim button margin-left-0">Har du spørgsmål?</a>
						</div>

						<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
							<h3 class="headline">Spørgsmål</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>

							<form id="add-comment" class="add-comment" method="post">
								<input type="hidden" name="subject" value="Spørgsmål ang. <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName());?>
"/>
								<input type="hidden" name="product_url" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
"/>

								<fieldset>
									<p>Skriv dit spørgsmål her, og vi vender tilbage hurtigst muligt pr. mail:</p>

									<div>
										<label>Dit navn:</label>
										<input type="text" name="name" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['session_order']->value['name']);?>
" size="50"/>
									</div>

									<div>
										<label>Din e-mail-adresse: <span>*</span></label>
										<input type="text" name="from" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['session_order']->value['email']);?>
" size="50" required/>
									</div>

									<div>
										<label>Telefonnummer, hvis du hellere vil ringes op:</label>
										<input type="text" name="phone" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['session_order']->value['phone']);?>
" size="50"/>
									</div>

									<div>
										<label>Dit spørgsmål: <span>*</span></label>
										<textarea cols="40" rows="3" name="question" required></textarea>
									</div>

								</fieldset>

								<input type="submit" value="Send" class="button color" id="send_button"/>
								<div class="clearfix"></div>

							</form>
						</div>

					</div>

				<?php }?>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-10 col-md-12">
			<?php $_smarty_tpl->_assignInScope('reviews', $_smarty_tpl->tpl_vars['product']->value->getProductReviews());?>

			<?php $_smarty_tpl->_assignInScope('show_info', false);?>
			<?php $_smarty_tpl->_assignInScope('profile', $_smarty_tpl->tpl_vars['product']->value->getProfile());?>
			<?php $_smarty_tpl->_assignInScope('attr', $_smarty_tpl->tpl_vars['profile']->value->getAttributeList());?>

			<?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attr']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
				<?php if (!$_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getIsVariant()) {?>
					<?php $_smarty_tpl->_assignInScope('show_info', true);?>
				<?php }?>
			<?php
}
}
?>

			<?php $_smarty_tpl->_assignInScope('manufacturer', $_smarty_tpl->tpl_vars['product']->value->getManufacturer());?>
			<?php $_smarty_tpl->_assignInScope('safety_profile', $_smarty_tpl->tpl_vars['product']->value->getSafetyProfile());?>

			<ul class="tabs-nav">
				<?php if ($_smarty_tpl->tpl_vars['show_info']->value) {?>
					<li><a href="#tab2">Produktinformation</a></li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['show_reviews']) {?>
					<li><a href="#tab3">Anmeldelser <span class="tab-reviews">(<?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['reviews']->value);?>
)</span></a></li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['manufacturer']->value || $_smarty_tpl->tpl_vars['safety_profile']->value) {?>
					<li><a href="#tab4">Produktsikkerhed</a></li>
				<?php }?>
			</ul>

			<div class="tabs-container">

				<?php if ($_smarty_tpl->tpl_vars['show_info']->value) {?>
					<div class="tab-content" id="tab2">

						<table class="basic-table">

							<?php
$__section_j_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attr']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_2_total = $__section_j_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_2_total !== 0) {
for ($__section_j_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_2_iteration <= $__section_j_2_total; $__section_j_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>

								<?php if (!$_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getIsVariant()) {?>
									<tr>
										<th class="col-6 col-md-4 col-lg-2"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getName());?>
</th>
										<td class="col"><?php echo $_smarty_tpl->tpl_vars['product']->value->getAttributeValue($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId());?>
</td>
									</tr>
								<?php }?>
							<?php
}
}
?>

						</table>

					</div>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['show_reviews']) {?>
					<div class="tab-content" id="tab3">
						<!-- Reviews -->
						<section class="comments">
							<?php if ($_smarty_tpl->tpl_vars['reviews']->value) {?>
								<ul>
									<?php
$__section_p_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['reviews']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_p_3_total = $__section_p_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_p'] = new Smarty_Variable(array());
if ($__section_p_3_total !== 0) {
for ($__section_p_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] = 0; $__section_p_3_iteration <= $__section_p_3_total; $__section_p_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']++){
?>
										<li>
											<div class="avatar"><img src="https://www.gravatar.com/avatar/<?php echo md5($_smarty_tpl->tpl_vars['reviews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)]->getEmail());?>
?d=mm&amp;s=70" alt="" /></div>
											<div class="comment-content"><div class="arrow-comment"></div>
												<div class="comment-by"><strong><?php echo $_smarty_tpl->tpl_vars['reviews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)]->getName();?>
</strong><span class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reviews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)]->getCreated(),"%d.%m.%Y");?>
</span>

													<?php $_smarty_tpl->_subTemplateRender("file:ratings.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('rating'=>$_smarty_tpl->tpl_vars['reviews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)]->getRating()), 0, true);
?>

												</div>
												<p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['reviews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)]->getDescription());?>
</p>
											</div>
										</li>
									<?php
}
}
?>
								</ul>
							<?php } else { ?>
								<p>Der er ikke skrevet nogen anmeldelser endnu.</p>
							<?php }?>
						</section>
					</div>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['manufacturer']->value || $_smarty_tpl->tpl_vars['safety_profile']->value) {?>
					<div class="tab-content" id="tab4">
						<?php if ($_smarty_tpl->tpl_vars['manufacturer']->value) {?>
							<div><strong><?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>Fabrikant<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?></strong></div>

							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['manufacturer']->value->getName());?>
<br>
							<?php echo nl2br(smarty_modifier_escape($_smarty_tpl->tpl_vars['manufacturer']->value->getAddress()));?>
<br>

							<?php $_prefixVariable1 = $_smarty_tpl->tpl_vars['manufacturer']->value->getEmail();
$_smarty_tpl->_assignInScope('email', $_prefixVariable1);
if ($_prefixVariable1) {?>
								<a href="mailto:<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['email']->value);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['email']->value);?>
</a><br>
							<?php }?>

							<?php $_prefixVariable2 = $_smarty_tpl->tpl_vars['manufacturer']->value->getWebsite();
$_smarty_tpl->_assignInScope('website', $_prefixVariable2);
if ($_prefixVariable2) {?>
								<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['website']->value);?>
" target="_blank"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['website']->value);?>
</a><br>
							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['manufacturer']->value->getIsOutsideEu()) {?>
								<br><div><strong><?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>Kontakt inden for EU<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?></strong></div>

								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['manufacturer']->value->getEuName());?>
<br>
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['manufacturer']->value->getEuAddress());?>
<br>

								<?php $_prefixVariable3 = $_smarty_tpl->tpl_vars['manufacturer']->value->getEuEmail();
$_smarty_tpl->_assignInScope('eu_email', $_prefixVariable3);
if ($_prefixVariable3) {?>
									<a href="mailto:<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['eu_email']->value);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['eu_email']->value);?>
</a><br>
								<?php }?>

								<?php $_prefixVariable4 = $_smarty_tpl->tpl_vars['manufacturer']->value->getEuWebsite();
$_smarty_tpl->_assignInScope('eu_website', $_prefixVariable4);
if ($_prefixVariable4) {?>
									<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['eu_website']->value);?>
" target="_blank"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['eu_website']->value);?>
</a><br>
								<?php }?>
							<?php }?>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['safety_profile']->value) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['safety_profile']->value->getImages(), 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
								<div style="margin-top: 1rem;">
									<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getSrc(500,500,'fit');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['image']->value->getDescription());?>
" <?php echo $_smarty_tpl->tpl_vars['image']->value->getHtmlSize(500,500,'fit');?>
>
								</div>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</div>
				<?php }?>

			</div>
		</div>
	</div>
</div>

<div class="row justify-content-center">
	<div class="col-10 col-md-12">
		<?php $_smarty_tpl->_subTemplateRender("file:carousel.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Lignende varer",'products'=>$_smarty_tpl->tpl_vars['product']->value->getSimilarProducts()), 0, false);
?>
		<?php $_smarty_tpl->_subTemplateRender("file:carousel.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Relaterede produkter",'products'=>$_smarty_tpl->tpl_vars['product']->value->getRelatedProducts()), 0, true);
?>
	</div>
</div>

<div class="mt-4"></div>
<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['viabill_code']) {?>
	<?php echo $_smarty_tpl->tpl_vars['settings']->value['settings']['viabill_code'];?>

<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:klaviyo_add_to_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"product"), 0, false);
}
}
