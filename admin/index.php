<?php
	include "php/conexao.php";
	include "php/banco.php";

	if(empty($_POST['login']) or empty($_POST['senha'])){
		header("Location:../");
	}else{

		$login 		= $banco->anti_sql($_POST['login']);
		$senha		= $banco->anti_sql($_POST['senha']);
		
		$consulta	= "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";				
		$resultado	= pg_query($consulta) or die("Falha no Login.");
		$linha		= pg_fetch_assoc($resultado) or die(header("Location:../"));
		$numero		= pg_num_rows($resultado);
		if ($numero == 1) {
			session_start();
			$_SESSION['login']		= $login;
			$_SESSION['senha']		= $senha;
			$_SESSION['idperfil']	= $linha['idperfil'];
			$_SESSION['idunidade']	= $linha['idunidade'];
			switch($_SESSION['idperfil']){
				case 1:
					header("Location:admin/");
					break;
				case 2:
					header("Location:professor/");
					break;
				case 3:
					header("Location:caa/");
					break;
				case 4:
					header("Location:rh/");
					break;
				case 6:
					header("Location:secretaria/");
					break;
				case 7:
					header("Location:comercial/");
					break;
				case 8:
					header("Location:professor_ingles/");
					break;
				default:
					echo "Não encontrado<br />";
					break;
			}
		} else {
			echo "Não existe";
		}

	}

?>