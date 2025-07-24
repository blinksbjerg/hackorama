<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:06:32
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/basket.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882ae68581cd1_22170276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c837f97affdd5268bf241a6200eb6d986094bba' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/basket.html',
      1 => 1753394738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:add_financial_products.html' => 1,
    'file:mobilepay_checkout.html' => 2,
    'file:paypal_checkout.html' => 1,
    'file:klaviyo_add_to_cart.html' => 1,
  ),
),false)) {
function content_6882ae68581cd1_22170276 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {
		$(".cart-remove").click(function() {
			var input = $(".amount" + $(this).attr('product')).val(0);
			$("#form").submit();
		});
	});
<?php echo '</script'; ?>
>

<div class="container cart">
	<?php $_smarty_tpl->_subTemplateRender("file:add_financial_products.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<form action="" method="post" id="form">

	<div class="container cart checkoutStep" data-step="Basket">
		<?php if ($_smarty_tpl->tpl_vars['get']->value['s'] == "NaN") {?>
			<div class="alert alert-danger">En eller flere varer er ikke på lager</div>
		<?php }?>

		<div class="row cart-header">
			<div class="col-md-2 d-none d-md-block">Vare</div>
			<div class="col-md-3 d-none d-md-block">Navn</div>
			<div class="col-md-2 d-none d-md-block">Pris</div>
			<div class="col-md-2 d-none d-md-block">Antal</div>
			<div class="col-md-2 d-none d-md-block">Total</div>
			<div class="col-md-1 d-none d-md-block"></div>
		</div>

		<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['basket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
			<?php $_smarty_tpl->_assignInScope('attributes', $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes']);?>
			<?php $_smarty_tpl->_assignInScope('product', $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product']);?>

			<?php if ($_smarty_tpl->tpl_vars['attributes']->value && (isset($_smarty_tpl->tpl_vars['attributes']->value[0])) && $_smarty_tpl->tpl_vars['attributes']->value[0]['value_id']) {?>
				<?php $_smarty_tpl->_assignInScope('image', $_smarty_tpl->tpl_vars['product']->value->getImage($_smarty_tpl->tpl_vars['attributes']->value[0]['value_id']));?>
			<?php } else { ?>
				<?php $_smarty_tpl->_assignInScope('image', $_smarty_tpl->tpl_vars['product']->value->getImage());?>
			<?php }?>

			<div class="row">
				<div class="col-4 col-md-2 p-4">
					<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
">
						<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getSrc(80,80,'box');?>
">
						<?php } else { ?>
							<img src="images/small_product_list_08.jpg" alt=""/>
						<?php }?>
					</a>
				</div>
				<div class="col-8 col-md-3 p-4"
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
						data-productlist_position="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_products']->value['iteration'] : null);?>
"
						data-productlist_name="cart"
						<?php if ($_smarty_tpl->tpl_vars['product']->value->hasVariant()) {?>
							<?php $_smarty_tpl->_assignInScope('variant', $_smarty_tpl->tpl_vars['product']->value->getVariant());?>
							data-product_variant="<?php echo $_smarty_tpl->tpl_vars['variant']->value->getName();?>
"
						<?php }?>
						>
					<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName());?>
</a>

					<?php if ($_smarty_tpl->tpl_vars['attributes']->value) {?>
						<dl>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['attributes']->value, 'a');
$_smarty_tpl->tpl_vars['a']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->do_else = false;
?>
								<dd><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['a']->value['name']);?>
: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['a']->value['value']);?>
</d>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</dl>
					<?php }?>

					<?php if ((isset($_smarty_tpl->tpl_vars['campaign_matches']->value)) && $_smarty_tpl->tpl_vars['campaign_matches']->value && in_array($_smarty_tpl->tpl_vars['product']->value->getProductId(),$_smarty_tpl->tpl_vars['campaign_matches']->value)) {?>
						<dl>
							<small>Kampagnerabat</small>
						</dl>
					<?php }?>

					<?php if ((isset($_smarty_tpl->tpl_vars['products_matches']->value)) && $_smarty_tpl->tpl_vars['products_matches']->value && in_array($_smarty_tpl->tpl_vars['product']->value->getProductId(),$_smarty_tpl->tpl_vars['products_matches']->value)) {?>
						<dl>
							<small>Rabat</small>
						</dl>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['product']->value->hasBundleProducts()) {?>
						<?php $_smarty_tpl->_assignInScope('bundle', $_smarty_tpl->tpl_vars['product']->value->getBundleProducts());?>
						<?php if ($_smarty_tpl->tpl_vars['bundle']->value) {?>
							<dl>
								<?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['bundle']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
									<?php $_smarty_tpl->_assignInScope('b_product', $_smarty_tpl->tpl_vars['bundle']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]);?>
									<?php $_smarty_tpl->_assignInScope('id', $_smarty_tpl->tpl_vars['b_product']->value->getProductId());?>
									<dd>
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['b_product']->value->getName());?>

										<?php if ($_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['bundle'][$_smarty_tpl->tpl_vars['id']->value]) {?>
											(<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['bundle'][$_smarty_tpl->tpl_vars['id']->value]['val'];?>
)
										<?php }?>
									</dd>
								<?php
}
}
?>
							</dl>
						<?php }?>
					<?php }?>
				</div>

				<div class="col-4 col-md-2 p-4">
					<div class="d-block d-md-none"><strong>Stykpris:</strong></div>
					<?php if ($_smarty_tpl->tpl_vars['product']->value->getBulkDiscountOver() && $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amount'] > $_smarty_tpl->tpl_vars['product']->value->getBulkDiscountOver()) {?>
						<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getBulkDiscountPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>

					<?php } else { ?>
						<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(1,$_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes']),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>

					<?php }?>
				</div>
				<div class="col-4 col-md-2 p-4">
					<div class="d-block d-md-none"><strong>Antal:</strong></div>

					<?php if ((isset($_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['in_stock'])) && !$_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['in_stock'] && !$_smarty_tpl->tpl_vars['product']->value->getAllowNegativeStock()) {?>
						<div class="alert alert-danger">
							Ikke nok på lager
							<?php if ($_smarty_tpl->tpl_vars['product']->value->getDeliveryTimeNotInStock()) {?>
								<div>Leveringstid: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getDeliveryTimeNotInStock());?>
</div>
							<?php }?>
						</div>
					<?php }?>

					<input type='number' <?php if ($_smarty_tpl->tpl_vars['product']->value->getPackage()) {?>step="<?php echo $_smarty_tpl->tpl_vars['product']->value->getPackage();?>
"<?php }?> min="0" id="amount<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" name="amount[<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amount'];?>
" class="amount<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
 qty-number" style="box-sizing: content-box !important" />
				</div>
				<div class="col-4 col-md-2 p-4">
					<div class="d-block d-md-none"><strong>Total:</strong></div>
					<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice($_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amount'],$_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes']),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>

				</div>
				<div class="col-6 col-md-1 p-4 d-none d-md-block">
					<a href="#" product="<?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" class="cart-remove"></a>
				</div>
			</div>

		<?php
}
}
?>

		<?php if ($_smarty_tpl->tpl_vars['webshop']->value->hasLoyaltyProgram() && $_smarty_tpl->tpl_vars['customer']->value) {?>
			<div class="row cart-header">
				<?php if ($_smarty_tpl->tpl_vars['customer']->value->getActivePoints()) {?>
					<h3>Betal med point</h3>
					<div class="col-12 col-md-12 apply-coupon">
						<p>
							Du har optjent <?php echo number_format($_smarty_tpl->tpl_vars['customer']->value->getActivePoints(),0,",",".");?>
 point.
							<?php if ($_smarty_tpl->tpl_vars['customer']->value->getPointsAvailable()) {?>
								Du kan bruge <?php echo number_format($_smarty_tpl->tpl_vars['customer']->value->getPointsAvailable(),0,",",".");?>
 point på denne ordre.
								<a style="float:none; display:inline" href="#" onclick="$('#use_points').val(<?php echo $_smarty_tpl->tpl_vars['customer']->value->getPointsAvailable();?>
); return false;">Brug alle.</a>
							<?php } else { ?>
								Du har ingen optjente point du kan bruge på denne ordre.
							<?php }?>
						</p>

						<input type="number" placeholder="Hvor mange point vil du bruge?" name="use_points" id="use_points" value="<?php echo $_smarty_tpl->tpl_vars['use_points']->value;?>
" min="0" max="<?php echo $_smarty_tpl->tpl_vars['customer']->value->getPointsAvailable();?>
"/>

						<br style="clear:both;"><br>

						<p><small style="font-weight:normal;">
							Du optjener <?php echo number_format($_smarty_tpl->tpl_vars['webshop']->value->getLoyaltyProgramBasePoints(),0,",",".");?>
 point hver gang du køber for 1 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
.
							Når du betaler med point svarer <?php echo number_format($_smarty_tpl->tpl_vars['webshop']->value->getLoyaltyProgramBaseCost(),0,",",".");?>
 point til 1 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
.
						</small></p>

						<p><small style="font-weight:normal;">
							Du optjener <?php echo number_format($_smarty_tpl->tpl_vars['earns']->value,0,",",".");?>
 point på denne ordre.
						</small></p>

					</div>
				<?php } else { ?>

					<p><small style="font-weight:normal;">
						Du optjener <?php echo number_format($_smarty_tpl->tpl_vars['earns']->value,0,",",".");?>
 point på denne ordre.
					</small></p>

				<?php }?>

			</div>

			<br>
		<?php }?>

		<div class="row cart-header">
			<div class="col-12 col-md-8 apply-coupon">
				<?php if ($_smarty_tpl->tpl_vars['get']->value['wrong_voucher']) {?>
					<div class="alert alert-danger">Ugyldig rabatkort</div>
				<?php }?>
				<input type="text" placeholder="Evt. rabatkode" name="voucher" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['voucher']->value);?>
