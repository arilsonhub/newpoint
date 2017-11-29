<?php

	if(empty($_GET['id'])){
		header("Location:usuarios.php");
	}else{
		$id = $_GET['id'];
	}

	include "../php/conexao.php";
	include "../php/banco.php";
	$ver = 1;
	include "../php/restrito.php";
	
	$query_perfil = "select * from perfis order by nome";
	$result_perfil = pg_query($query_perfil) or die();
	
	$query_cidade = "select * from cidades order by nome";
	$result_cidade = pg_query($query_cidade) or die();
	
	$query = "SELECT U.ID as IDUSUARIO, U.NOME AS NOME_USUARIO, P.NOME AS NOME_PERFIL , CITY.NOME AS NOME_CIDADE , U.LOGIN, U.SENHA

     FROM USUARIO U 
               INNER JOIN 
          PERFIS P ON (U.IDPERFIL = P.ID)
               INNER JOIN 
          UNIDADES UNIT  ON (U.IDUNIDADE = UNIT.ID)
               INNER JOIN
          CIDADES CITY ON (UNIT.IDCIDADE = CITY.ID) 
          WHERE U.ID = $id";
	$result = pg_query($query) or die();
	$row	= pg_fetch_assoc($result);
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
  				<th><a href="usuarios.php">Vizualizar Usuários</a></th>
  				<th><a href="usuarios_cadastrar.php">Cadastrar Usuários</a></th>
  			</thead>
  		</table>
  	</div>  	
  	<div id="usuarios_cadastrar">
  		<div id="form_tamanho" class="">
	  		<form id="form_cms_admin" action="recebe.php" method="post">
	  			<fieldset>
		  			<label for="nome">NOME:</label> <input type="text" name="nome" id="nome" value="<?php echo $row['nome_usuario'] ?>" /><br />
		  			<label for="setor">SETOR: </label>
		  			<select name="setor" id="setor">
		  				<option value="">Escolha o setor</option>
		  				<?php
		  					while($row_perfil = pg_fetch_assoc($result_perfil)){
		  						$id_setor		= $row_perfil['id'];
		  						$nome_setor		= $row_perfil['nome'];
								if($nome_setor != $row['nome_perfil']){
									echo "<option value=$id_setor>$nome_setor</option>";
								}else{
									echo "<option selected='selected' value=$id_setor>$nome_setor</option>";
								}
		  					}
		  				?>
		  			</select><br />
		  			<label for="unidade">UNIDADE: </label>
		  			<select name="unidade" id="unidade">
		  				<option value="">Escolha a unidade</option>
		  				<?php
		  					while($row_cidade = pg_fetch_assoc($result_cidade)){
		  						$id_cidade			= $row_cidade['id'];
		  						$nome_cidade		= $row_cidade['nome'];
								if($nome_cidade != $row['nome_cidade']){
									echo "<option value=$id_cidade>$nome_cidade</option>";
								}else{
									echo "<option selected='selected' value=$id_cidade>$nome_cidade</option>";
								}
		  					}
		  				?>
		  			</select><br />
		  			<label for="login">LOGIN:</label> <input type="text" name="login" id="login" value="<?php echo $row['login'] ?>" /><br />
		  			<label for="senha">SENHA:</label> <input type="password" name="senha" id="senha" value="<?php echo $row['senha'] ?>" /><br />
		  			<input type="hidden" name="a" value="11" />
		  			<input type="hidden" name="id"  value="<?php echo $row['idusuario']; ?>" />
		  			<div id="lugar_botao">
		  				<button type="submit">ENVIAR.</button>
		  			</div>
	  			</fieldset>
	  		</form>
  		</div>
  	</div><!-- fim usuarios_cadastrar -->
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>