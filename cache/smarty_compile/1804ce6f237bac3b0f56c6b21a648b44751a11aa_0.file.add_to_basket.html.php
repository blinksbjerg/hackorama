<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:11:50
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/add_to_basket.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882afa6450ee0_64342896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1804ce6f237bac3b0f56c6b21a648b44751a11aa' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/add_to_basket.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:out_of_stock_signup.html' => 2,
    'file:add_to_wishlist.html' => 1,
  ),
),false)) {
function content_6882afa6450ee0_64342896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/block.t.php','function'=>'smarty_block_t',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
$_smarty_tpl->_assignInScope('profile', $_smarty_tpl->tpl_vars['product']->value->getProfile());
$_smarty_tpl->_assignInScope('attr', $_smarty_tpl->tpl_vars['profile']->value->getAttributeList());?>

<?php $_smarty_tpl->_assignInScope('has_variants', false);
$__section_j_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attr']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_4_total = $__section_j_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_4_total !== 0) {
for ($__section_j_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_4_iteration <= $__section_j_4_total; $__section_j_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
	<?php if ($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getIsVariant() && $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDataType() == "valuelist") {?>
		<?php $_smarty_tpl->_assignInScope('has_variants', true);?>
	<?php }
}
}
?>

<section>
    <?php if ($_smarty_tpl->tpl_vars['product']->value->getIsInStock() || $_smarty_tpl->tpl_vars['product']->value->getAllowNegativeStock()) {?>

		<?php $_smarty_tpl->_assignInScope('remote_stock_count', 0);?>
		<?php $_prefixVariable5 = $_smarty_tpl->tpl_vars['webshop']->value->getDefaultStockLocation();
$_smarty_tpl->_assignInScope('default_stock_location', $_prefixVariable5);
if ($_prefixVariable5) {?>
			<?php $_smarty_tpl->_assignInScope('default_stock_count', $_smarty_tpl->tpl_vars['product']->value->getLocationStock($_smarty_tpl->tpl_vars['default_stock_location']->value->getStockLocationId()));?>
		<?php }?>

		<ul class="list-1 color">
			<?php if ($_smarty_tpl->tpl_vars['webshop']->value->getStockLocations() && !$_smarty_tpl->tpl_vars['default_stock_count']->value) {?>
				<li><?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>På lager (eksternt lager)<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?></li>
				<li>Leveringstid: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getDeliveryTimeNotInStock());?>
</li>
			<?php } else { ?>
				<li>På lager</li>
				<?php if ($_smarty_tpl->tpl_vars['product']->value->getDeliveryTime()) {?>
					<li>Leveringstid: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getDeliveryTime());?>
</li>
				<?php }?>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['product']->value->getPackage()) {?>
				<li><?php echo $_smarty_tpl->tpl_vars['product']->value->getPackage();?>
 i kolli</li>
			<?php }?>
		</ul>
    <?php } else { ?>
		<ul class="list-4">
			<li>Ikke på lager</li>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->getDeliveryTimeNotInStock()) {?>
				<li>Leveringstid: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getDeliveryTimeNotInStock());?>
</li>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['product']->value->getPackage()) {?>
				<li><?php echo $_smarty_tpl->tpl_vars['product']->value->getPackage();?>
 i kolli</li>
			<?php }?>
		</ul>

		<?php if (!$_smarty_tpl->tpl_vars['has_variants']->value) {?>
			<?php $_smarty_tpl->_subTemplateRender("file:out_of_stock_signup.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, false);
?>
		<?php }?>
    <?php }?>
</section>

<?php $_smarty_tpl->_assignInScope('pdf_files', $_smarty_tpl->tpl_vars['product']->value->getPdfFiles());
if ($_smarty_tpl->tpl_vars['pdf_files']->value) {?>
	<section>
		<strong>Download fil</strong>
		<?php
$__section_j_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['pdf_files']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_5_total = $__section_j_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_5_total !== 0) {
for ($__section_j_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_5_iteration <= $__section_j_5_total; $__section_j_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
			<div>
				<a target="_blank" class="button color" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['pdf_files']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getUrl());?>
">
					<i class="fa fa-cloud-download"></i> <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['pdf_files']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getFilename());?>
 (<?php echo number_format($_smarty_tpl->tpl_vars['pdf_files']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getMB(),2,",",".");?>
 MB)
				</a>
			</div>
		<?php
}
}
?>
	</section>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['product']->value->getIsInStock() || $_smarty_tpl->tpl_vars['product']->value->getAllowNegativeStock()) {?>

	<form action="" method="post" id="basket_form">
		<input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
"/>

		<?php if ($_smarty_tpl->tpl_vars['product']->value->hasBundleProducts()) {?>
			<?php $_smarty_tpl->_assignInScope('bundle', $_smarty_tpl->tpl_vars['product']->value->getBundleProductsCount());?>
			<section class="variables">
				<?php if ($_smarty_tpl->tpl_vars['bundle']->value) {?>
					<h4 class="mb-4">I denne samlepakke:</h4>

					<?php
$__section_f_6_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['bundle']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_f_6_total = $__section_f_6_loop;
$_smarty_tpl->tpl_vars['__smarty_section_f'] = new Smarty_Variable(array());
if ($__section_f_6_total !== 0) {
for ($__section_f_6_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] = 0; $__section_f_6_iteration <= $__section_f_6_total; $__section_f_6_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_f']->value['last'] = ($__section_f_6_iteration === $__section_f_6_total);
?>
						<div class="row mb-2">

							<?php $_smarty_tpl->_assignInScope('b_product', $_smarty_tpl->tpl_vars['bundle']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)]['product']);?>
							<?php $_smarty_tpl->_assignInScope('b_profile', $_smarty_tpl->tpl_vars['b_product']->value->getProfile());?>
							<?php $_smarty_tpl->_assignInScope('b_attr', $_smarty_tpl->tpl_vars['b_profile']->value->getAttributeList());?>

							<?php $_smarty_tpl->_assignInScope('b_img', $_smarty_tpl->tpl_vars['b_product']->value->getImage());?>

							<div class="col-2">
								<?php if ($_smarty_tpl->tpl_vars['b_img']->value) {?>
									<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['b_product']->value->getRemoteUrl());?>
"><img class="rounded img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['b_img']->value->getSrc(80,80,'box');?>
"></a>
								<?php }?>
							</div>

							<div class="col">
								<strong><?php echo $_smarty_tpl->tpl_vars['bundle']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)]['count'];?>
 x <a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['b_product']->value->getRemoteUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['b_product']->value->getName());?>
