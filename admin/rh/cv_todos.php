<?php
	include "../php/conexao.php";
	include "../php/banco.php";
	$ver = 4;
	include "../php/restrito.php";
	
	$query = "SELECT *, to_char(data_envio, 'dd/mm/YYYY') AS data FROM trabalheconosco ORDER BY id ASC";
	$result = pg_query($query) or die();

	//$row		= pg_fetch_assoc($result);
	//$banco->testarArray($row);
	
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
  <title>RH</title>
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
		include "../php/menu_rh.php";
	?>
  <div role="main" id="main">

  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
  				<th><a href="cv_todos.php">Todos</a></th>
  				<th><a href="cv_cargo.php">Por Cargo</a></th>
  				<th><a href="cv_unidade.php">Por Unidade</a></th>
  			</thead>
  		</table>
  	</div>
  	<div id="">
	  	<table>
		  	<caption>Lista de leis</caption>
				<thead>
					<tr class='cabecalho'>
						<th>Número</th>
						<th>NOME</th>
						<th>CURRÍCULO</th>
						<th>CIDADE</th>
						<th>CARGO</th>
						<th>ENVIADO</th>
						<th>AÇÃO</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i = 1;
						while($row		= pg_fetch_assoc($result)){
							$id			= $row['id'];
							$nome		= $row['nome'];
							$telefone	= $row['telefone'];
							$curriculo	= $row['curriculo'];
							$unidade 	= $banco->cidade($row['idunidade']);
							$cargo 		= $banco->cargo($row['idcargo']);
							$data 		= $row['data'];

							echo "<tr>\n";
							echo "<td>$i</td>\n";
							echo "<td>$nome</td>\n";
							echo "<td><a href='../../web_files/upload/curriculos/$curriculo'>Visualizar Currículo</a></td>\n";
							echo "<td>$unidade</td>\n";
							echo "<td>$cargo</td>\n";
							echo "<td>$data</td>\n";
							echo "<td class='acao'><a href='excluir.php?a=1&id=$id&cv=$curriculo' title='deletar'><img src='../img/del.png' alt='editar' /></a></td>\n";
							echo "</tr>\n";
							$i++;
						}
					?>
				</tbody>
		</table>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>