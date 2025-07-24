<?php
/* Smarty version 4.1.0, created on 2025-07-24 22:10:38
  from '/Users/mbn/www/hackorama/themes/Alaska2/templates/admin_menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6882af5e47f640_23771675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b553818bc15d026f52fa0d30cd7164a63ef4dab3' => 
    array (
      0 => '/Users/mbn/www/hackorama/themes/Alaska2/templates/admin_menu.html',
      1 => 1753389816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6882af5e47f640_23771675 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/mbn/www/lamplite/0.1/includes/smarty-4.1.0/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
if (!$_smarty_tpl->tpl_vars['settings']->value['settings']['disable_admin_menu'] && $_smarty_tpl->tpl_vars['user_id']->value) {?>
	<div id="admin-menu">
		<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
" class="btn">Administration</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder" class="btn">Page Builder</a>

		<?php if ($_smarty_tpl->tpl_vars['inc']->value && in_array($_smarty_tpl->tpl_vars['inc']->value,array('basket.html','address.html','search.html','also.html'))) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder/new?type=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['inc']->value,".html",'');?>
" class="btn">Rediger design</a>
		<?php } elseif ($_smarty_tpl->tpl_vars['product']->value) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder/new?type=product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getProductId();?>
" class="btn">Rediger design</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value->getUrl('edit');?>
" class="btn">Rediger indhold</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value->getUrl('add');?>
" class="btn">Læg på lager</a>
		<?php } elseif ($_smarty_tpl->tpl_vars['category']->value) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder/new?type=category&id=<?php echo $_smarty_tpl->tpl_vars['category']->value->getCategoryId();?>
" class="btn">Rediger design</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['category']->value->getUrl('edit');?>
" class="btn">Rediger indhold</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['category']->value->getUrl('order');?>
" class="btn">Produktrækkefølge</a>
		<?php } elseif ($_smarty_tpl->tpl_vars['landing_page']->value) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder/new?type=landing_page&id=<?php echo $_smarty_tpl->tpl_vars['landing_page']->value->getLandingPageId();?>
" class="btn">Rediger design</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['landing_page']->value->getUrl('edit');?>
" class="btn">Rediger indhold</a>
		<?php } elseif ($_smarty_tpl->tpl_vars['page']->value) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder/new?type=static_page&id=<?php echo $_smarty_tpl->tpl_vars['page']->value->getPageId();?>
" class="btn">Rediger design</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['page']->value->getUrl('edit');?>
" class="btn">Rediger indhold</a>
		<?php } elseif ($_smarty_tpl->tpl_vars['blog_post']->value) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/page-builder/new?type=blog_post&id=<?php echo $_smarty_tpl->tpl_vars['blog_post']->value->getBlogPostId();?>
" class="btn">Rediger design</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['blog_post']->value->getUrl('edit');?>
" class="btn">Rediger indhold</a>
		<?php }?>
	</div>
<?php }
}
}
