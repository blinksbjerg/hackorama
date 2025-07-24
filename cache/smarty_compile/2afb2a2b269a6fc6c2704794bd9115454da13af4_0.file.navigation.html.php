<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/navigation.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e489df0_81085378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2afb2a2b269a6fc6c2704794bd9115454da13af4' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/navigation.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:category_section.html' => 1,
  ),
),false)) {
function content_6882af5e489df0_81085378 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
?>
<div class="container" style="padding:0;">
	<div class="">

		<div class="row justify-content-center">
			<div class="col-sm-10 col-12" style="padding: 0 27px 0 28px;">
				<a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> Menu</a>
			</div>
		</div>

		<nav id="navigation">
			<ul class="menu" id="responsive">

				<li><a href="/" class="current homepage" id="current">Hjem</a></li>

				<?php $_smarty_tpl->_assignInScope('menu', $_smarty_tpl->tpl_vars['webshop']->value->getMenuByLocation('top'));?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value) {?>

					<?php $_smarty_tpl->_assignInScope('items', $_smarty_tpl->tpl_vars['menu']->value->getItems());?>
					<?php
$__section_i_6_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['items']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_6_total = $__section_i_6_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_6_total !== 0) {
for ($__section_i_6_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_6_iteration <= $__section_i_6_total; $__section_i_6_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
						<li class="dropdown">
							<?php if ($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getType() == "menu") {?>
								<?php $_smarty_tpl->_assignInScope('subitems', $_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getItems());?>
								<a href="#"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getTitel());?>
</a>
								<ul>
									<?php
$__section_j_7_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['subitems']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_j_7_total = $__section_j_7_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_7_total !== 0) {
for ($__section_j_7_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_7_iteration <= $__section_j_7_total; $__section_j_7_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
										<li class="dropdown <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subitems']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getClass());?>
"><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subitems']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subitems']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]->getTitel());?>
</a></li>
									<?php
}
}
?>
								</ul>
							<?php } else { ?>
								<li class="dropdown <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getClass());?>
"><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getUrl());?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getTitel());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getTitel());?>
</a></li>
							<?php }?>
						</li>
					<?php
}
}
?>

				<?php } else { ?>
					<?php $_smarty_tpl->_assignInScope('categories', array_slice($_smarty_tpl->tpl_vars['webshop']->value->getCategories(),0,5));?>

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
						<?php if ($_smarty_tpl->tpl_vars['cat']->value->getInMenu()) {?>
							<li class="dropdown">
								<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value->getUrl());?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value->getName());?>
</a>
								<?php $_smarty_tpl->_subTemplateRender("file:category_section.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('categories'=>$_smarty_tpl->tpl_vars['cat']->value->getChildren()), 0, true);
?>
							</li>
						<?php }?>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					<?php $_smarty_tpl->_assignInScope('blog_posts', $_smarty_tpl->tpl_vars['webshop']->value->getBlogPosts(1,0));?>
					<?php if ($_smarty_tpl->tpl_vars['blog_posts']->value) {?>
						<li><a href="/blog">Blog</a></li>
					<?php }?>

				<?php }?>

			</ul>

		</nav>
	</div>
</div><?php }
}
