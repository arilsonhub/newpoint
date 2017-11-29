<?php /* Smarty version Smarty-3.1.1, created on 2014-03-22 03:08:42
         compiled from "app/view/templates\Cursos\descricao.php" */ ?>
<?php /*%%SmartyHeaderCode:11472532cf0aa131a54-11637997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a30ecfd30874dd5dd656953499ec25c93c95dffd' => 
    array (
      0 => 'app/view/templates\\Cursos\\descricao.php',
      1 => 1395449788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11472532cf0aa131a54-11637997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dados_modulo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_532cf0aa1aabf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532cf0aa1aabf')) {function content_532cf0aa1aabf($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Newpoint Escolas Profissionalizantes - Página Inicial</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <?php echo $_smarty_tpl->getSubTemplate ("include/css.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</head>
<body id="index">
  <div role="main" id="main">
      <?php if ($_smarty_tpl->tpl_vars['dados_modulo']->value!==false){?>
			<?php echo $_smarty_tpl->tpl_vars['dados_modulo']->value['descricao'];?>

			
		<?php }else{ ?>	
			O Modulo solicitado não foi encontrado.			
	  <?php }?>
  </div><!-- fim da div main -->
</body>
</html><?php }} ?>