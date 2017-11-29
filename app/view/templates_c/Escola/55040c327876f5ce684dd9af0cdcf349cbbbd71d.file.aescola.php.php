<?php /* Smarty version Smarty-3.1.1, created on 2014-03-23 01:01:16
         compiled from "app/view/templates\Escola\aescola.php" */ ?>
<?php /*%%SmartyHeaderCode:14215532e244c9a1db0-45142983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55040c327876f5ce684dd9af0cdcf349cbbbd71d' => 
    array (
      0 => 'app/view/templates\\Escola\\aescola.php',
      1 => 1395449788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14215532e244c9a1db0-45142983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
    'dados_escola' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_532e244ca170c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e244ca170c')) {function content_532e244ca170c($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="História,Curso de inglês,New Point,Logos,Newzito" />
  <meta name="description" content="Textos sobre a escola, nossa missão, valores e história do logo" >
  <title>Conheça-nos | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  <?php echo $_smarty_tpl->getSubTemplate ("include/css.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="aescola">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	<?php echo $_smarty_tpl->getSubTemplate ("include/topo.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>A Escola</p>
  	</div>
  	<div id="">
  		
  		<span class="negrito">Missão</span>
  		<div id="missao">
  			<?php echo $_smarty_tpl->tpl_vars['dados_escola']->value['missao'];?>

  		</div>
  		
  		<span class="negrito">Visão</span>
  		<div id="visao">
  			<?php echo $_smarty_tpl->tpl_vars['dados_escola']->value['visao'];?>

  		</div>
  		
  		<span class="negrito">Valores</span>
  		<div id="valores">
	  		<?php echo $_smarty_tpl->tpl_vars['dados_escola']->value['texto_principal'];?>

		</div>
		
		<span class="negrito">História do logo</span>
		<div id="historia_logo">
			<img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/historico_logos.PNG" alt="história dos logos da Newpoint"/>
			<p class="negrito">Evolução da Logomarca</p>
			<p>A NEWPOINT sempre teve como característica ser inovadora, estar atenta a tudo, as tendências e as mudanças. Sua logo marca ao longo dos anos recebeu atenção especial, pois remete a proposta e a missão da Escola.</p>
		</div>
		
		<span class="negrito">Newzito</span>
		<div id="newzito">
			<p>Newzito é o mascote oficial da Escola New Point.</p>
			<img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/newzito.png" alt="Newzito o mascote da escola" class="esquerda"/>
			<p>
				Nascido em 2009 , é um mascote muito inquieto, atento a tudo que está na sua volta. Gosta muito de notícias sobre o mundo, estudos, trabalho. Além de muito esperto é organizado, traduzindo assim o espirito e a preocupação com a Qualidade e a constante Atualização em tudo. O Newzito é além de tudo, muito participativo, quer estar nos eventos, nas aulas, nas formaturas, e onde o aluno está.
			</p>
			<div class="clear"></div>
		</div>
  	</div>

	<div class="clear"></div>
  </div><!-- fim da div main -->
  <?php echo $_smarty_tpl->getSubTemplate ("include/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  
</body>
</html><?php }} ?>