<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/tracking_bottom.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e478654_94561923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc61ca3f17a0e72c30f667fc192b27c19a03227c' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/tracking_bottom.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882af5e478654_94561923 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['webshop']->value->getEnableTracking() && $_smarty_tpl->tpl_vars['cookie']->value['accept_cookies'] == 'accept') {?>

	<!-- Google Tag Manager (noscript start) -->
	    <noscript>
	    	<iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getGoogleTagManagerId();?>
" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	    </noscript>
	<!-- Google Tag Manager (noscript end) -->

<?php }
}
}
