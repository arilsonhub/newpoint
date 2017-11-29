<?php
	include "../php/conexao.php";
	include "../php/banco.php";
  $ver = 3;
  include "../php/restrito.php";
	
	$query			= "select * from agenda order by id ASC LIMIT 20";
	$result			= pg_query($query) or die();
	
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
		include "../php/menu_caa.php";
	?>
  <div role="main" id="main">
  	
  	<p class="titulo">Agenda</p>
  	
    <div id="abas">
      <table id="tabela_cabecalho">
        <thead>
          <th><a href="agenda.php">Agenda</a></th>
        </thead>
      </table>
    </div>
  	
  	<div id="tabela-convenios">
  		<table>
  			<thead>
  				<th>Categoria</th>
  				<th>Oque</th>
  				<th>Quando</th>
  				<th>Onde</th>
  				<th>Ação</th>
  			</thead>
  			<tbody>
  				<?php
  				
  					while($row = pg_fetch_assoc($result)){
  						$id			= $row['id'];
  						$categoria	= $row['idcategoria'];
  						echo "<tr>\n";
  						echo "<td>".$categoria."</td>";
  						echo "<td>".$row['oque']."</td>";
  						echo "<td>".$row['quando']."</td>";
  						echo "<td>".$row['onde']."</td>";
  						echo "<td class='acao'><a href='editar_agenda.php?id=$id' title='editar'><img src='../img/edi.png' alt='editar' /></a> | <a href='excluir.php?a=1&id=$id' title='deletar'><img src='../img/del.png' alt='editar' /></a></td>\n";
  						echo "</tr>\n";
  					}
  				
  				?>
  			</tbody>
  		</table>
  		<div id="formulario_convenios" class="">
	  		<form action="recebe.php" method="post">
	  			<p class="subtitulo">Agenda</p>
	  			<fieldset>
	  				<label for="categoria">Categoria:</label>
	  				<select name="categoria">
	  					<?php
	  						while($row = pg_fetch_assoc($result_agenda)){
	  							$id		= $row['id'];
								$nome	= $row['nome'];
								echo "<option value=$id>$nome</option>\n";
	  						}
	  					?>
	  				</select><br />
	  				<label for="oque">Oque:</label><input type="text" name="oque" id="oque" /><br />
	  				<label for="quando">Quando:</label><input type="text" class="data" name="quando" id="quando" /><br />
		  			<div id="descricao-data">Dia/Mês/Ano</div>
	  				<label for="onde">Onde:</label><input type="text" name="onde" id="onde" /><br />
	  				<input type="hidden" value="7" name="a">
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