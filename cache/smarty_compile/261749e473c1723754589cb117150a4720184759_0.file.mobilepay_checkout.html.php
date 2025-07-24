<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:06:32
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/mobilepay_checkout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882ae685a8030_31246287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '261749e473c1723754589cb117150a4720184759' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/mobilepay_checkout.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882ae685a8030_31246287 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
if ($_smarty_tpl->tpl_vars['webshop']->value->hasInvoiceAddressSelection()) {?>

	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "terms_form", null, null);?>
		<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
			<h3 class="headline">Betal med MobilePay Checkout</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>
			<form action="/basket" method="post" class="mt-4">

				<div class="my-3 checkout-content">
					<div class="terms">
						<?php if ($_smarty_tpl->tpl_vars['settings']->value['texts']['terms']) {?>
							<?php echo $_smarty_tpl->tpl_vars['settings']->value['texts']['terms'];?>

						<?php } else { ?>
							Denne shop har ikke nogen betingelser.
							Enten opret nogen, eller indsæt en tom tekst under dine <a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['url']->value);?>
/theme-setup/settings#tabs-5" target="_blank">designindstillinger</a>.
						<?php }?>
					</div>
				</div>

				<div class="form-group">
					<label for="accept">
						<input id="accept" type="checkbox" name="accept" value="1" required/>
						Jeg accepterer ovenstående handelsbetingelserne.
					</label>
				</div>

				<div class="form-group">
					<input class="btn btn-primary button color proceed" type="submit" name="invoice_address_selection" value="Betal med MobilePay Checkout"/>
				</div>
			</form>
		</div>
	<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

	<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>

		<?php if ($_smarty_tpl->tpl_vars['show']->value == "button") {?>

			<a href="#small-dialog" style="padding:10px;" class="popup-with-zoom-anim button margin-left-0 btn btn-primary button color proceed">Betal med MobilePay Checkout</a>

		<?php } elseif ($_smarty_tpl->tpl_vars['show']->value == "form") {?>

			<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'terms_form');?>


		<?php }?>

	<?php } else { ?>
		<div class="my-4"><a href="#small-dialog" class="popup-with-zoom-anim button margin-left-0 btn btn-primary button color proceed">Betal med MobilePay Checkout</a></div>

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'terms_form');?>

	<?php }?>

<?php }
}
}
