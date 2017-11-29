<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 7;
  include "../php/restrito.php";

  $sql = "select nc.id,nc.nome,nc.email,nc.telefone,nc.status,(select nn.nota from nivelamentonotas nn where nn.idcandidato = nc.id order by nn.id ASC limit 1) as primeira_nota_candidato, (select nn.dia from nivelamentonotas nn where nn.idcandidato = nc.id order by nn.id ASC limit 1) as dia from nivelamentocandidatos nc";
  $result	= pg_query($sql) or die(pg_result_error());

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
		include "../php/menu_comercial.php";
	?>
  <div role="main" id="main">
  	
  	<table>
	  	<caption>Lista de leis</caption>
			<thead>
				<tr class='cabecalho'>
					<th>NOME</th>
					<th>E-MAIL</th>
					<th>NOTA</th>
					<th>TELEFONE</th>
					<th>DATA</th>
					<th>AÇÃO</th>
				</tr>
			</thead>

			<tbody>
				<?php

					while($row		= pg_fetch_assoc($result)){
						//$banco->testarArray($row);
						$id 		= $row['id'];
						$nome 		= $row['nome'];
						$email 		= $row['email'];
						$telefone 	= $row['telefone'];
						$nota 		= $row['primeira_nota_candidato'];
						$status 	= $row['status'];
						$dia		= $row['dia'];
						$dia 		= explode(" ",$dia);

						if($dia[0] == null){
							$dia[0] = "Sem data";
						}else{
							$diaP 		= $banco->diaCerto($dia[0]);
						}

						if($nota == null || $nota == 0){
							$nota = "0";
						}

						if($status  == 0){
							$status = "<td><a href='' title='nenhuma ação'><img src='../img/inativo.png' alt='nenhuma ação'/></a></td>";
						}else{
							$status = "<td><a href='recebe.php?a=2id=$id' title='marcar como visualizado'><img src='../img/ok.png' alt='marcar como visualizado'/></a></td>";
						}

						echo "<tr>\n";
						echo "<td>$nome</td>\n";
						echo "<td>$email</td>\n";
						echo "<td>$nota/16</td>\n";
						echo "<td>$telefone</td>\n";
						echo "<td>$diaP</td>\n";
						echo $status;
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