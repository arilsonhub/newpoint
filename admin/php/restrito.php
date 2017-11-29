<?php

	session_start();
	$idperfil		= $_SESSION['idperfil'];
	if($idperfil 	== $ver){
		
		define('MAXIMO_FOTOS','15');

	}else{
		session_destroy();
		header("Location:../../");
	}

?>