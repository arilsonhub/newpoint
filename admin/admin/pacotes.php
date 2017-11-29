<?php
	include "../php/conexao.php";
	include "../php/banco.php";
	$ver = 1;
	include "../php/restrito.php";
	
	$query_cursos			= "select * from cursos order by id ASC";
	$result_cursos			= pg_query($query_cursos) or die();
	
	$query_modulos			= "select * from modulos order by id ASC";
	$result_modulos			= pg_query($query_modulos) or die();
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
  	<div id="div_pacotes" class="">
  		<form action="recebe.php" method="post">
  			<fieldset>
		  		<div id="pacotes_esquerda" class="">
		  			<p>Selecione o curso</p>
		  			<div id="selecione_cursos">
		  				<ul>
		  					<?php
		  						$i = 0;
		  						while($row_cursos = pg_fetch_assoc($result_cursos)){
		  							$id			= $row_cursos['id'];
		  							$nome		= $row_cursos['nome'];
		  							echo "<li><input type='radio' name='curso' id='curso$i' value=$id><label for='curso$i'>$nome</li>";
		  							$i++;
		  						}
		  					?>
		  				</ul>
		  			</div>
		  		</div>
		  		<div id="pacotes_direita" class="">
		  			<p>Selecione os Módulo</p>
		  			<div id="selecione_modulo">
		  				<ul>
		  					<?php
		  						$i=0;
		  						while($row_modulos = pg_fetch_assoc($result_modulos)){
		  							$id			= $row_modulos['id'];
		  							$titulo		= $row_modulos['titulo'];
		  							echo "<li><input type='checkbox' name='modulo[]' id='modulo$i' value=$id><label for='modulo$i'>$titulo</li>";
		  							$i++;
		  						}
		  					?>
		  				</ul>
		  			</div>
		  		</div>
		  		<div id="pacotes_botao">
		  			<input type="hidden" name="a" value="16"/>
		  			<button type="submit">Enviar novo curso.</button>
		  		</div>
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