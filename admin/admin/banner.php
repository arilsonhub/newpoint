<?php
	include "../php/conexao.php";
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
  	
  	<div id="formulario_banner">
  		<table>
  			<thead>
  				<th>Nome</th>
  				<th>Arquivo</th>
  				<th>Ação</th>
  			</thead>
  			<tbody>
        
        <?php
          $consulta     = "select * from banners";
          $resultado    = pg_query($consulta) or die("Falha ao fazer pesquisa.");
          while($linha  = pg_fetch_assoc($resultado)){
            $id         = $linha['id'];
            $titulo     = $linha['titulo'];
            $imagem     = $linha['imagem'];
            echo "<tr>\n";
            echo "<td>$titulo</td>\n";
            echo "<td><a href='../../web_files/upload/banner/$imagem' class='fancyimagem'>Visualizar foto</a></td>\n";
            echo "<td><a href='excluir.php?a=8&id=$id&img=$imagem' title='excluír imagem'><img src='../img/del.png' /></a></td>";
            echo "</tr>\n";
          }
        ?>

  			</tbody>
  		</table>
  		<div id="formulario_foto" class="">
	  		<form enctype="multipart/form-data" action="recebe.php" method="post">
	  			<p class="subtitulo">Adicione outra imagem.</p>
          <?php
            if(isset($_GET['msg'])){
              echo "<p class='vermelho'>";
              echo urldecode($_GET['msg']);
              echo "</p>";
            }
          ?>
	  			<fieldset>
	  				<label for="titulo">Nome:</label><input type="text" name="titulo" id="titulo" /><br />
	  				<label for="imagem">Selecione a foto</label><input type="file" name="imagem" id="imagem" /><br />
            <input type="hidden" value="17" name="a">
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