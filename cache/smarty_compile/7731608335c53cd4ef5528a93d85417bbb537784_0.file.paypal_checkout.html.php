<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:06:32
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/paypal_checkout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882ae685aec57_73660886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7731608335c53cd4ef5528a93d85417bbb537784' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/paypal_checkout.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882ae685aec57_73660886 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
if ($_smarty_tpl->tpl_vars['webshop']->value->hasPayPalCheckout()) {?>

	<?php $_smarty_tpl->_assignInScope('client_id', $_smarty_tpl->tpl_vars['webshop']->value->getPayPalClientId());?>

	<?php echo '<script'; ?>
 src="https://www.paypal.com/sdk/js?client-id=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['client_id']->value);?>
&currency=<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
" data-order-id="<?php echo $_smarty_tpl->tpl_vars['basket_id']->value;?>
"><?php echo '</script'; ?>
>

	<div id="paypal-button-container"></div>

	<?php $_smarty_tpl->_assignInScope('secret', $_smarty_tpl->tpl_vars['webshop']->value->getPayPalSecret($_smarty_tpl->tpl_vars['basket_id']->value));?>

	<?php echo '<script'; ?>
>
		paypal.Buttons({
			createOrder: function(data, actions) {
				return actions.order.create({
					purchase_units: [{
						amount: {
							value: '<?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2,".",'');?>
'
						},
						custom_id: '<?php echo $_smarty_tpl->tpl_vars['basket_id']->value;?>
',
						reference_id: '<?php echo $_smarty_tpl->tpl_vars['secret']->value;?>
'
					}]
				});
			},
			onApprove: function(data, actions) {
				return actions.order.capture().then(function(details) {
					var stackie = [];
					stackie.push('basket_id=' + encodeURIComponent(details.purchase_units[0].custom_id));
					stackie.push('pplc='      + encodeURIComponent(details.purchase_units[0].reference_id));
					stackie.push('name='      + encodeURIComponent(details.purchase_units[0].shipping.name.full_name));
					stackie.push('address='   + encodeURIComponent(details.purchase_units[0].shipping.address.address_line_1));
					stackie.push('address2='  + encodeURIComponent(details.purchase_units[0].shipping.address.address_line_2));
					stackie.push('zipcode='   + encodeURIComponent(details.purchase_units[0].shipping.address.postal_code));
					stackie.push('city='      + encodeURIComponent(details.purchase_units[0].shipping.address.admin_area_2));
					stackie.push('email='     + encodeURIComponent(details.payer.email_address));
					stackie.push('payer='     + encodeURIComponent(details.payer.payer_id));
					stackie.push('id='        + encodeURIComponent(details.id));

					var url = '<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getUrl();?>
/thanks?' + stackie.join('&');

					top.location.href = url;
				});
			}
		}).render('#paypal-button-container');
	<?php echo '</script'; ?>
>

<?php }
}
}
