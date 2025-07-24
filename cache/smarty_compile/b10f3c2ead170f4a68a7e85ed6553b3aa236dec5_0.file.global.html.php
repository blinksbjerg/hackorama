<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/global.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e43ac96_43773471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b10f3c2ead170f4a68a7e85ed6553b3aa236dec5' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/global.html',
      1 => 1753395030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tracking_top.html' => 1,
    'file:design.html' => 1,
    'file:tracking_bottom.html' => 1,
    'file:admin_menu.html' => 1,
    'file:navigation.html' => 1,
    'file:gdpr.html' => 1,
  ),
),false)) {
function content_6882af5e43ac96_43773471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'handle_footer' => 
  array (
    'compiled_filepath' => '/Users/mbn/www/hackorama/cache/smarty_compile/b10f3c2ead170f4a68a7e85ed6553b3aa236dec5_0.file.global.html.php',
    'uid' => 'b10f3c2ead170f4a68a7e85ed6553b3aa236dec5',
    'call_name' => 'smarty_template_function_handle_footer_5473724906882af5e3f6003_33289218',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
?>
<!DOCTYPE html>
<html lang="da">
<head>
	<?php $_smarty_tpl->_subTemplateRender("file:tracking_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<meta charset="utf-8">

	<title><?php if ($_smarty_tpl->tpl_vars['meta_title']->value) {
echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value);
} elseif ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'title')) {
echo smarty_modifier_escape($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'title'));
} else {
echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getName());
}?></title>

	<?php if ($_smarty_tpl->tpl_vars['noindex']->value) {?>
		<meta name="robots" content="noindex, follow">
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['meta_description']->value) {?>
		<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value);?>
">
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['canonical']->value) {?>
		<link rel="canonical" type="text/html" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['canonical']->value);?>
"/>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['open_graph_title']->value) {?>
		<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['open_graph_title']->value;?>
"/>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['open_graph_description']->value) {?>
		<meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['open_graph_description']->value;?>
" />
	<?php }?>

	<meta name="generator" content="Shoporama">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"><?php echo '</script'; ?>
>

	<?php $_prefixVariable1 = $_smarty_tpl->tpl_vars['webshop']->value->getFavicon();
