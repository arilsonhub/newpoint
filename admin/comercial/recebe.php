<?php
include("../php/banco.php");

	if(!empty($_REQUEST['a'])){
		include("../php/conexao.php");
		$a	= $_REQUEST['a'];
		switch($a){
			case 1:
				if(!empty($_GET['id'])){
					$id 	= $_GET['id'];
					$sql 	= "UPDATE aulademonstrativa SET status =0  WHERE id = $id";
					$result = pg_query($sql) or die(pg_result_error());
					header("Location:solicitacao.php");
				}else{
					header("Location:index.php");
				}
				break;
			case 2:
				break;
			default:
				break;
		}
	}else{
		header("Location:index.php");
	}

?>