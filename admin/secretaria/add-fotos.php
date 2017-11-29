<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 6;
  include "../php/restrito.php";
?>
<?php
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	exit();
}

//Busca dados do album
$query = "SELECT titulo from album where id = ".$_GET['id']."";
$resultAlbum = pg_query($query);
$recordsetAlbum = pg_fetch_assoc($resultAlbum);
//Verifica se o album existe
if(pg_num_rows($resultAlbum) == 0){
	exit();
}

//Conta quantas fotos tem nesse album
$query = "SELECT count(*) as total_fotos from galeriafotos where idalbum = ".$_GET['id']."";
$resultCount = pg_query($query);
$recordsetCount = pg_fetch_assoc($resultCount);

//Máximo de fotos
$maximoDeFotos = MAXIMO_FOTOS;
//Verifica se esse album tem o máximo de fotos suportado
if($maximoDeFotos != null && $recordsetCount['total_fotos'] > $maximoDeFotos){
	header("location: editar-album.php?msg=".urlencode(utf8_encode('Este álbum já possui o número máximo de fotos permitido'))."");
	exit();
}

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
		include "../php/menu_secretaria.php";
	?>
  <div role="main" id="main">
  	<div class="titulo">
  		CADASTRAR NOVA FOTO PARA ÁLBUM: <?php echo strtoupper($recordsetAlbum['titulo']); ?>.
  	</div>
  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
  				<th><a href="album.php">Cadastrar Álbum</a></th>
  				<th><a href="editar-album.php">Editar Álbum</a></th>
  			</thead>
  		</table>
  	</div>
  	
  	<div id="form_cms_prof_fotos">
  		<form id="" action="recebe.php" method="post" enctype="multipart/form-data">
  			<fieldset>
			  	<div class="mensagem">
			  		<?php if(isset($_GET['msg'])) echo urldecode($_GET['msg']); ?>
			  	</div>
  				<div id="add-foto">
            <label for="foto">Título:</label><input type="text" name="titulo" class="titulo" /><br />
  					<label for="foto">Foto:</label><input type="file" name="imagem" /><br />
  				</div>
  				<button type="submit">Enviar fotos.</button><a href="editar-album.php"><button type="button" name="">Voltar</button></a>
  			</fieldset>
  			<input type="hidden" name="idalbum" value="<?php echo $_GET['id']; ?>" />
  			<input type="hidden" name="a" value="4" />
  		</form>
  	</div>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>