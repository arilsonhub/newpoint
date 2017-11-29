<?php
	include "../php/conexao.php";
	include "../php/banco.php";
	$ver = 8;
	include "../php/restrito.php";
	
	$query = "select * from noticia order by id DESC";
	$result = pg_query($query) or die();

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
	$initialValue = '';
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
  <title>Professor</title>
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
		include "../php/menu_professor_ingles.php";
	?>
  <div role="main" id="main">
  	
  	<p class="titulo">Notícias</p>
  	
  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
  				<th><a href="site.php">Textos do site</a></th>
  				<th><a href="agenda.php">Agenda</a></th>
  				<th><a href="noticias.php">Notícias</a></th>
  				<th><a href="convenios.php">Convênios</a></th>
  			</thead>
  		</table>
  	</div>
  	<div id="visualizar_noticia_admin">
	  	<table>
		  	<caption></caption>
				<thead>
				<tr class='cabecalho'>
					<th>TITULO</th>
					<th>MANCHETE</th>
					<th>NOTÍCIA</th>
					<th>IMAGEM</th>
					<th>AUTOR</th>
					<th>AÇÃO</th>
				</tr>
				</thead>
				<tbody>
					<?php
						while($row = pg_fetch_assoc($result)){
							$id		= $row['id'];
							$texto	= $row['texto'];
							$img	= $row['imagem'];
							echo "<tr>\n";
							echo "<td><a href='http://www.escolasnewpoint.com.br/noticias/visualizar/id/".$id."' target='_blank' title='Link da notícia no site'>".$row['titulo']."</a></td>\n";
							echo "<td><a href='http://www.escolasnewpoint.com.br/noticias/visualizar/id/".$id."' target='_blank' title='Link da notícia no site'>".$row['manchete']."</a></td>\n";
							echo "<td><a href='http://www.escolasnewpoint.com.br/noticias/visualizar/id/".$id."' target='_blank' title='Link da notícia no site'>Veja Online</a></td>\n";
							echo "<td><a href='../../web_files/upload/noticias/$img' class='fancyimagem'>Visualizar foto</a></td>\n";
							echo "<td>Só do mesmo usuário</td>\n";
							echo "<td class='acao'><a href='editar_noticia.php?id=$id' title='editar'><img src='../img/edi.png' alt='editar' /></a> | <a href='excluir.php?a=2&id=$id&img=../../web_files/upload/noticias/$img' title='deletar'><img src='../img/del.png' alt='editar' /></a></td>\n";
							echo "</tr>\n";
						}
					?>
				</tbody>
		</table>
	</div>
  	<div id="form_cms_prof">
  		<form action="recebe.php" method="post" enctype="multipart/form-data" >
  			<label for="titulo">TÍTULO:</label><input type="text" name="titulo" id="titulo" /><br />
  			<label for="manchete">MANCHETE:</label><input type="text" name="manchete" id="manchete" /><br />
  			<label for="imagem">IMAGEM:</label><input type="file" name="imagem" id="imagem" /><br />
  			<label for="texto" id="label_texto">TEXTO:</label>
  			<div id="ckeditor" class="">
  				<?php $CKEditor->editor("texto", $initialValue, $config); ?>
  			</div>
  			<input type="hidden" value="1" name="a">
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