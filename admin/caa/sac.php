<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 3;
  include "../php/restrito.php";

  $sql 		= "SELECT * FROM sac WHERE idunidade = $_SESSION[idunidade]";
  $result 	= pg_query($sql) or die();
  //$row 		= pg_fetch_assoc($result);
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
  <title>Newpoint Escolas Profissionalizantes - Página Inicial</title>
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
  	
  	<p class="titulo">SAC</p>

  	<table>
	  	<caption></caption>
			<thead>
				<tr class='cabecalho'>
					<th>NOME</th>
					<th>TELEFONE</th>
					<th>E-MAIL</th>
					<th>MENSAGEM</th>
					<th>Dia</th>
					<th>AÇÃO</th>
				</tr>
			</thead>
			<tbody>
				<?php

					while($row 		= pg_fetch_assoc($result)){
						$id 		= $row['id'];
						$nome 		= $row['nome'];
						$telefone 	= $row['telefone'];
						$email 		= $row['email'];
						$mensagem 	= $row['mensagem'];
						$dia 		= $row['dia'];
						$status 	= $row['status'];

						$dia		= $row['dia'];
						$dia 		= explode(" ",$dia);

						if($dia[0] == null){
							$dia[0] = "Sem data";
						}else{
							$diaP 		= $banco->diaCerto($dia[0]);
						}

						echo "<td>$nome</td>\n";
						echo "<td>$telefone</td>\n";
						echo "<td>$email</td>\n";
						echo "<td>$mensagem</td>\n";
						echo "<td>$diaP</td>\n";
						$banco->verificaStatus($status, $id);
						echo "</tr>\n";
					}

				?>
			</tbody>
	</table>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>