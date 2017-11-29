<?php

	if(empty($_GET['id'])){
		header("Location:agenda.php");
	}
	
	$id				= $_GET['id'];
	
	include "../php/conexao.php";
	include "../php/banco.php";
	$ver = 6;
	include "../php/restrito.php";
	
	$query			= "select * from agenda where id = $id";
	$result			= pg_query($query) or die();
	$row			= pg_fetch_assoc($result);
	
	$query_agenda	= "SELECT * FROM categoriaagendamento";
	$result_agenda	= pg_query($query_agenda)or die();
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
  	
  	<p class="titulo">Editar Agenda</p>
  	
  	<div id="tabela-convenios">
  		<div id="formulario_convenios" class="">
	  		<form action="recebe.php" method="post">
	  			<fieldset>
	  				<label for="categoria">Categoria:</label>
	  				<select name="categoria">
	  					<?php
	  						while($row_agenda	= pg_fetch_assoc($result_agenda)){
	  							$id				= $row_agenda['id'];
								$nome			= $row_agenda['nome'];
								if($id			!= $row['id']){
									echo "<option value=$id>$nome</option>\n";
								}else{
									echo "<option selected='selected' value=$id>$nome</option>\n";
								}
	  						}
	  					?>
	  				</select><br />
	  				<label for="oque">Oque:</label><input type="text" name="oque" id="oque" value="<?php echo $row['oque']; ?>" /><br />
	  				<label for="quando">Quando:</label><input type="text" class="data" name="quando" id="quando" value="<?php echo $row['quando']; ?>" /><br />
		  			<div id="descricao-data">Dia/Mês/Ano</div>
	  				<label for="onde">Onde:</label><input type="text" name="onde" id="onde" value="<?php echo $row['onde']; ?>"/><br />
	  				<input type="hidden" value="8" name="a">
	  				<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
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