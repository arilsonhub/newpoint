<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 8;
  include "../php/restrito.php";
?>

<?php
//Valida o id 
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    exit();	
}
//Valida o Album
$query = "SELECT titulo FROM album where id = ".$_GET['id']." ";
$resultAlbum = pg_query($query);
if(pg_num_rows($resultAlbum) == 0){
	exit();
}
//Pega os dados do Album
$recordsetAlbum = pg_fetch_assoc($resultAlbum);

//Busca as fotos
$query = "SELECT * FROM galeriafotos where idalbum = ".$_GET['id']." ";
$result = pg_query($query);
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
		include "../php/menu_professor_cadastrar.php";
	?>
  <div role="main" id="main">
  	<div class="titulo">
  		FOTOS DO ÁLBUM
  	</div>
  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
  				<th><a href="album.php">Cadastrar Álbum</a></th>
  				<th><a href="editar-album.php">Editar Álbum</a></th>
  			</thead>
  		</table>
  	</div>
  	
  	<?php if(pg_num_rows($result) > 0){ ?>
  	
  	<div class="mensagem"><?php if(isset($_GET['msg'])) echo urldecode($_GET['msg']); ?></div>
  	<form action="recebe.php" method="post">
  	<input type="hidden" name="a" value="6" />
    <input type="hidden" name="idalbum" value="<?php echo $_GET['id']; ?>" />
  	<div id="usuarios_visualizar">
  		<table id="excluir-fotos">
  			<caption><?php echo $recordsetAlbum['titulo']; ?></caption>
  			<thead>
  				<th>Arquivo</th>
  				<th>Foto</th>
  				<th>Ação</th>
  			</thead>
  			<tbody>			
  				<?php while($dadosFoto = pg_fetch_assoc($result)){ ?>
					<tr>
		  				<td><?php echo $dadosFoto['title']; ?></td>
		  				<td><a href="<?php echo "../../web_files/upload/galeria_fotos/".$dadosFoto['imagem']; ?>" class="fancyimagem">Visualizar foto</a></td>
		  				<td><input type="checkbox" name="fotosIds[]" value="<?php echo $dadosFoto['id']; ?>" /></td>
					</tr>					
				<?php } ?>
  			</tbody>
  		</table>
  		<button type="submit" name="excluir">Excluír</button><a href="editar-album.php"><button type="button" name="">Voltar</button></a>  		
  	</div><!-- fim usuarios_vizualizar -->
  	</form>
  	
  	<?php } else{ ?>  	
  		<div class="mensagem">Não há fotos cadastradas para este álbum</div>  	
  	<?php } ?>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>  
</body>
</html>