<?php
	include "../php/conexao.php";
	include "../php/banco.php";
  $ver = 1;
  include "../php/restrito.php";
	
	$query = "SELECT U.ID as IDUSUARIO, U.NOME AS NOME_USUARIO, P.NOME AS NOME_PERFIL , CITY.NOME AS NOME_CIDADE , U.LOGIN, U.SENHA

     FROM USUARIO U 
               INNER JOIN 
          PERFIS P ON (U.IDPERFIL = P.ID)
               INNER JOIN 
          UNIDADES UNIT  ON (U.IDUNIDADE = UNIT.ID)
               INNER JOIN
          CIDADES CITY ON (UNIT.IDCIDADE = CITY.ID) ";
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
  				<th><a href="usuarios.php">Vizualizar Usuários</a></th>
  				<th><a href="usuarios_cadastrar.php">Cadastrar Usuários</a></th>
  			</thead>
  		</table>
  	</div>
  	
  	<div id="usuarios_visualizar">
  		<table id="visualizar_usuarios">
  			<thead>
  				<th>Nome</th>
  				<th>Setor</th>
  				<th>Unidade</th>
  				<th>Login</th>
  				<th>Ação</th>
  			</thead>
  			<tbody>
  				<?php
  					while($row	= pg_fetch_assoc($result)){
  						$id		= $row['idusuario'];
  						echo "<tr>\n";
						echo "<td>".$row['nome_usuario']."</td>";
						echo "<td>".$row['nome_perfil']."</td>";
						echo "<td>".$row['nome_cidade']."</td>";
						echo "<td>".$row['login']."</td>";
						echo "<td class='acao'><a href='editar_usuario.php?id=$id' title='editar'><img src='../img/edi.png' alt='editar' /></a> | <a href='excluir.php?a=3&id=$id' title='deletar'><img src='../img/del.png' alt='editar' /></a></td>\n";
						echo "</tr>\n";
  					}
  				?>
  			</tbody>
  		</table>
  	</div><!-- fim usuarios_vizualizar -->
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>