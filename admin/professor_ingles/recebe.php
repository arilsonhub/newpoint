<?php
include("../php/banco.php");

	if(!empty($_POST['a'])){
		include("../php/conexao.php");
		$a	= $_POST['a'];
		switch($a){
			case 1:
				if(!empty($_POST['texto'])){
					$titulo				= $_POST['titulo'];
					$manchete			= $_POST['manchete'];
					$imagem				= $_FILES['imagem'];
					$texto				= $_POST['texto'];
					
					$diretorio = "C:/xampp/htdocs/Newpoint/web_files/upload/noticias";
					if(!file_exists($diretorio)){
						mkdir ("C:/xampp/htdocs/Newpoint/web_files/upload/noticias", 0700 );
					}
					// Pasta onde o arquivo vai ser salvo
					$_UP['pasta'] = '../../web_files/upload/noticias/';
		
					// Tamanho máximo do arquivo (em Bytes)
					$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
					
					// Array com as extensões permitidas
					$_UP['extensoes'] = array('png', 'jpg', 'jpeg');
					
					// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
					$_UP['renomeia'] = true;
					
					// Array com os tipos de erros de upload do PHP
					$_UP['erros'][0] = 'N�o houve erro';
					$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
					$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
					$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
					$_UP['erros'][4] = 'N�o foi feito o upload do arquivo';
					
					// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
					if ($_FILES['imagem']['error'] != 0) {
						echo $_FILES['imagem']['error'];
						exit; // Para a execução do script
					}
					
					// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
					
					// Faz a verificação da extensão do arquivo
					@$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) {
						header("Location:cadastrar.php?erro=1");
					}
					
					// Faz a verificação do tamanho do arquivo
					else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
						header("Location:cadastrar.php?erro=2");
					}
					
					// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
					else {
					// Primeiro verifica se deve trocar o nome do arquivo
					if ($_UP['renomeia'] == true) {
					// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
						$nome_final = time().$imagem['name'];
					} else {
					// Mantém o nome original do arquivo
						$nome_final = $_FILES['imagem']['name'];
					}
					
					//grava no banco
					$sql = "INSERT INTO noticia(titulo, texto, imagem, manchete) VALUES('".$titulo."', '".$texto."', '".$nome_final."', '".$manchete."')";
					$resultado = pg_query($sql);
					if($resultado){
						// Depois verifica se é possível mover o arquivo para a pasta escolhida
						if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
						// Upload efetuado com sucesso
							header("Location:cadastrar.php?acerto=1");
						} else {
						// Não foi possível fazer o upload, provavelmente a pasta está incorreta
							header("Location:cadastrar.php?erro=4");
							echo "N�oo foi poss�l enviar o arquivo, tente novamente";
						}
					}
					
					}
				}else{
					header("Location:cadastrar.php?erro=5");
				}
				break;
			case 2:
				if(!empty($_POST['titulo']) AND !empty($_POST['data-evento'])){
					$titulo		= $_POST['titulo'];
					$unidade	= $_POST['unidade'];
					$data		= $_POST['data-evento'];
					$data 		= implode("-",array_reverse(explode("/",$data)));
					$descricao	= $_POST['descricao'];
					$tag 		= $banco->createTag($titulo);
					$sql = "INSERT INTO album(titulo, idunidade, descricao, data_do_evento, tag) VALUES('".$titulo."', '".$unidade."', '".$descricao."', '".$data."', '".$tag."')";
					//echo $sql;exit;
					$resultado = pg_query($sql);
				}else{
					header("Location:album.php?erro=1");
				}
				break;
			case 3:
				
					if($_SERVER['REQUEST_METHOD'] == "POST"){				
							if(!empty($_POST['titulo']) AND !empty($_POST['data-evento'])){					
								$id         = $_POST['id'];
								$titulo		= $_POST['titulo'];
								$unidade	= $_POST['unidade'];
								$data		= $_POST['data-evento'];
								$data 		= implode("-",array_reverse(explode("/",$data)));
								$descricao	= $_POST['descricao'];
								$tag 		= $banco->createTag($titulo);
								$sql		= "UPDATE album SET titulo = '".$titulo."', idunidade = '".$unidade."', descricao = '".$descricao."', data_do_evento = '".$data."', tag = '".$tag."' WHERE id =$id";					
								$resultado	= pg_query($sql);
							}else{
								header("Location:usuarios.php");
							}
					}
				break;

			//Adicionar Foto para Album
			case 4:
				
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					
					//Mensagem de resultado do upload
					$msg = "";
					
					//Verifica se o titulo foi preenchido
					if(strlen(trim($_POST['titulo'])) > 0){
					
						//Verifica se o arquivo foi enviado
						if(!empty($_FILES['imagem']['name'])){
								
							//Verifica se o arquivo tem no m�ximo 2MB
							if($_FILES['imagem']['size'] < 2097152){
					
								//Verifica se o arquivo � uma imagem
								if(preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES['imagem']['type'])) {
									
									//*************** Pega o titulo do album ******************
										$query = "SELECT titulo from album where id = ".$_POST['idalbum']."";
										$result = pg_query($query);
										$recordsetAlbum = pg_fetch_assoc($result);
									//*********************************************************					
									
									//Trata o nome do arquivo
									$_FILES['imagem']['name'] = $banco->TirarAcentos($recordsetAlbum['titulo']."_".$_FILES['imagem']['name']);
									//Recebe o nome do arquivo
									$nome_arquivo = date("Ymdhis")."_".$_FILES['imagem']['name'];
									// Caminho de onde ficar� a imagem
									$caminho_imagem = "../../web_files/upload/galeria_fotos/".$nome_arquivo;
										
									$sql	= "INSERT INTO galeriafotos(idalbum,title,imagem)VALUES('".$_POST['idalbum']."','".$_POST['titulo']."','".$nome_arquivo."')";
									$resultado	= pg_query($sql);
					
									//Verifica se inseriu no banco
									if($resultado){
					
										// Faz o upload da imagem para seu respectivo caminho
										if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)){
											//Erro no upload
											$msg = "N�o foi possivel salvar a imagem";
										}
					
										//Mensagem de confirma��o
										$msg = "Upload realizado com sucesso";
											
									}else{
											
										$msg = "Erro ao salvar a Foto";
									}
					
								}else{
										
									$msg = "O arquivo selecionado esta no formato inv�lido";
								}
					
							}else{
									
								$msg = "O arquivo selecionado � grande demais, o arquivo deve ter menos de 2MB";
							}
						}else{
								
							$msg = "Por favor selecione uma imagem";
						}
					}else{
						$msg = "Informe o titulo da Foto";
					}
					
					header("Location:add-fotos.php?id=".$_POST['idalbum']."&msg=".urlencode(utf8_encode($msg))."");
					exit();
				}
				
			break;	
			
			case 5:
				
				if(!isset($_POST['id'])){
					exit();
				}
				
				$query = "SELECT * from galeriafotos where idalbum = ".$_POST['id']."";
				$result = pg_query($query);
				
				if(pg_num_rows($result)){
									
						while($dadosFotos = pg_fetch_assoc($result)){
							
							$caminho_imagem = "../../web_files/upload/galeria_fotos/".$dadosFotos['imagem'];
							if(is_file($caminho_imagem)) unlink($caminho_imagem);
							pg_query("delete from galeriafotos where id = ".$dadosFotos['id']." ");
						}				
				}
				
				$query = "delete from album where id = ".$_POST['id']." ";
				pg_query($query);
				header("Location:editar-album.php?msg=".urlencode(utf8_encode("Album exclu�do com sucesso").""));
				exit();
				
		    break;
		    
			case 6:
				
				//Verifica se alguma foto foi selecionada
				if(count($_POST['fotosIds']) > 0){
					
					$query = "SELECT * FROM galeriafotos where idalbum = ".$_POST['idalbum']." and id in(".implode(",",$_POST['fotosIds']).")";
					$result = pg_query($query);
					while($dadosFotos = pg_fetch_assoc($result)){
						$caminho_imagem = "../../web_files/upload/galeria_fotos/".$dadosFotos['imagem'];
						if(is_file($caminho_imagem)) unlink($caminho_imagem);
					}
					
					$query = "DELETE FROM galeriafotos where idalbum = ".$_POST['idalbum']." and id in(".implode(",",$_POST['fotosIds']).")";					
					pg_query($query);
					header("Location:ex-fotos.php?id=".$_POST['idalbum']."&msg=".urlencode(utf8_encode("Fotos exclu�das com sucesso"))."");
				}else{
					
					header("Location:ex-fotos.php?id=".$_POST['idalbum']."&msg=".urlencode(utf8_encode("Nenhuma foto foi selecionada para exclus�o"))."");
				}
				
			break;

			case 7:
				if(!empty($_POST['enunciado'])){
					if(empty($_POST['nivel'])){
						header("Location:perguntas-cadastrar.php?erro=1");
					}
					if(!isset($_POST['certa'])){
						header("Location:perguntas-cadastrar.php?erro=3");
					}
					$enunciado	= addslashes($_POST['enunciado']);
					$nivel		= $_POST['nivel'];
					
					$sql		= "INSERT INTO nivelamentoquestoes (descricao,idnivel) VALUES ('".$enunciado."','".$nivel."')";
					$resultado	= pg_query($sql) or die(pg_result_error());

					$pesquisa 	= "SELECT id FROM nivelamentoquestoes WHERE descricao = '".$enunciado."'";
					$id 	 	= pg_query($pesquisa) or die (pg_result_error());
					$id 		= pg_fetch_assoc($id);
					$idquestao	= $id['id'];

					$certa		= $_POST['certa'];
					$i=0;

					for($i=0;$i<=4;$i++){
						if($certa==$i){
							$resposta 	= addslashes($_POST['respostas'][$i]);
							$sql = "INSERT INTO nivelamentoalternativas (descricao,idquestao,correta) VALUES ('".$resposta."','".$idquestao."',1)";
						}else{
							$resposta 	= addslashes($_POST['respostas'][$i]);
							$sql = "INSERT INTO nivelamentoalternativas (descricao,idquestao,correta) VALUES ('".$resposta."','".$idquestao."',0)";
						}
						$gravar = pg_query($sql) or die(pg_result_error());
					}
				}else{
					header("Location:perguntas-cadastrar.php?erro=2");
				}
			break;
			case 8:
				if(!empty($_POST['enunciado'])){
					if(empty($_POST['nivel'])){
						header("Location:perguntas-cadastrar.php?erro=1");
					}
					if(!isset($_POST['certa'])){
						header("Location:perguntas-cadastrar.php?erro=3");
					}
					$enunciado	  = $_POST['enunciado'];
					$nivel		  = $_POST['nivel'];
					$descricao	  = $_POST['enunciado'];
					$id_enunciado = $_POST['id_enunciado'];
					$sql		= "UPDATE nivelamentoquestoes SET descricao = '$descricao', idnivel = '$nivel' WHERE id = $id_enunciado";
					$resultado	= pg_query($sql) or die(pg_result_error());

					$certa		= $_POST['certa'];
					$i=0;

					//$banco->testarArray($_POST);
					for($i=0;$i<=4;$i++){
						if($certa==$i){
							$resposta 	= $_POST['resposta'][$i];
							$id_agora 	= $_POST['id_questao'][$i];
							$sql = "UPDATE nivelamentoalternativas SET descricao = '$resposta' WHERE id = $id_agora";
						}else{
							$resposta 	= $_POST['resposta'][$i];
							$id_agora 	= $_POST['id_questao'][$i];
							$sql = "UPDATE nivelamentoalternativas SET descricao = '$resposta', correta = 0 WHERE id = $id_agora";
						}
						$gravar = pg_query($sql) or die(pg_result_error());
					}
				}else{
					header("Location:perguntas-cadastrar.php?erro=2");
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
		include "../php/menu_professor_ingles.php";
	?>
  <div role="main" id="main">
  	
  	<p>Salvo com sucesso!</p>
  	
  	<div id="form">
  		
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>