<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/design.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e475b02_21737429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cfcd2730f1303857e078caa0329041415cb1358' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/design.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882af5e475b02_21737429 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['settings']->value['design']['color']) {?>
	<style type="text/css">
		.top-bar-dropdown ul li a:hover, .skill-bar-value, .counter-box.colored, a.menu-trigger:hover, .pagination .current, .pagination ul li a:hover, .pagination-next-prev ul li a:hover, .tabs-nav li.active a, .dropcap.full, .highlight.color, .ui-accordion .ui-accordion-header-active:hover, .ui-accordion .ui-accordion-header-active, .trigger.active a, .trigger.active a:hover, .share-buttons ul li:first-child a, a.caption-btn:hover, .mfp-close:hover, .mfp-arrow:hover, .img-caption:hover figcaption, #price-range .ui-state-default, .selectricItems li:hover, .product-categories .img-caption:hover figcaption, .rsDefault .rsThumbsArrow:hover, .customSelect .selectList dd.hovered, .qtyplus:hover, .qtyminus:hover, a.calculate-shipping:hover, .og-close:hover, .tags a:hover {
			background: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
;
		}

		.top-search button:hover, .cart-buttons a, .cart-buttons a.checkout, .menu > li:hover .current, .menu > li.sfHover .current, .menu > li:hover, .menu > li.sfHover, li.dropdown ul li a:hover, #jPanelMenu-menu li a:hover, input[type="button"], input[type="submit"], .button, .button.color, .button.dark:hover, .button.gray:hover, .icon-box:hover span, .tp-leftarrow:hover, .tp-rightarrow:hover, .sb-navigation-left:hover, .sb-navigation-right:hover, .product-discount, .newsletter-btn, #categories li a:hover, #categories li a.active, .flexslider .flex-prev:hover, .flexslider .flex-next:hover, .rsDefault .rsArrowIcn:hover, .hover-icon, #backtotop a:hover, #filters a:hover, #filters a.selected {
			background-color: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
;
		}

		a, .happy-clients-author, #categories li li a.active span, #categories li li a.active, #additional-menu ul li a:hover, #additional-menu ul li a:hover span, .mega a:hover, .mega ul li p a, #not-found i, .dropcap, .list-1.color li:before, .list-2.color li:before, .list-3.color li:before, .list-4.color li:before, .comment-by span.reply a:hover, .comment-by span.reply a:hover i, #categories li ul li a:hover span, #categories li ul li a:hover, table .cart-title a:hover, .st-val a:hover, .meta a:hover {
			color: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
;
		}

		#jPanelMenu-menu a.current, .checkout-section.active {
			background: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
 !important;
		}

		.current-page {
			background-color: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
 !important;
		}

		blockquote {
			border-left: 4px solid <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
;
		}

		.categories li a:hover {
			color: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['color'];?>
 !important;
		}
	</style>
<?php } else { ?>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/css/colors/green.css" id="colors">
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['settings']->value['design']['background_color']) {?>
	<style type="text/css">
		body {
			background-color: <?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['background_color'];?>
 !important;
		}
	</style>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['webshop']->value->getStylesheet()) {?>
	<style type="text/css">
		<?php echo $_smarty_tpl->tpl_vars['webshop']->value->getStylesheet();?>

	</style>
<?php }
}
}
