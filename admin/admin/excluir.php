<?php
	
	if(!empty($_REQUEST['a'])){
		include("../php/conexao.php");
		$a	= $_REQUEST['a'];
		switch($a){
			case 1:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM empresaconvenio WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 2:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM noticia WHERE id ='".$id."'";
					if(isset($_REQUEST['img'])){
						$img = $_REQUEST['img'];
						if(file_exists($img)){
							unlink($img);
						}
					}
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 3:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM usuario WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 4:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM agenda WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 5:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM cursos WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 6:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM modulos WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 7:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM cursos_has_modulos WHERE idcurso ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			case 8:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$img = $_REQUEST['img'];
					$sql	= "DELETE FROM banners WHERE id ='".$id."'";
					if(file_exists($img)){
						unlink("../../web_files/upload/banner/".$img);
					}
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			default:
			case 9:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM alunos WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			default:
				break;
		}
	}else{
		header("Location:index.php");
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
  	
  	<p>Excluído com sucesso!</p>
  	
  	<div id="form">
  		
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>