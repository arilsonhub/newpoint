<?php /* Smarty version Smarty-3.1.1, created on 2014-03-23 01:09:50
         compiled from "app/view/templates\Cursos\cursos.php" */ ?>
<?php /*%%SmartyHeaderCode:8941532e264e4c9281-04726436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfde118af72ff0f953ec5c14bda5a90bcf097395' => 
    array (
      0 => 'app/view/templates\\Cursos\\cursos.php',
      1 => 1395449788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8941532e264e4c9281-04726436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'JS_CONTROLLER' => 0,
    'recordset_cursos' => 0,
    'k' => 0,
    'curso' => 0,
    'Helper' => 0,
    'URL_DEFAULT' => 0,
    'curso_modulo' => 0,
    'recordset_unidades' => 0,
    'unidade' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_532e264e5750a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532e264e5750a')) {function content_532e264e5750a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="Cursos,Inglês,Idiomas,Informática,Kids" />
  <meta name="description" content="Conheça nossos cursos e entre em contato ou assine nossa News Letter" >
  <title>Cursos de Inglês e Informática | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  <?php echo $_smarty_tpl->getSubTemplate ("include/css.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <script src="<?php echo $_smarty_tpl->tpl_vars['JS_CONTROLLER']->value;?>
Newsletter/Newsletter.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['JS_CONTROLLER']->value;?>
Querosabermais/Querosabermais.js"></script>
  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="cursos">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	<?php echo $_smarty_tpl->getSubTemplate ("include/topo.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php echo $_smarty_tpl->getSubTemplate ("include/banner.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
  <div role="main" id="main">
  	<div class="titulo">
  		<p>CURSOS</p>
  	</div>
  	
  	<div id="slide_cursos">
	   <?php  $_smarty_tpl->tpl_vars['curso'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curso']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recordset_cursos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curso']->key => $_smarty_tpl->tpl_vars['curso']->value){
$_smarty_tpl->tpl_vars['curso']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['curso']->key;
?>
			<div id="curso<?php echo ($_smarty_tpl->tpl_vars['k']->value+1);?>
">
				<span id="BtnCurso<?php echo ($_smarty_tpl->tpl_vars['k']->value+1);?>
"><?php echo $_smarty_tpl->tpl_vars['curso']->value['nome'];?>
 - <?php echo $_smarty_tpl->tpl_vars['Helper']->value->ExecuteRegex('/\./',',',$_smarty_tpl->tpl_vars['curso']->value['total_horas']);?>
 Horas</span><br />				
				<ul class="curso<?php echo ($_smarty_tpl->tpl_vars['k']->value+1);?>
">
				<?php  $_smarty_tpl->tpl_vars['curso_modulo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curso_modulo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['curso']->value['CursosHasModulos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curso_modulo']->key => $_smarty_tpl->tpl_vars['curso_modulo']->value){
$_smarty_tpl->tpl_vars['curso_modulo']->_loop = true;
?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cursos/detalhes-modulo/id/<?php echo $_smarty_tpl->tpl_vars['curso_modulo']->value['Modulos']['id'];?>
" class="fancybox.ajax various"><?php echo $_smarty_tpl->tpl_vars['curso_modulo']->value['Modulos']['titulo'];?>
</a></li>					
				<?php } ?>	
				</ul>				
			</div>  		
		<?php } ?>
  	</div>
  	
  	<div id="formulario_cursos">
  		<form id="newsletter_form" action="javascript:enviarFormularioNewsletter('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
newsletter/cadastrar');">
	  		<legend>NEWSLETTER</legend>
	  		<div class="block"></div>
	  		<p class="texto">Quer receber informações sobre cursos e promoções diretamente no seu e-mail? Basta se cadastrar em nossa newsletter preenchendo o formulário abaixo. </p>
  			<input name="nome" id="nome" placeholder="Nome" /><br />
  			<div id="erro_nome" class="erro"></div>
			<input name="email" id="email" placeholder="E-mail" /><br />
			<div id="erro_email" class="erro"></div>
			<?php echo $_smarty_tpl->getSubTemplate ("include/erros.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<button id="btn_enviar_newsletter" type="submit" >Enviar.</button>
  		</form>
  		
  		<form id="QueroSaberMais_form" action="javascript:enviarFormularioQuerosabermais('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
quero-saber-mais/cadastrar');">
  			<legend>QUERO SABER MAIS</legend>
  			<div class="block"></div>
  			<select name="idcurso">
  				<option value="">Escolha um curso</option>
				<?php  $_smarty_tpl->tpl_vars['curso'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curso']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recordset_cursos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curso']->key => $_smarty_tpl->tpl_vars['curso']->value){
$_smarty_tpl->tpl_vars['curso']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['curso']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['curso']->value['nome'];?>
</option>
				<?php } ?>
  			</select>
  			<div id="erro_idcurso" class="erro"></div>
			<input name="nome" id="nome" placeholder="Nome" /><br />
			<div id="erro_nome_quero_saber_mais" class="erro"></div>
			<input name="telefone" id="telefone" placeholder="Telefone" /><br />
			<div id="erro_telefone" class="erro"></div>
			<input name="celular" id="celular" placeholder="Celular" /><br />
			<div id="erro_celular" class="erro"></div>
  			<select name="idunidade">
  				<option value="">Escolha a unidade</option>
				<?php  $_smarty_tpl->tpl_vars['unidade'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['unidade']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recordset_unidades']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['unidade']->key => $_smarty_tpl->tpl_vars['unidade']->value){
$_smarty_tpl->tpl_vars['unidade']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['unidade']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['unidade']->value['Cidades']['nome'];?>
</option>  				
				<?php } ?>
  			</select><br />
  			<div id="erro_idunidade" class="erro"></div>
  			<textarea name="observacoes" id="observacoes" placeholder="Digite aqui suas dúvidas ou observações para nossa equipe de atendimento."></textarea>
  			<div id="erro_observacoes" class="erro"></div>
			<?php echo $_smarty_tpl->getSubTemplate ("include/erros.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<button id="btn_enviar_querosabermais" type="submit" >Enviar.</button>
  		</form>
  	</div>

	<div class="clear"></div>
  </div><!-- fim da div main -->
  <?php echo $_smarty_tpl->getSubTemplate ("include/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  
</body>
</html><?php }} ?>