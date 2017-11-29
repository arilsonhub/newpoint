<?php
	
	if(!empty($_REQUEST['a'])){
		
		include("../php/conexao.php");
		$a	= $_REQUEST['a'];
		switch($a){
			case 1:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					$img = $_REQUEST['img'];
					$sql	= "DELETE FROM noticia WHERE id ='".$id."'";
					if(file_exists($img)){
						unlink($img);
					}
					$resultado	= pg_query($sql);
					header("Location:index.php");
				}else{
					header("Location:index.php");
				}
				break;
			case 2:
				if(!empty($_REQUEST['id'])){
					$id = $_REQUEST['id'];
					if(isset($_REQUEST['img'])){
						$img = $_REQUEST['img'];
						if(file_exists($img)){
							unlink($img);
						}
					}
					$sql	= "DELETE FROM empresaconvenio WHERE id ='".$id."'";
					$resultado	= pg_query($sql);
					header("Location:index.php");
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