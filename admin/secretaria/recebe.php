<?php
include("../php/banco.php");

	if(!empty($_POST['a'])){
		include("../php/conexao.php");
		$a	= $_POST['a'];
		switch($a){
			case 1:
				break;
			case 2:
					if(!empty($_POST['titulo']) AND !empty($_POST['data-evento']) AND !empty($_POST['unidade']) AND !empty($_POST['descricao'])){
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
					if(!empty($_POST['titulo']) AND !empty($_POST['data-evento']) AND !empty($_POST['unidade']) AND !empty($_POST['descricao'])){
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
						$id         = $_POST['id'];
						header("Location:album_editar.php?id=$id&erro=1");
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
								
							//Verifica se o arquivo tem no mï¿½ximo 2MB
							if($_FILES['imagem']['size'] < 2097152){
					
								//Verifica se o arquivo ï¿½ uma imagem
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
									// Caminho de onde ficarï¿½ a imagem
									$caminho_imagem = "../../web_files/upload/galeria_fotos/".$nome_arquivo;
										
									$sql	= "INSERT INTO galeriafotos(idalbum,title,imagem)VALUES('".$_POST['idalbum']."','".$_POST['titulo']."','".$nome_arquivo."')";
									$resultado	= pg_query($sql);
					
									//Verifica se inseriu no banco
									if($resultado){
					
										// Faz o upload da imagem para seu respectivo caminho
										if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)){
											//Erro no upload
											$msg = "Não foi possivel salvar a imagem";
										}
					
										//Mensagem de confirmaï¿½ï¿½o
										$msg = "Upload realizado com sucesso";
											
									}else{
											
										$msg = "Erro ao salvar a Foto";
									}
					
								}else{
										
									$msg = "O arquivo selecionado esta no formato inválido";
								}
					
							}else{
									
								$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
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
				header("Location:editar-album.php?msg=".urlencode(utf8_encode("Album excluído com sucesso").""));
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
					header("Location:ex-fotos.php?id=".$_POST['idalbum']."&msg=".urlencode(utf8_encode("Fotos excluídas com sucesso"))."");
				}else{
					
					header("Location:ex-fotos.php?id=".$_POST['idalbum']."&msg=".urlencode(utf8_encode("Nenhuma foto foi selecionada para exclusão"))."");
				}
			break;
			case 7:
			
			    //Mensagem de resultado do upload
				$msg = "";
				//Tratando a opção de visibilidade de imagem
				$_POST['visivel'] = (isset($_POST['visivel']) ? $_POST['visivel'] : "0");
			
			    //Verifica se o arquivo foi enviado
				if(!empty($_FILES['imagem']['name'])){
					
					//*********** PROCESSO PARA SALVAR CONVENIO > COM < UPLOAD DE IMAGEM *****************
					
					//Verifica se o arquivo tem no m�ximo 2MB
					if($_FILES['imagem']['size'] < 2097152){				
		                
                        //Verifica se o arquivo � uma imagem 						
					    if(preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES['imagem']['type'])) {                           
						
                           //Recebe o nome do arquivo						
						   $nome_arquivo = date("Ymdhis")."_".$_FILES['imagem']['name'];                           
						   // Caminho de onde ficar� a imagem
        	               $caminho_imagem = "../../web_files/upload/convenios/".$nome_arquivo;
						   
						       $sql	= "insert into empresaconvenio(nome,idcidade,endereco,telefone,desconto,imagem,visivel)";
							   $sql .= "VALUES('".$_POST['nome']."','".$_POST['cidade']."','".$_POST['endereco']."','".$_POST['telefone']."','".$_POST['desconto']."','".$nome_arquivo."','".$_POST['visivel']."')";
							   $resultado	= pg_query($sql);
							   
							   //Verifica se inseriu no banco
							   if($resultado){
							   
							        // Faz o upload da imagem para seu respectivo caminho
								   if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)){						   									   
								       //Erro no upload 
									   $msg = "Não foi possivel salvar a imagem";									   
								   }
							   
							       //Mensagem de confirma��o
								   $msg = "Registro inserido com sucesso";
								   
							   }else{							   
							       
								   $msg = "Erro ao salvar a noticia";
							   }
							   
						}else{
						   
						   $msg = "O arquivo selecionado esta no formato inválido"; 
						}
						
					}else{
					  
					       $msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
					}
				}else{
					           //PROCESSO PARA SALVAR CONVENIO > SEM < UPLOAD DE IMAGEM
					           $sql	 = "insert into empresaconvenio(nome,idcidade,endereco,telefone,desconto,imagem,visivel)";
							   $sql .= "VALUES('".$_POST['nome']."','".$_POST['cidade']."','".$_POST['endereco']."','".$_POST['telefone']."','".$_POST['desconto']."',null,'".$_POST['visivel']."')";
							   $resultado	= pg_query($sql) or die(pg_result_error());
							   
							   if($resultado){
							      $msg = "Registro inserido com sucesso";							   
							   }else{
							      $msg = "Ocorreu um erro ao salvar o registro, tente novamente mais tarde.";
							   }
				}
				
				header("Location:convenios.php?msg=".urlencode($msg));
				break;
			case 8:
				if(!empty($_POST['oque'])){
					$categoria	= $_POST['categoria'];
					$oque		= $_POST['oque'];
					$quando		= $_POST['quando'];
					$onde		= $_POST['onde'];
					$id			= $_POST['id'];
					$sql		= "UPDATE agenda SET idcategoria = '".$categoria."', oque = '".$oque."', quando = '".$quando."', onde = '".$onde."' WHERE id =$id";
					$resultado	= pg_query($sql);
				}else{
					header("Location:usuarios.php");
				}
				break;
			default:
				break;
		}
	}else{
		header("Location:index.php");
	}
	header("Location:index.php");
?>