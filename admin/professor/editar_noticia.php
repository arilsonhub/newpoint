<?php

	if(!empty($_GET['id'])){
		
		$id = $_GET['id'];
		include "../php/conexao.php";
		include "../php/banco.php";
		$ver = 2;
		include "../php/restrito.php";
		
		$query = "select * from noticia where id = $id";
		$result = pg_query($query) or die();
		$row = pg_fetch_assoc($result);
	
		// Include the CKEditor class.
		include_once "../../web_files/js/ckeditor/ckeditor.php";
		
		// Create a class instance.
		$CKEditor = new CKEditor();
		
		$config['toolbar'] = array(
			array( 'Bold', 'Italic', 'Underline', 'Strike' ),
			array( 'Link', 'Unlink', )
		);
		
		// Path to the CKEditor directory.
		$CKEditor->basePath = '../../web_files/js/ckeditor/';
		
		// Set global configuration (used by every instance of CKEditor).
		$CKEditor->config['width'] = 345;
		
		// Change default textarea attributes.
		$CKEditor->textareaAttributes = array("cols" => 300, "rows" => 50);
		
		// The initial value to be displayed in the editor.
		$texto = $row['texto'];
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
		include "../php/menu_professor.php";
	?>
  <div role="main" id="main">
  	
  	<p class="titulo">Editar Notícias</p>
  	
  	<div id="form_cms_prof">
  		<form action="recebe.php" method="post" enctype="multipart/form-data" >
  			<label for="titulo">TÍTULO:</label><input type="text" name="titulo" id="titulo" value="<?php echo $row['titulo']; ?>"/><br />
  			<label for="manchete">MANCHETE:</label><input type="text" name="manchete" id="manchete" value="<?php echo $row['manchete']; ?>"/><br />
			<span><a href="../../web_files/upload/noticias/<?php echo $row['imagem']; ?>" class="fancyimagem">Visualize a foto</a> ou adicione outra para mudar a foto da notícia.</span><br />
  			<label for="imagem">IMAGEM:</label><input type="file" name="imagem" id="imagem" /><br />
  			<label for="texto" id="label_texto">TEXTO:</label>
  			<div id="ckeditor" class="">
  				<?php $CKEditor->editor("texto", $texto, $config); ?>
  			</div>
  			<input type="hidden" value="8" name="a">
  			<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
  			<button type="submit" class="margem-cima">Enviar.</button>
  		</form>
  	</div>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>
<?php
	}else{
		header("Location:admin.php");
	}
?>