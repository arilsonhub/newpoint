<?php
	include "../php/conexao.php";
	include "../php/banco.php";
  $ver = 1;
  include "../php/restrito.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  				<th><a href="cursos.php">Novo Curso</a></th>
  				<th><a href="novo_modulo.php">Novo Módulo</a></th>
  				<th><a href="editar_cursos.php">Editar Curso</a></th>
  				<th><a href="editar_modulo.php">Editar Módulo</a></th>
  				<th><a href="pacotes.php">Pacotes</a></th>
  				<th><a href="excluir_pacotes.php">Excluír Pacotes</a></th>
  			</thead>
  		</table>
  	</div>
  	<div id="div_cursos">
  		<form action="recebe.php" method="post">
  			<fieldset>
  				<label for="nome">Nome:</label><input type="text" name="nome" id="nome" /><br />
  				<input type="hidden" name="a" value="13" /><button>Enviar.</button>
  			</fieldset>
  		</form>
  	</div>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>