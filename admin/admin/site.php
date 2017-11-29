<?php

	include "../php/conexao.php";
  $ver = 1;
  include "../php/restrito.php";
	
	$query = "select * from instituicao";
	$result = pg_query($query) or die();
	$row = pg_fetch_assoc($result);
	
	// Include the CKEditor class.
	include_once "../../web_files/js/ckeditor/ckeditor.php";
	
	// Create a class instance.
	$CKEditor = new CKEditor();
	
	$config['toolbar'] = array(
		array( 'Bold', 'Italic', 'Underline', 'Strike' ),
		array( 'Link', 'Unlink', )
	);
	
	// Path to the CKEditor directory.
	$CKEditor->basePath = '../../web_files/js/ckeditor/';
	
	// Set global configuration (used by every instance of CKEditor).
	$CKEditor->config['width'] = 500;
	
	// Change default textarea attributes.
	$CKEditor->textareaAttributes = array("cols" => 300, "rows" => 50);
	
	// The initial value to be displayed in the editor.
	$missao 	= $row['missao'];
	$visao		= $row['visao'];
	$valores	= $row['texto_principal'];
	$fazbem		= $row['faz_bem'];
	$convenios	= $row['texto_empresas_conveniadas'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Administrador</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">
	<?php
		include "../php/css.php";
	?>
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  
  <div id="admin_topo">
  	CMS DO SITE
  </div>
	<?php
		include "../php/menu_admin.php";
	?>
  <div role="main" id="main">
  	
  	<p class="titulo">Usuários</p>
  	
  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
          <th><a href="alunos.php">Alunos</a></th>
  				<th><a href="agenda.php">Agenda</a></th>
          <th><a href="site.php">Textos do site</a></th>
  				<th><a href="noticias.php">Notícias</a></th>
          <th><a href="banner.php">Banner</a></th>
  				<th><a href="convenios.php">Convênios</a></th>
          <th><a href="propaganda.php">Propaganda</a></th>
  			</thead>
  		</table>
  	</div>
  	<div id="textos_site">
  		<div id="textos_missao">
  			<p class="titulo">Missão</p>
  			<form action="recebe.php" method="post">
  				<fieldset>
  					<label for="missao">Missão:</label><br />
  					<?php $CKEditor->editor("missao", $missao, $config); ?><br />
  					<input type="hidden" value="1" name="a">
  					<button type="submit">Enviar.</button>
  				</fieldset>
  			</form>
  		</div>
  		<div id="textos_visao">
  			<p class="titulo">Visão</p>
  			<form action="recebe.php" method="post">
  				<fieldset>
  					<label for="visao">Visão:</label><br />
  					<?php $CKEditor->editor("visao", $visao, $config); ?><br />
  					<input type="hidden" value="2" name="a">
  					<button type="submit">Enviar.</button>
  				</fieldset>
  			</form>  			
  		</div>
  		<div id="textos_valores">
  			<p class="titulo">Valores</p>
  			<form action="recebe.php" method="post">
  				<fieldset>
  					<label for="valores">Valores:</label><br />
  					<?php $CKEditor->editor("valores", $valores, $config); ?><br />
  					<input type="hidden" value="3" name="a">
  					<button type="submit">Enviar.</button>
  				</fieldset>
  			</form>  			
  		</div>
  		<div id="textos_fazbem">
  			<p class="titulo">Faz Bem</p>
  			<form action="recebe.php" method="post">
  				<fieldset>
  					<label for="fazbem">Faz Bem:</label><br />
  					<?php $CKEditor->editor("fazbem", $fazbem, $config); ?><br />
  					<input type="hidden" value="4" name="a">
  					<button type="submit">Enviar.</button>
  				</fieldset>
  			</form>  			
  		</div>
  		<div id="textos_convenios">
  			<p class="titulo">Empresas Convêniadas</p>
  			<form action="recebe.php" method="post">
  				<fieldset>
  					<label for="fazbem">Empresas Convêniadas:</label><br />
  					<?php $CKEditor->editor("texto_convenios", $convenios, $config); ?><br />
  					<input type="hidden" value="5" name="a">
  					<button type="submit">Enviar.</button>
  				</fieldset>
  			</form>  			
  		</div>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>