</a></strong>
							</div>

							<div class="col">
								<?php
$__section_j_7_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['b_attr']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_7_total = $__section_j_7_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_7_total !== 0) {
for ($__section_j_7_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_7_iteration <= $__section_j_7_total; $__section_j_7_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
									<?php if ($_smarty_tpl->tpl_vars['b_attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getIsVariant()) {?>
										<?php if ($_smarty_tpl->tpl_vars['b_attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDataType() == "valuelist") {?>
											<?php $_smarty_tpl->_assignInScope('values', $_smarty_tpl->tpl_vars['b_attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getValues());?>
											<select class="form-control" name="b_attributes[<?php echo $_smarty_tpl->tpl_vars['b_product']->value->getProductId();?>
][<?php echo $_smarty_tpl->tpl_vars['b_attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
]" required>
												<?php
$__section_k_8_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['values']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_k_8_total = $__section_k_8_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_8_total !== 0) {
for ($__section_k_8_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_8_iteration <= $__section_k_8_total; $__section_k_8_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['values']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getAttributeValueId();?>
">
														<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['values']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getVal());?>

													</option>
												<?php
}
}
?>
											</select>
										<?php }?>
									<?php }?>
								<?php
}
}
?>
							</div>
						</div>

						<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['last'] : null)) {?><div class="border-top my-3"></div><?php }?>

					<?php
}
}
?>

				<?php }?>
			</section>
		<?php }?>

		<?php
$__section_j_9_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attr']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_9_total = $__section_j_9_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_9_total !== 0) {
for ($__section_j_9_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_9_iteration <= $__section_j_9_total; $__section_j_9_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
			<?php if ($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getIsVariant()) {?>

				<section class="variables">

					<label for="a<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getName());?>
:</label>

					<?php if ($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDataType() == "valuelist") {?>

						<?php $_smarty_tpl->_assignInScope('values', $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getValues());?>

						<select name="attributes[<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
]" id="a<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
">

							<?php
$__section_k_10_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['values']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_k_10_total = $__section_k_10_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_10_total !== 0) {
for ($__section_k_10_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_10_iteration <= $__section_k_10_total; $__section_k_10_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>

								<?php $_smarty_tpl->_assignInScope('attribute_price', $_smarty_tpl->tpl_vars['product']->value->getAttributePrice($_smarty_tpl->tpl_vars['values']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getAttributeValueId()));?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['values']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getAttributeValueId();?>
">
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['values']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getVal());?>

									<?php if ($_smarty_tpl->tpl_vars['attribute_price']->value) {?>
										[<?php echo number_format($_smarty_tpl->tpl_vars['attribute_price']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
]
									<?php }?>

									<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['show_stock']) {?>
										(<?php echo $_smarty_tpl->tpl_vars['product']->value->getInStock($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId(),$_smarty_tpl->tpl_vars['values']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getAttributeValueId());?>
 på lager)
									<?php }?>
								</option>

							<?php
}
}
?>
						</select>

					<?php } elseif ($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDataType() == "string") {?>

						<input required type="text" name="attributes[<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
]" id="a<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
"/>

					<?php } elseif ($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDataType() == "integer") {?>

						<input required type="text" name="attributes[<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
]" id="a<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
"/>

					<?php } elseif ($_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getDataType() == "boolean") {?>

						<input required type="checkbox" name="attributes[<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
]" value="1" id="a<?php echo $_smarty_tpl->tpl_vars['attr']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getAttributeId();?>
"/>

					<?php }?>

				</section>

			<?php } else { ?>

			<?php }?>

		<?php
}
}
?>

		<section class="linking">
			<div class="qtyminus"></div>
			<input type='text' name="amount" <?php if ($_smarty_tpl->tpl_vars['product']->value->getPackage()) {?>package="<?php echo $_smarty_tpl->tpl_vars['product']->value->getPackage();?>
" value='<?php echo $_smarty_tpl->tpl_vars['product']->value->getPackage();?>
'<?php } else { ?>value='1'<?php }?> class="qty" style="box-sizing: content-box !important" />
			<div class="qtyplus"></div>
			<input class="button adc color productEntityAddToCart" type="submit" value="Læg i kurv">

			<div class="clearfix"></div>
		</section>

		<div class="clearfix"></div>
	</form>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['has_variants']->value) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:out_of_stock_signup.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'for_variants'=>true), 0, true);
}?>

<?php $_smarty_tpl->_subTemplateRender("file:add_to_wishlist.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
