<?php

class Banco{
	
	function TirarAcentos($str){
	
		$acentos = array(
				'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
				'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
				'C' => '/&Ccedil;/',
				'c' => '/&ccedil;/',
				'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
				'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
				'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
				'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
				'N' => '/&Ntilde;/',
				'n' => '/&ntilde;/',
				'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
				'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
				'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
				'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
				'Y' => '/&Yacute;/',
				'y' => '/&yacute;|&yuml;/',
				'a.' => '/&ordf;/',
				'o.' => '/&ordm;/');
	
		return str_replace(" ","-",preg_replace($acentos,array_keys($acentos),htmlentities($str,ENT_NOQUOTES,"UTF-8")));
	}
        
        function formatData($data) { 
            // trata o SQL Injection
            $data = strip_tags($data);
            $data = trim($data);
            $data = get_magic_quotes_gpc() == 0 ? addslashes($data) : $data;
            $data = preg_replace("@(--|\#|\*|;)@s", "", $data);
            return $data;
        }
        
        public function testarArray($array){
            echo "<pre>";
            print_r($array);
            echo "</pre>"; 
            exit;
        }
		
		public function visivel($numero){
			if($numero==1){
				$resposta = "Sim";
			}else{
				$resposta = "Não";
			}
			return $resposta;
		}
		
		public function tamanhoTexto($texto){
			$formatar_texto		= $texto;
			$texto_explodido	= explode(" ", $formatar_texto);
			$texto = "";
			for ($i=0; $i < 3; $i++) { 
				$texto .= " ".$texto_explodido[$i];
			}
			return $texto;
		}

		function anti_sql($texto){

			// Lista de palavras para procurar
			$check[1] = chr(34); // símbolo "
			$check[2] = chr(39); // símbolo '
			$check[3] = chr(92); // símbolo /
			$check[4] = chr(96); // símbolo `
			$check[5] = "drop table";
			$check[6] = "update";
			$check[7] = "alter table";
			$check[8] = "drop database";	
			$check[9] = "drop";
			$check[10] = "select";
			$check[11] = "delete";
			$check[12] = "insert";
			$check[13] = "alter";
			$check[14] = "destroy";
			$check[15] = "table";
			$check[16] = "database";
			$check[17] = "union";
			$check[18] = "TABLE_NAME";
			$check[19] = "1=1";
			$check[20] = 'or 1';
			$check[21] = 'exec';
			$check[22] = 'INFORMATION_SCHEMA';
			$check[23] = 'like';
			$check[24] = 'COLUMNS';
			$check[25] = 'into';
			$check[26] = 'VALUES';
			
			// Cria se as variáveis $y e $x para controle no WHILE que fará a busca e substituição
			$y = 1;
			$x = sizeof($check);
			// Faz-se o WHILE, procurando alguma das palavras especificadas acima, caso encontre alguma delas, este script substituirá por um espaço em branco " ".
			while($y <= $x){
				   $target = strpos($texto,$check[$y]);
					if($target !== false){
						$texto = str_replace($check[$y], "", $texto);
					}
				$y++;
			}
			// Retorna a variável limpa sem perigos de SQL Injection
			return $texto;
		}
		
		function diaCerto($data){
			$d		= explode("-",$data);
			$dia 	= $d['2'];
			$mes 	= $d['1'];
			$ano 	= $d['0'];
			$data 	= $dia.'/'.$mes.'/'.$ano;
			return $data;
		}

		function verificaStatus($status, $id){
			if($status == 1){
				echo "<td><a href='recebe.php?a=1&id=$id' title='marcar como visualizado'><img src='../img/ok.png' alt='marcar como visualizado'/></a></td>";
			}else{
				echo "<td><a href='#' title='nenhuma ação'><img src='../img/inativo.png' alt='nenhuma ação'/></a></td>";
			}
		}

		function cidade($idunidade){
			switch($idunidade){
				case 1:
					$cidade = "Alvorada";
					break;
				case 2:
					$cidade = "Gravataí";
					break;
				case 3:
					$cidade = "Porto Alegre";
					break;
				case 4:
					$cidade = "Viamão";
					break;
				default:
					break;
			}
			return $cidade;
		}

		function cargo($idcargo){
			switch($idcargo){
				case 1:
					$cargo = "Comercial";
					break;
				case 2:
					$cargo = "Recepção";
					break;
				case 3:
					$cargo = "Instrutor de informática";
					break;
				case 4:
					$cargo = "Instrutor de inglês";
					break;
				case 5:
					$cargo = "Suporte técnico";
					break;
				case 6:
					$cargo = "Cobrança";
					break;
				case 7:
					$cargo = "Coordenação comercial";
					break;
				case 8:
					$cargo = "Coordenação pedagógica";
					break;
				default:
					break;
			}
			return $cargo;
		}

	    function createTag($string, $imgname = FALSE){
	        $tag = str_replace(Array(" "),"-",$string);
	        $tag = str_replace(Array("Á","À","Â","Ã","á","à","â","ã","ª"),"a",$tag);
	        $tag = str_replace(Array("É","È","Ê","é","è","ê"),"e",$tag);
	        $tag = str_replace(Array("Í","Ì","í","ì"),"i",$tag);
	        $tag = str_replace(Array("Ó","Ò","Ô","Õ","ó","ò","ô","õ","º"),"o",$tag);
	        $tag = str_replace(Array("Ú","Ù","Û","ú","ù","û"),"u",$tag);
	        $tag = str_replace(Array("Ç","ç"),"c",$tag);
	        $tag = str_replace(Array("(",")","<",">","[","]","{","}","/","|","%","?","!","$","+","=","*","&","!","#","`","@",";",":","´","~","^",",","'",'"'),"",$tag);
	        $tag = str_replace(Array("----","---","--"),"-",$tag);
	        if(!$imgname){
	            $tag = str_replace(Array("."),"",$tag);
	        }
	        return strtolower($tag);
	    }
		
}

$banco = new Banco;

?>