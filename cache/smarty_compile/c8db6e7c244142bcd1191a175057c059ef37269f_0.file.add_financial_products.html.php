<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:06:32
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/add_financial_products.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882ae6859b0e7_49878677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8db6e7c244142bcd1191a175057c059ef37269f' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/add_financial_products.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882ae6859b0e7_49878677 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/function.math.php','function'=>'smarty_function_math',),));
$_smarty_tpl->_assignInScope('finpro', $_smarty_tpl->tpl_vars['webshop']->value->getFinancialProducts());?>

<?php if ($_smarty_tpl->tpl_vars['finpro']->value) {?>

	<?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['finpro']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>

		<?php $_smarty_tpl->_assignInScope('show_financial_product', true);?>
		<?php
$__section_j_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['basket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_4_total = $__section_j_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_4_total !== 0) {
for ($__section_j_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_4_iteration <= $__section_j_4_total; $__section_j_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
			<?php $_smarty_tpl->_assignInScope('product', $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['product']);?>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->getProductId() == $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getProductId()) {?>
				<?php $_smarty_tpl->_assignInScope('show_financial_product', false);?>
			<?php }?>
		<?php
}
}
?>

		<?php if ($_smarty_tpl->tpl_vars['show_financial_product']->value && ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditUntil() || $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditDays() || $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditDate() || $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getIsVoucher())) {?>

			<form action="/" method="post">

				<div class="row mb-2">
					<div class="col-12">

						<div class="info-banner">
							<div class="info-content">

								<h3><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getName());?>
</h3>
								<div>
									<label class="my-2 mb-2"><input type="checkbox" required><strong>
										<?php echo (($tmp = $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getListDescription() ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getDescription() ?? null : $tmp);?>


										<?php if ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditUntil()) {?>

											Pengene trækkes tidligst d. <?php echo $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreditUntil();?>
 i
											<?php if ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreditUntil() > smarty_modifier_date_format(time(),"%e")) {?>denne<?php } else { ?>næste<?php }?>
											måned.

										<?php } elseif ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditDays()) {?>

											<?php echo smarty_function_math(array('assign'=>"date",'equation'=>"x+(y*3600*24)",'x'=>time(),'y'=>$_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreditDays()),$_smarty_tpl);?>


											Pengene trækkes tidligst om <?php echo $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreditDays();?>
 dage. <?php echo ucfirst(mb_strtolower(smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%A d. %e. %B"), 'UTF-8'));?>


										<?php } elseif ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditDate()) {?>

											Pengene trækkes tidligst d. <?php echo mb_strtolower(smarty_modifier_date_format($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreditDate(),"%A d. %e. %B %Y"), 'UTF-8');?>
.

										<?php } elseif ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getIsVoucher()) {?>

											Tilgodebeviset på <?php echo number_format($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getVoucherAmount(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
 gælder i <?php echo $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getVoucherDays();?>
 dage

										<?php }?>

										<span class="highlight color">Pris <?php echo number_format($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPrice(),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</span>
									</strong></label>
									<input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getProductId();?>
"/>
									<input type="hidden" name="amount" value="1"/>
									<input type="hidden" name="redirect" value="basket"/>

									<?php if ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditUntil() || $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditDays() || $_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getHasCreditDate()) {?>
										<input type="submit" value="Tilføj kredit">
									<?php } elseif ($_smarty_tpl->tpl_vars['finpro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getIsVoucher()) {?>
										<input type="submit" value="Tilføj tilgodebevis">
									<?php }?>

								</div>

							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>

			</form>

		<?php }?>

	<?php
}
}
?>

<?php }
}
}