"/>
			</div>
			<div class="col-12 col-md-4 text-center">
				<input class="btn btn-secondary gray button" type="submit" name="opdate" value="Opdater"/>
				<input class="btn btn-primary button color proceed checkoutStepProceed" type="submit" name="next" value="Fortsæt"/>
				<?php $_smarty_tpl->_subTemplateRender("file:mobilepay_checkout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('show'=>"button"), 0, false);
?>
			</div>
		</div>

		<div class="margin-top-40 col-4">
			<?php $_smarty_tpl->_subTemplateRender("file:paypal_checkout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>

		<div class="margin-top-40">

		<?php $_smarty_tpl->_assignInScope('countries', $_smarty_tpl->tpl_vars['webshop']->value->getCountries());?>
		<?php if ($_smarty_tpl->tpl_vars['countries']->value) {?>
			<div class="my-2"></div>
			<section class="variables">
				<div class="form-group">
					<h3 class="headline">Leveres til:</h3>
					<span class="line"></span>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col">
							<select class="form-control" name="del_country_id" onchange="$('#form').submit();">
								<?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['countries']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['countries']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCountryId();?>
" <?php if ($_smarty_tpl->tpl_vars['session_del']->value['country_id'] == $_smarty_tpl->tpl_vars['countries']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCountryId()) {?>selected="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['countries']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getName());?>
</option>
								<?php
}
}
?>
							</select>
						</div>
						<div class="col col-4 col-lg-4 text-right">
							<input class="btn btn-secondary gray button" type="submit" name="opdate" value="Opdater"/>
						</div>
					</div>
				</div>
			</section>
		<?php }?>

		<h3 class="headline">Samlede pris</h3>
		<span class="line"></span>
		<div class="clearfix"></div>

		<table class="cart-table margin-top-5">
			<tr>
				<th>Subtotal</th>
				<td><strong><?php echo number_format($_smarty_tpl->tpl_vars['price']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</strong></td>
			</tr>

			<?php if ($_smarty_tpl->tpl_vars['voucher']->value) {?>
				<tr>
					<th>Rabat</th>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['voucher']->value->getPercentDiscount()) {?>
							<div><?php echo $_smarty_tpl->tpl_vars['voucher']->value->getPercentDiscount();?>
 %</div>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['voucher']->value->getPriceDiscount()) {?>
							<div><?php echo $_smarty_tpl->tpl_vars['voucher']->value->getPriceDiscount();?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</div>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['voucher']->value->getFreeShipping()) {?>
							<div>Gratis fragt.</div>
						<?php }?>

						<?php if ((isset($_smarty_tpl->tpl_vars['voucher_discount']->value)) && $_smarty_tpl->tpl_vars['voucher_discount']->value && !$_smarty_tpl->tpl_vars['voucher']->value->getPriceDiscount()) {?>
							<div>Du sparer <?php echo number_format($_smarty_tpl->tpl_vars['voucher_discount']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
.</div>
						<?php }?>

					</td>
				</tr>
			<?php }?>

			<?php if ((isset($_smarty_tpl->tpl_vars['campaign_ids']->value)) && $_smarty_tpl->tpl_vars['campaign_ids']->value && (isset($_smarty_tpl->tpl_vars['campaign_discount']->value)) && $_smarty_tpl->tpl_vars['campaign_discount']->value) {?>
				<tr>
					<th>Kampagnerabat</th>
					<td>
						<?php echo number_format($_smarty_tpl->tpl_vars['campaign_discount']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>

					</td>
				</tr>
			<?php }?>

			<tr>
				<th>Levering</th>
				<td><?php echo number_format($_smarty_tpl->tpl_vars['shipping_price']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</td>
			</tr>

			<?php if ($_smarty_tpl->tpl_vars['point_discount']->value) {?>
				<tr>
					<th>Brug af point</th>
					<td>-<?php echo number_format($_smarty_tpl->tpl_vars['point_discount']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
 (<?php echo number_format($_smarty_tpl->tpl_vars['use_points']->value,0,",",".");?>
 point)</td>
				</tr>
			<?php }?>

			<tr>
				<th>Total</th>
				<td><strong><?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</strong></td>
			</tr>

			<tr>
				<th>Heraf moms</th>
				<td><?php echo number_format($_smarty_tpl->tpl_vars['vat']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</td>
			</tr>
		</table>
	</div>

	<div class="margin-top-40"></div>

	<div class="notification notice">
	  <div class="row text-center">
		<div class="col-12 col-md-6 col-lg-4 col py-4">
			Din kurv (<?php echo $_smarty_tpl->tpl_vars['total_amount']->value;?>
 vare<?php if ($_smarty_tpl->tpl_vars['total_amount']->value != 1) {?>r<?php }?>):
			<span class="highlight color">
				<?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>

			</span>
		</div>
		<div class="col-12 col-md-6 col-lg-2 py-1 align-self-end text-center">
			<form action="" method="post">
				<input class="button rounded huge color proceed checkoutStepProceed" type="submit" name="next" value="Fortsæt"/>
			</form>
		</div>
	</div>

	<?php $_smarty_tpl->_subTemplateRender("file:mobilepay_checkout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('show'=>"form"), 0, true);
?>

	<div class="margin-top-40"></div>

</form>

<?php $_smarty_tpl->_subTemplateRender("file:klaviyo_add_to_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"basket"), 0, false);
}
}
