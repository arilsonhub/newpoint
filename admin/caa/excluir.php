<?php
	
	if(!empty($_REQUEST['a'])){
		include("../php/conexao.php");
		$a	= $_REQUEST['a'];
		switch($a){
			case 1:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$sql	= "DELETE FROM agenda WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
				}else{
					header("Location:index.php");
				}
				break;
			default:
				break;
		}
	}else{
		header("Location:admin.php");
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
		include "../php/menu_caa.php";
	?>
  <div role="main" id="main">

    <div id="abas">
      <table id="tabela_cabecalho">
        <thead>
          <th><a href="album.php">Álbum</a></th>
          <th><a href="agenda.php">Agenda</a></th>
        </thead>
      </table>
    </div>
  	
  	<p>Excluído com sucesso!</p>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>