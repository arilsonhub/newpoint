<?php
	include "../php/conexao.php";
	include "../php/banco.php";
  $ver = 1;
	include "../php/restrito.php";
  
	$query = "select * from empresaconvenio order by id ASC";
	$result = pg_query($query) or die();
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
  	
  	<div id="tabela-convenios">
  		<table>
  			<thead>
  				<th>Nome</th>
  				<th>Cidade</th>
  				<th>Endereço</th>
  				<th>Telefone</th>
  				<th>Desconto</th>
  				<th>FOTO</th>
  				<th>VISÍVEL</th>
  				<th>Ação</th>
  			</thead>
  			<tbody>
  				<?php
  				
  					while($row = pg_fetch_assoc($result)){
  						$id			= $row['id'];
  						$numero		= $row['visivel'];
  						$resposta	= $banco->visivel($numero);
  						echo "<tr>\n";
						echo "<td>".$row['nome']."</td>";
						echo "<td>Cidade</td>";
						echo "<td>".$row['endereco']."</td>";
						echo "<td>".$row['telefone']."</td>";
						echo "<td>".$row['desconto']."</td>";
						echo "<td><a href='../../web_files/upload/convenios/imagem.png' class='fancyimagem'>Visualize a foto</a></td>";
						echo "<td>".$resposta."</td>";
						echo "<td class='acao'><a href='excluir.php?a=1&id=$id' title='deletar'><img src='../img/del.png' alt='editar' /></a></td>\n";
						echo "</tr>\n";
  					}
  				
  				?>
  			</tbody>
  		</table>
  		<div id="formulario_convenios" class="">
	  		<form action="recebe.php" method="post" enctype="multipart/form-data">
	  			<p class="subtitulo">Novo Convênio.</p>
	  			<fieldset>
	  				<label for="nome">Nome:</label><input type="text" name="nome" id="nome" /><br />
	  				<label for="cidade">Cidade:</label>
	  				<select name="cidade">
	  					<option value="1">Alvorada</option>
	  					<option value="2">Gravataí</option>
	  					<option value="3">Porto Alegre</option>
	  					<option value="4">Viamão</option>
	  				</select><br />
	  				<label for="endereco">Endereço:</label><input type="text" name="endereco" id="endereco" /><br />
	  				<label for="telefone">Telefone:</label><input type="text" name="telefone" id="telefone" /><br />
	  				<label for="desconto">Desconto:</label><input type="text" name="desconto" id="desconto" /><br />
	  				<label for="imagem">Imagem:</label><input type="file" name="imagem" id="imagem" /><br />
	  				<input type="checkbox" name="visivel" id="visivel" value="1" /><label for="visivel">Marque aqui se a imagem será mostrada no site.</label><br />
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