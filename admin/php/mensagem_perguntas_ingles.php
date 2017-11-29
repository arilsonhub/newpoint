<?php
	
	if(!empty($_GET['erro'])){
		$m = $_GET['erro'];
		switch($m){
			case 1:
				echo "Você deve escolher o nível da pergunta.";
				break;
			case 2:
				echo "Você esqueceu o enunciado da pergunta.";
				break;
			case 3:
				echo "Você deve escolher uma alternativa correta.";
				break;
			default:
				break;
		}
	}else{

	}

?>