$_smarty_tpl->_assignInScope('favicon', $_prefixVariable1);
if ($_prefixVariable1) {?>
		<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon']->value->getSrc(64,64,'box');?>
">
	<?php } elseif ($_smarty_tpl->tpl_vars['settings']->value['design']['favicon']) {?>
		<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['favicon']->getSrc(64,64,'box');?>
">
	<?php }?>

	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/css/style.css">
	<?php $_smarty_tpl->_subTemplateRender("file:design.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body class="<?php echo (($tmp = $_smarty_tpl->tpl_vars['settings']->value['design']['size'] ?? null)===null||$tmp==='' ? 'boxed' ?? null : $tmp);?>
">
	<?php $_smarty_tpl->_subTemplateRender("file:tracking_bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->_subTemplateRender("file:admin_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div id="wrapper">

		<div id="top-bar">
			<div class="container">

				<div class="row">
					<div class="col-md-6">
						<ul class="top-bar-menu">
							<?php if ($_smarty_tpl->tpl_vars['settings']->value['contact']['phone']) {?><li><i class="fa fa-phone"></i> <a href="tel:<?php echo $_smarty_tpl->tpl_vars['settings']->value['contact']['phone'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['settings']->value['contact']['phone'];?>
</a></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['settings']->value['contact']['mail']) {?><li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['settings']->value['contact']['mail'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['settings']->value['contact']['mail'];?>
</a></li><?php }?>
						</ul>
					</div>

					<div class="col-6">
						<ul class="social-icons">
							<?php if ($_smarty_tpl->tpl_vars['settings']->value['some']['instagram']) {?><li><a class="instagram" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['some']['instagram'];?>
" target="_blank"><i class="icon-instagram"></i></a></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['settings']->value['some']['facebook']) {?><li><a class="facebook" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['some']['facebook'];?>
" target="_blank"><i class="icon-facebook"></i></a></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['settings']->value['some']['twitter']) {?><li><a class="twitter" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['some']['twitter'];?>
" target="_blank"><i class="icon-twitter"></i></a></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['settings']->value['some']['pinterest']) {?><li><a class="pinterest" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['some']['pinterest'];?>
" target="_blank"><i class="icon-pinterest"></i></a></li><?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 col-sm-10 col-12">
					<div id="logo">
						<?php $_prefixVariable2 = $_smarty_tpl->tpl_vars['webshop']->value->getLogo();
$_smarty_tpl->_assignInScope('logo', $_prefixVariable2);
if ($_prefixVariable2) {?>
							<h1><a href="/"><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value->getSrc(300,300,'fit');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getName());?>
"/></a></h1>
						<?php } elseif ($_smarty_tpl->tpl_vars['settings']->value['design']['logo']) {?>
							<h1><a href="/"><img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['design']['logo']->getSrc(300,300,'fit');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getName());?>
" /></a></h1>
						<?php } else { ?>
							<h1><a href="/"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['webshop']->value->getName());?>
</a></h1>
						<?php }?>
					</div>
				</div>
				<div class="col-md-8 col-sm-10 col-12">

					<div class="row">
						<div class="col-12">
							<div id="additional-menu">
								<ul>
									<li><a href="/basket">Din kurv</a></li>
									<?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
										<li><a href="/user-edit">Din profil</a></li>
										<li><a href="/user-orders">Dine ordrer</a></li>

										<?php if ($_smarty_tpl->tpl_vars['settings']->value['settings']['use_wishlist']) {?>
											<li><a href="/user-wishlists">Dine ønskelister</a></li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['webshop']->value->hasLoyaltyProgram()) {?>
											<li><a href="/user-points">Dine point (<?php echo number_format($_smarty_tpl->tpl_vars['customer']->value->getActivePoints(),0,",",".");?>
)</a></li>
										<?php }?>

										<li><a href="/user-sign-out?redir=">Log ud</a></li>
									<?php } elseif ($_smarty_tpl->tpl_vars['settings']->value['settings']['show_login']) {?>
										<?php if ($_smarty_tpl->tpl_vars['webshop']->value->useReturnCenter()) {?>
											<li><a href="/return">Returcenter</a></li>
										<?php }?>
										<li><a href="/user-sign-in">Log ind</a></li>
										<li><a href="/user-sign-up">Opret konto</a></li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">

							<div id="cart">

								<!-- Button -->
								<div class="cart-btn">
									<a href="/basket" class="button adc color"><?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</a>
								</div>

								<div class="cart-list">

								<div class="arrow"></div>

									<div class="cart-amount">
										<span><?php echo $_smarty_tpl->tpl_vars['total_amount']->value;?>
 vare<?php if ($_smarty_tpl->tpl_vars['total_amount']->value != 1) {?>r<?php }?> i din kurv</span>
									</div>

									<ul>
										<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['basket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
											<?php $_smarty_tpl->_assignInScope('product', $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product']);?>
											<?php $_smarty_tpl->_assignInScope('image', $_smarty_tpl->tpl_vars['product']->value->getImage());?>

											<li>
												<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
">
													<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
														<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getSrc(100,100,'box');?>
" alt="" />
													<?php } else { ?>
														<img src="images/small_product_list_08.jpg" alt="" />
													<?php }?>
												</a>
												<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getRemoteUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->getName());?>
</a>
												<span><?php echo $_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amount'];?>
 x <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->getRealPrice(1,$_smarty_tpl->tpl_vars['basket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes']),2,",",".");?>
 <?php echo $_smarty_tpl->tpl_vars['webshop']->value->getCurrency();?>
</span>
												<div class="clearfix"></div>
											</li>

										<?php
}
}
?>
									</ul>

									<div class="cart-buttons">
										<a href="/basket" class="view-cart" ><span data-hover="View Cart"><span>Vis kurv</span></span></a>
										<a href="/address" class="checkout"><span data-hover="Checkout">Gennemfør ordre</span></a>
									</div>
									<div class="clearfix">

									</div>
								</div>

							</div>

							<!-- Search -->
							<nav class="top-search">
								<form action="/search" method="get" autocomplete="off">
									<div class="autocomplete">
										<button><i class="fa fa-search"></i></button>
										<input id="top-search" class="search-field" type="search" placeholder="Søg" name="search" value="<?php if ((isset($_smarty_tpl->tpl_vars['get']->value['search']))) {
