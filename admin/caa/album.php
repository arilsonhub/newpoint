<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 3;
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
  	<div class="titulo">
  		CADASTRAR NOVO ÁLBUM
  	</div>
  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
  				<th><a href="album.php">Cadastrar Álbum</a></th>
  				<th><a href="editar-album.php">Editar Álbum</a></th>
  			</thead>
  		</table>
  	</div>
    <div class="mensagem">
      <?php 
        if(!empty($_GET['erro']) and $_GET['erro'] == 1){
          echo "ATENÇÃO! Todos os campos são obrigatórios";
        }else{}
      ?>
    </div>
  	<div id="form_cms_prof_album">
  		<form action="recebe.php" method="post">
  			<fieldset>
  				<legend></legend>
  				<label for="titulo">TITULO:</label> <input type="text" name="titulo" id="titulo" /><br />
	  			<label for="unidade">UNIDADE: </label>
	  			<select name="unidade" id="unidade">
	  				<option value="">Escolha a unidade</option>
	  				<option value="1">Alvorada</option>
	  				<option value="2">Viamão</option>
	  				<option value="3">Gravataí</option>
	  				<option value="4">Porto Alegre</option>
	  			</select><br />
	  			<label for="data-evento">DATA DO EVENTO:</label><input type="text" name="data-evento" id="data-evento" class="data" /><br />
	  			<div id="descricao-data">Dia/Mês/Ano</div>
	  			<label for="descricao">DECRIÇÃO:</label><textarea name="descricao" id="descricao"></textarea><br />
          <input type="hidden" value="2" name="a">
	  			<button type="submit">Criar Álbum</button>
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