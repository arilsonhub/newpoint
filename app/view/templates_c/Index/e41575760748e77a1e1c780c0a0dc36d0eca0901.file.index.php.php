<?php /* Smarty version Smarty-3.1.1, created on 2014-04-18 04:36:51
         compiled from "app/view/templates\Index\index.php" */ ?>
<?php /*%%SmartyHeaderCode:996953508fc333cba5-90311829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e41575760748e77a1e1c780c0a0dc36d0eca0901' => 
    array (
      0 => 'app/view/templates\\Index\\index.php',
      1 => 1394847943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '996953508fc333cba5-90311829',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_53508fc35dca4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53508fc35dca4')) {function content_53508fc35dca4($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="Cursos de Inglês,Informática,Qualificação Profissional,New Point" />
  <meta name="description" content="O ponto inicial para a sua qualificação, cursos de inglês e informática." >
  <title>Cursos de Inglês | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  
  <?php echo $_smarty_tpl->getSubTemplate ("include/css.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</head>
<body id="index">
	<div class="escondido">
		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/promoNP.png" id="romo" class="fancybox">fancy</a>
	</div>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <?php echo $_smarty_tpl->getSubTemplate ("include/topo.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php echo $_smarty_tpl->getSubTemplate ("include/banner.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

  <div role="main" id="main">
  	<div id="galeria" class="galeria_background">
  		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
album" title="Link para a galeria de fotos"></a>
  	</div>
  	<div id="area_do_aluno">
  		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
area-do-aluno" title="Link para a área do aluno"></a>
  	</div>
  	<div id="convenios">
  		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
convenios" title="Link para os convênios"></a>
  	</div>
  	
  	<div id="agenda">
  		<?php echo $_smarty_tpl->getSubTemplate ("include/agenda.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  	</div>
  	
  	<div id="nivelamento">
  		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
teste" title="Faça o seu teste de nivelamento para o inglês aqui."></a>
  	</div>
  	<div id="aula_demonstrativa">
  		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
aula-demonstrativa" title="Faça sua solicitação de aula demonstrativa aqui"></a>
  	</div>
  	<div id="facebook">
	    <?php echo $_smarty_tpl->getSubTemplate ("include/facebook.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  		
  	</div>
  	<div id="twitter">
	    <?php echo $_smarty_tpl->getSubTemplate ("include/twitter.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  				
  	</div>
  	<div id="self_study">
  		<a href="http://184.172.11.187/~learnetc/MML_NP/" title="Link Externo para página"></a>
  	</div>
  	<div id="trabalhe_conosco">
  		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
trabalhe-conosco" title="Envie seu currículo clicando aqui."></a>
  	</div>
  	<div id="acesso_restrito">
  		<form action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
admin/index.php" method="post">
  			<fieldset>Acesso restrito - Colaboradores</fieldset>
  			<label for="login">LOGIN:</label><input type="text" name="login" id="login" /><br />
  			<label for="senha">SENHA:</label><input type="password" name="senha" id="senha" /><br />
  			<input type="image" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/btn_form.jpg" value="enviar" id="enviar" alt="enviar formulário" /><br />
  			<a href="http://webmail.escolasnewpoint.com.br/" title="Acesso ao webmail da instituição">Acesso ao Webmail</a>
  		</form>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  <?php echo $_smarty_tpl->getSubTemplate ("include/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>