echo smarty_modifier_escape($_smarty_tpl->tpl_vars['get']->value['search']);
}?>"/>
									</div>
								</form>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $_smarty_tpl->_subTemplateRender("file:navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'breadcrumb');?>


		<?php echo $_smarty_tpl->tpl_vars['contents']->value;?>


		<div class="margin-top-50"></div>

		<div id="footer">

			<div class="container justify-content-center">

				

				<div class="row">
					<div class="col-10 col-md-3">
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'handle_footer', array('block'=>"#footer1"), true);?>

					</div>

					<div class="col-10 col-md-3">
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'handle_footer', array('block'=>"#footer2"), true);?>

					</div>

					<div class="col-10 col-md-3">
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'handle_footer', array('block'=>"#footer3"), true);?>

					</div>

					<div class="col-10 col-md-3">
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'handle_footer', array('block'=>"#footer4"), true);?>

					</div>
				</div>

			</div>
			<!-- Container / End -->

		</div>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['webshop']->value->getBlocks("#bottom_footer"), 'section');
$_smarty_tpl->tpl_vars['section']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
$_smarty_tpl->tpl_vars['section']->do_else = false;
?>
			<div id="footer-bottom">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-10 col-md-6"><?php echo $_smarty_tpl->tpl_vars['section']->value['text'];?>
</div>
						<div class="col-10 col-md-6">
							<?php $_prefixVariable4 = $_smarty_tpl->tpl_vars['section']->value['images'];
$_smarty_tpl->_assignInScope('images', $_prefixVariable4);
if ($_prefixVariable4) {?>
								<ul class="payment-icons">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
										<li><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getSrc(50,30,'fit');?>
" alt="" /></li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ul>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		<?php if ($_smarty_tpl->tpl_vars['settings']->value['gdpr']['text']) {?>
			<?php $_smarty_tpl->_subTemplateRender("file:gdpr.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php }?>

		<div id="backtotop"><a href="#"></a></div>
	</div>

	<div id="powered-by-shoporama" style="text-align:center; font-size:9pt; margin:10px;">
		<?php if ($_smarty_tpl->tpl_vars['webshop']->value->getLanguage() == 'DA') {?>
			<a href="https://www.shoporama.dk/" target="_blank" style="color:#666;">Leveret af Shoporama</a>
		<?php } else { ?>
			<a href="https://www.shoporama.io/" target="_blank" style="color:#666;">Powered by Shoporama</a>
		<?php }?>
	</div>

	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.jpanelmenu.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.themepunch.plugins.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.themepunch.revolution.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.themepunch.showbizpro.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/hoverIntent.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/superfish.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.pureparallax.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.pricefilter.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.selectric.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.royalslider.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/SelectBox.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/modernizr.custom.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/waypoints.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.flexslider-min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.counterup.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.tooltips.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.isotope.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/puregrid.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/stacktable.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/autocomplete.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/jquery.cookie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
/templates/scripts/custom.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
/* smarty_template_function_handle_footer_5473724906882af5e3f6003_33289218 */
if (!function_exists('smarty_template_function_handle_footer_5473724906882af5e3f6003_33289218')) {
function smarty_template_function_handle_footer_5473724906882af5e3f6003_33289218(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),1=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/block.t.php','function'=>'smarty_block_t',),));
?>

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['webshop']->value->getBlocks($_smarty_tpl->tpl_vars['block']->value), 'section');
$_smarty_tpl->tpl_vars['section']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
$_smarty_tpl->tpl_vars['section']->do_else = false;
?>

						<?php if ($_smarty_tpl->tpl_vars['section']->value['headline']) {?>
							<h3 class="headline footer"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['section']->value['headline']);?>
</h3>
							<span class="line"></span>
							<div class="clearfix"></div>
						<?php }?>

						<?php $_prefixVariable3 = $_smarty_tpl->tpl_vars['section']->value['image'];
$_smarty_tpl->_assignInScope('image', $_prefixVariable3);
if ($_prefixVariable3) {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->getSrc(150,75,'fit');?>
" alt="" class="margin-top-10"/>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['section']->value['html']) {?>
							<div class="margin-top-15">
								<?php echo $_smarty_tpl->tpl_vars['section']->value['html'];?>

							</div>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['section']->value['links']) {?>
							<ul class="footer-links">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['section']->value['links'], 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
									<li><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value['link']);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value['title']);?>
</a></li>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['section']->value['add_newsletter']) {?>
							<form action="" method="post">
								<button class="newsletter-btn" value="Tilmeld" type="submit"><?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat=true;
echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>Tilmeld<?php $_block_repeat=false;
echo smarty_block_t(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?></button>
								<input class="newsletter" type="email" name="email" placeholder="" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['session_order']->value['email']);?>
"/>
								<input type="hidden" name="mailinglist" id="mailinglist" value="1"/>
							</form>
						<?php }?>

					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php
}}
/*/ smarty_template_function_handle_footer_5473724906882af5e3f6003_33289218 */
}
