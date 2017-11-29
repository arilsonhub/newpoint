<?php /* Smarty version Smarty-3.1.1, created on 2014-04-18 04:36:51
         compiled from "include\banner.php" */ ?>
<?php /*%%SmartyHeaderCode:1133253508fc38363d7-25654204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf4cf66c488fb7751bb7f186ab167436ad6a674' => 
    array (
      0 => 'include\\banner.php',
      1 => 1394847943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1133253508fc38363d7-25654204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recordset_banners' => 0,
    'URL_DEFAULT' => 0,
    'banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_53508fc389bce',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53508fc389bce')) {function content_53508fc389bce($_smarty_tpl) {?>	<?php if ($_smarty_tpl->tpl_vars['recordset_banners']->value!==false){?>
		<div id="banner_bg">
			<div id="banner" class="nivoSlider theme-default">
				<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recordset_banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/upload/banner/<?php echo $_smarty_tpl->tpl_vars['banner']->value['imagem'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value['titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banner']->value['titulo'];?>
"/>
				<?php } ?>
			</div><!-- Fim banner -->
		</div>
	<?php }?><?php }} ?>