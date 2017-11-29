<?php
	include "../php/conexao.php";
	include "../php/banco.php";
	$ver = 1;
	include "../php/restrito.php";
	
	if(empty($_REQUEST['id'])){
		header("Location:cursos.php");
	}
	
	$id				= $_REQUEST['id'];
	
	$query			= "select * from modulos where id = $id";
	$result			= pg_query($query) or die();
	$row			= pg_fetch_assoc($result);
	//$banco->testarArray($row);

	include_once "../../web_files/js/ckeditor/ckeditor.php";
	$CKEditor = new CKEditor();
	$config['toolbar'] = array(
		array( 'Bold', 'Italic', 'Underline', 'Strike' ),
		array( 'Link', 'Unlink','BulletedList' )
	);
	$CKEditor->basePath = '../../web_files/js/ckeditor/';
	$CKEditor->config['width'] = 345;
	$CKEditor->textareaAttributes = array("cols" => 300, "rows" => 50);
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
  				<th><a href="cursos.php">Novo Curso</a></th>
  				<th><a href="novo_modulo.php">Novo Módulo</a></th>
  				<th><a href="editar_cursos.php">Editar Curso</a></th>
  				<th><a href="editar_modulo.php">Editar Módulo</a></th>
  				<th><a href="pacotes.php">Pacotes</a></th>
  				<th><a href="excluir_pacotes.php">Excluír Pacotes</a></th>
  			</thead>
  		</table>
  	</div>
  	<div id="div_cursos">
  		<form action="recebe.php" method="post">
  			<fieldset>
  				<label for="titulo">Título:</label><input type="text" name="titulo" id="titulo" value="<?php echo $row['titulo']; ?>" /><br />
  				<label for="horario">Carga Horária:</label><input type="text" name="horario" id="horario" class="horario" value="<?php echo $row['cargahoraria']; ?>"/><br />
	  			<label for="descricao" id="label_texto">TEXTO:</label>
	  			<div id="ckeditor" class="">
	  				<?php $CKEditor->editor("descricao", $row['descricao'], $config); ?>
	  			</div>
  				<input type="hidden" name="a" value="15" /><input type="hidden" name="id" value="<?php echo $id; ?>" /><button>Enviar.</button>
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