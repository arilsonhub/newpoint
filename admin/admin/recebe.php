<?php
if (! empty ( $_POST ['a'] )) {
	include ("../php/conexao.php");
	include ("../php/banco.php");
	$a = $_POST ['a'];
	
	switch ($a) {
		case 1 :
			if (! empty ( $_POST ['missao'] )) {
				$missao = $_POST ['missao'];
				$sql = "UPDATE instituicao SET missao = '" . $missao . "' WHERE id ='1'";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		case 2 :
			if (! empty ( $_POST ['visao'] )) {
				$visao = $_POST ['visao'];
				$sql = "UPDATE instituicao SET visao = '" . $visao . "' WHERE id ='1'";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		case 3 :
			if (! empty ( $_POST ['valores'] )) {
				$valores = $_POST ['valores'];
				$sql = "UPDATE instituicao SET texto_principal = '" . $valores . "' WHERE id ='1'";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		case 4 :
			if (! empty ( $_POST ['fazbem'] )) {
				$fazbem = $_POST ['fazbem'];
				$sql = "UPDATE instituicao SET faz_bem = '" . $fazbem . "' WHERE id ='1'";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		case 5 :
			if (! empty ( $_POST ['texto_convenios'] )) {
				$texto_convenios = $_POST ['texto_convenios'];
				$sql = "UPDATE INTO instituicao SET texto_empresas_conveniadas = '" . $texto_convenios . "' WHERE id ='1'";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		
		case 6 :
			
			// Mensagem de resultado do upload
			$msg = "";
			
			// Verifica se o arquivo foi enviado
			if (! empty ( $_FILES ['imagem'] ['name'] )) {
				
				// Verifica se o arquivo tem no m�ximo 2MB
				if ($_FILES ['imagem'] ['size'] < 2097152) {
					
					// Verifica se o arquivo � uma imagem
					if (preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type'] )) {
						
						// Recebe o nome do arquivo
						$nome_arquivo = date ( "Ymdhis" ) . "_" . $_FILES ['imagem'] ['name'];
						// Caminho de onde ficar� a imagem
						$caminho_imagem = "../../web_files/upload/noticias/" . $nome_arquivo;
						
						$sql = "insert into noticia(titulo,manchete,imagem,texto)";
						$sql .= "VALUES('" . $_POST ['titulo'] . "','" . $_POST ['manchete'] . "','" . $nome_arquivo . "','" . $_POST ['texto'] . "')";
						$resultado = pg_query ( $sql );
						
						// Verifica se inseriu no banco
						if ($resultado) {
							
							// Faz o upload da imagem para seu respectivo caminho
							if (! move_uploaded_file ( $_FILES ['imagem'] ['tmp_name'], $caminho_imagem )) {
								// Erro no upload
								$msg = "Não foi possivel salvar a imagem";
							}
							
							// Mensagem de confirma��o
							$msg = "Upload realizado com sucesso";
						} else {
							
							$msg = "Erro ao salvar a noticia";
						}
					} else {
						
						$msg = "O arquivo selecionado esta no formato inválido";
					}
				} else {
					
					$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
				}
			} else {
				
				$msg = "Selecione a imagem a ser enviada";
			}
			
			header ( "Location:noticias.php?msg=" . urlencode ( $msg ) );
			break;
		case 7 :
			
			// Mensagem de resultado do upload
			$msg = "";
			// Tratando a opção de visibilidade de imagem
			$_POST ['visivel'] = (isset ( $_POST ['visivel'] ) ? $_POST ['visivel'] : "0");
			
			// Verifica se o arquivo foi enviado
			if (! empty ( $_FILES ['imagem'] ['name'] )) {
				
				// *********** PROCESSO PARA SALVAR CONVENIO > COM < UPLOAD DE IMAGEM *****************
				
				// Verifica se o arquivo tem no m�ximo 2MB
				if ($_FILES ['imagem'] ['size'] < 2097152) {
					
					// Verifica se o arquivo � uma imagem
					if (preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type'] )) {
						
						// Recebe o nome do arquivo
						$nome_arquivo = date ( "Ymdhis" ) . "_" . $_FILES ['imagem'] ['name'];
						// Caminho de onde ficar� a imagem
						$caminho_imagem = "../../web_files/upload/convenios/" . $nome_arquivo;
						
						$sql = "insert into empresaconvenio(nome,idcidade,endereco,telefone,desconto,imagem,visivel)";
						$sql .= "VALUES('" . $_POST ['nome'] . "','" . $_POST ['cidade'] . "','" . $_POST ['endereco'] . "','" . $_POST ['telefone'] . "','" . $_POST ['desconto'] . "','" . $nome_arquivo . "','" . $_POST ['visivel'] . "')";
						$resultado = pg_query ( $sql );
						
						// Verifica se inseriu no banco
						if ($resultado) {
							
							// Faz o upload da imagem para seu respectivo caminho
							if (! move_uploaded_file ( $_FILES ['imagem'] ['tmp_name'], $caminho_imagem )) {
								// Erro no upload
								$msg = "Não foi possivel salvar a imagem";
							}
							
							// Mensagem de confirma��o
							$msg = "Registro inserido com sucesso";
						} else {
							
							$msg = "Erro ao salvar a noticia";
						}
					} else {
						
						$msg = "O arquivo selecionado esta no formato inválido";
					}
				} else {
					
					$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
				}
			} else {
				// PROCESSO PARA SALVAR CONVENIO > SEM < UPLOAD DE IMAGEM
				$sql = "insert into empresaconvenio(nome,idcidade,endereco,telefone,desconto,imagem,visivel)";
				$sql .= "VALUES('" . $_POST ['nome'] . "','" . $_POST ['cidade'] . "','" . $_POST ['endereco'] . "','" . $_POST ['telefone'] . "','" . $_POST ['desconto'] . "',null,'" . $_POST ['visivel'] . "')";
				$resultado = pg_query ( $sql );
				
				if ($resultado) {
					$msg = "Registro inserido com sucesso";
				} else {
					$msg = "Ocorreu um erro ao salvar o registro, tente novamente mais tarde.";
				}
			}
			
			header ( "Location:convenios.php?msg=" . urlencode ( $msg ) );
			break;
		case 8 :
			
			// Mensagem de resultado do upload
			$msg = "";
			$id = $_POST ['id'];
			
			// Verifica se o arquivo foi enviado
			if (! empty ( $_FILES ['imagem'] ['name'] )) {
				
				// Verifica se o arquivo tem no m�ximo 2MB
				if ($_FILES ['imagem'] ['size'] < 2097152) {
					
					// Verifica se o arquivo � uma imagem
					if (preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type'] )) {
						
						// Recebe o nome do arquivo
						$nome_arquivo = date ( "Ymdhis" ) . "_" . $_FILES ['imagem'] ['name'];
						// Caminho de onde ficar� a imagem
						$caminho_imagem = "../../web_files/upload/noticias/" . $nome_arquivo;
						
						$sql = "UPDATE noticia SET titulo = '" . $_POST ['titulo'] . "', 
														manchete = '" . $_POST ['manchete'] . "',
														texto = '" . $_POST ['texto'] . "'
														imagem = '" . $nome_arquivo . "'
									WHERE id = $id";
						$resultado = pg_query ( $sql );
						$resultado = pg_query ( $sql );
						
						// Verifica se inseriu no banco
						if ($resultado) {
							
							// Faz o upload da imagem para seu respectivo caminho
							if (! move_uploaded_file ( $_FILES ['imagem'] ['tmp_name'], $caminho_imagem )) {
								// Erro no upload
								$msg = "Não foi possivel salvar a imagem";
							}
							
							// Mensagem de confirma��o
							$msg = "Upload realizado com sucesso";
						} else {
							
							$msg = "Erro ao salvar a noticia";
						}
					} else {
						
						$msg = "O arquivo selecionado esta no formato inválido";
					}
				} else {
					
					$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
				}
			} else {
				
				$sql = "UPDATE noticia SET titulo = '" . $_POST ['titulo'] . "', 
														manchete = '" . $_POST ['manchete'] . "',
														texto = '" . $_POST ['texto'] . "'
									WHERE id = $id";
				$resultado = pg_query ( $sql );
			}
			break;
		case 9 :
			if (! empty ( $_POST ['login'] )) {
				$nome = $_POST ['nome'];
				$setor = $_POST ['setor'];
				$unidade = $_POST ['unidade'];
				$login = $_POST ['login'];
				$senha = $_POST ['senha'];
				$sql = "INSERT INTO usuario(nome,idunidade,idperfil,login,senha) VALUES('" . $nome . "','" . $unidade . "','" . $setor . "','" . $login . "','" . $senha . "')";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		case 10 :
			if (! empty ( $_POST ['categoria'] )) {
				$categoria = $_POST ['categoria'];
				$oque = $_POST ['oque'];
				$quando = $_POST ['quando'];
				$onde = $_POST ['onde'];
				$sql = "INSERT INTO agenda(idcategoria,oque,quando,onde) VALUES('" . $categoria . "','" . $oque . "','" . $quando . "','" . $onde . "')";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:index.php" );
			}
			break;
		case 11 :
			if (! empty ( $_POST ['login'] )) {
				$nome = $_POST ['nome'];
				$setor = $_POST ['setor'];
				$unidade = $_POST ['unidade'];
				$login = $_POST ['login'];
				$senha = $_POST ['senha'];
				$id = $_POST ['id'];
				$sql = "UPDATE usuario SET nome = '" . $nome . "', idperfil = '" . $setor . "', idunidade = '" . $unidade . "', login = '" . $login . "', senha = '" . $senha . "' WHERE id =$id";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:usuarios.php" );
			}
			break;
		case 12 :
			if (! empty ( $_POST ['oque'] )) {
				$categoria = $_POST ['categoria'];
				$oque = $_POST ['oque'];
				$quando = $_POST ['quando'];
				$onde = $_POST ['onde'];
				$id = $_POST ['id'];
				$sql = "UPDATE agenda SET idcategoria = '" . $categoria . "', oque = '" . $oque . "', quando = '" . $quando . "', onde = '" . $onde . "' WHERE id =$id";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:usuarios.php" );
			}
			break;
		case 13 :
			if (! empty ( $_POST ['nome'] )) {
				$nome = $_POST ['nome'];
				$sql = "INSERT INTO cursos(nome) VALUES('" . $nome . "')";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:cursos.php" );
			}
			break;
		case 14 :
			if (! empty ( $_POST ['nome'] )) {
				$nome = $_POST ['nome'];
				$id = $_POST ['id'];
				$sql = "UPDATE cursos SET nome = '" . $nome . "' WHERE id =$id";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:usuarios.php" );
			}
			break;
		case 15 :
			if (! empty ( $_POST ['id'] )) {
				$id = $_POST ['id'];
				$titulo = $_POST ['titulo'];
				$horario = $_POST ['horario'];
				if (empty ( $horario )) {
					$horario = 0;
				}
				$descricao = $_POST ['descricao'];
				$sql = "UPDATE modulos SET titulo = '" . $titulo . "', descricao = '" . $descricao . "', cargahoraria = '" . $horario . "' WHERE id =$id";
				$resultado = pg_query ( $sql );
			} else {
				header ( "Location:usuarios.php" );
			}
			break;
		case 16 :
			if (! empty ( $_POST ['curso'] )) {
				$id = $_POST ['curso'];
				$modulos = "'{" . implode ( ",", $_POST ['modulo'] ) . "}'";
				$recebe = pg_query ( "SELECT sf_inserirModulosNoCurso($id ,$modulos)" );
			} else {
				header ( "Location:usuarios.php" );
			}
			break;
		case 17 :
			// Mensagem de resultado do upload
			$msg = "";
			
			// Verifica se o titulo foi preenchido
			if (strlen ( trim ( $_POST ['titulo'] ) ) > 0) {
				
				// Verifica se o arquivo foi enviado
				if (! empty ( $_FILES ['imagem'] ['name'] )) {
					
					// Verifica se o arquivo tem no m�ximo 2MB
					if ($_FILES ['imagem'] ['size'] < 2097152) {
						
						// Verifica se o arquivo � uma imagem
						if (preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type'] )) {
							
							// Trata o nome do arquivo
							$_FILES ['imagem'] ['name'] = $banco->TirarAcentos ( $_FILES ['imagem'] ['name'] );
							// Recebe o nome do arquivo
							$nome_arquivo = date ( "Ymdhis" ) . "_" . $_FILES ['imagem'] ['name'];
							// Caminho de onde ficar� a imagem
							$caminho_imagem = "../../web_files/upload/banner/" . $nome_arquivo;
							
							$sql = "INSERT INTO banners(titulo,subtitulo,link,imagem)VALUES('" . $_POST ['titulo'] . "','','','" . $nome_arquivo . "')";
							$resultado = pg_query ( $sql );
							
							// Verifica se inseriu no banco
							if ($resultado) {
								
								// Faz o upload da imagem para seu respectivo caminho
								if (! move_uploaded_file ( $_FILES ['imagem'] ['tmp_name'], $caminho_imagem )) {
									// Erro no upload
									$msg = "Não foi possivel salvar a imagem";
								}
								
								// Mensagem de confirma��o
								$msg = "Upload realizado com sucesso";
							} else {
								
								$msg = "Erro ao salvar o Banner";
							}
						} else {
							
							$msg = "O arquivo selecionado esta no formato inválido";
						}
					} else {
						
						$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
					}
				} else {
					
					$msg = "Por favor selecione uma imagem";
				}
			} else {
				$msg = "Informe o titulo do Banner";
			}
			
			header ( "Location:banner.php?msg=" . urlencode ( $msg ) . "" );
			exit ();
			
			break;
		
		case 18 :
			
			// Mensagem de resultado do upload
			$msg = "";
			
			// Verifica se o arquivo foi enviado
			if (! empty ( $_FILES ['imagem'] ['name'] )) {
				
				// Verifica se o arquivo tem no m�ximo 2MB
				if ($_FILES ['imagem'] ['size'] < 2097152) {
					
					// Verifica se o arquivo � uma imagem
					if (preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type'] )) {
						
						// Trata o nome do arquivo
						$_FILES ['imagem'] ['name'] = $banco->TirarAcentos ( $_FILES ['imagem'] ['name'] );
						// Recebe o nome do arquivo
						$nome_arquivo = date ( "Ymdhis" ) . "_" . $_FILES ['imagem'] ['name'];
						// Caminho de onde ficar� a imagem
						$caminho_imagem = "../../web_files/upload/area_do_aluno/" . $nome_arquivo;
						
						// Busca os dados atuais da referencia de imagem
						$sql = "SELECT trim(imagem_area_aluno) as imagem_area_aluno FROM instituicao limit 1";
						$resultado = pg_query ( $sql );
						$recordset = pg_fetch_assoc ( $resultado );
						
						// Verifica se já tem imagem cadastrada
						if (strlen ( trim ( $recordset ['imagem_area_aluno'] ) ) > 0) {
							// Recebe a referência do arquivo
							$referenciaArquivo = "../../web_files/upload/area_do_aluno/" . $recordset ['imagem_area_aluno'];
							// Verifica se o arquivo existe
							if (is_file ( $referenciaArquivo )) {
								// Deleta o arquivo
								unlink ( $referenciaArquivo );
							}
						}
						
						// Atualiza a referencia da imagem
						$sql = "UPDATE instituicao SET imagem_area_aluno = '" . $nome_arquivo . "'";
						$resultado = pg_query ( $sql );
						
						// Verifica se inseriu no banco
						if ($resultado) {
							
							// Faz o upload da imagem para seu respectivo caminho
							if (! move_uploaded_file ( $_FILES ['imagem'] ['tmp_name'], $caminho_imagem )) {
								// Erro no upload
								$msg = "Não foi possivel salvar a imagem";
							}
							
							// Mensagem de confirma��o
							$msg = "Upload realizado com sucesso";
						} else {
							
							$msg = "Erro ao salvar a Imagem";
						}
					} else {
						
						$msg = "O arquivo selecionado esta no formato inválido";
					}
				} else {
					
					$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
				}
			} else {
				
				$msg = "Por favor selecione uma imagem";
			}
			
			header ( "Location:propaganda.php?msg=" . urlencode ( utf8_encode ( $msg ) ) . "" );
			exit ();
			
			break;
		case 19 :
			if (isset ( $_POST ['efetuarCadastroAluno'] )) {
				$msg = "Aluno cadastrado com sucesso";
				$banco = new Banco ();
				$nome = $banco->anti_sql ( $_POST ['nome'] );
				$telefone = $banco->anti_sql ( $_POST ['telefone'] );
				$unidade = $banco->anti_sql ( $_POST ['unidade'] );
				$aniversario = $banco->anti_sql ( implode ( "-", array_reverse ( explode ( "/", $_POST ['aniversario'] ) ) ) );
								
				$aniversario_partes = explode("-", $aniversario);
				if(checkdate($aniversario_partes[1], $aniversario_partes[2], $aniversario_partes[0]) && strtotime($aniversario) < strtotime(date('Y-m-d'))){
				
					$sql = "INSERT INTO aluno(nome,idunidade,datanascimento,ativo) VALUES('" . $nome . "','" . $unidade . "','" . $aniversario . "',1) returning id";
					$resultado = pg_query ( $sql );
					$alunoId = pg_fetch_array ( ($resultado) );
					
					$sql = "INSERT INTO telefone(numero)VALUES('" . $telefone . "') returning id";
					$resultado = pg_query ( $sql );
					$telefoneId = pg_fetch_array ( ($resultado) );
					
					$sql = "INSERT INTO alunotelefone(alunoid,telefoneid)VALUES(" . $alunoId ['id'] . "," . $telefoneId ['id'] . ")";
					$resultado = pg_query ( $sql );
					
					pg_close ();
				
				}else{
					$msg = "Aten��o, a data informada esta inv�lida";
				}
				
				header ( "Location:alunos.php?msg=" . urlencode ( utf8_encode ( $msg ) ) . "" );
				exit ();
			}
			break;
		
		case 20 :
			if (isset ( $_POST ['deletarAluno'] )) {
				
				//Mensagem
				$msg = "Aluno removido com sucesso";
				//Funções de banco
				$banco = new Banco ();
				//ID do aluno
				$alunoId = $banco->anti_sql ( $_POST ['id'] );
				
				//Verifica se o aluno existe
				$sql = "SELECT * from aluno where id = " . $alunoId;
				$resultado = pg_query ( $sql );
				if(pg_num_rows($resultado) <= 0) die("Aluno nao encontrado");
				
				//Processo de deleção
				$sql = "SELECT telefoneid from alunotelefone where alunoid = " . $alunoId;
				$resultado = pg_query ( $sql );
				$telefonesAluno = pg_fetch_all_columns ( $resultado, 0 );
				$telefonesAluno = implode ( ",", $telefonesAluno );
				
				$sql = "DELETE FROM alunotelefone WHERE alunoid = " . $alunoId;
				$resultado = pg_query ( $sql );
				
				$sql = "DELETE FROM telefone WHERE id in ($telefonesAluno)";
				$resultado = pg_query ( $sql );
				
				$sql = "DELETE FROM aluno WHERE id = " . $alunoId;
				$resultado = pg_query ( $sql );
				
				pg_close ();
				
				header ( "Location:alunos.php?msg=" . urlencode ( utf8_encode ( $msg ) ) . "" );
				exit ();
			}
			break;
		
		case 21 :
			
			if (isset ( $_POST ['efetuarCadastroAluno'] )) {
				
				//Mensagem
				$msg = "Dados do aluno salvos com sucesso";
				//Funções de banco
				$banco = new Banco ();
				//ID do aluno
				$id = $banco->anti_sql ( $_POST ['id'] );
				
				//Verifica se o aluno existe
				$sql = "SELECT * from aluno where id = " . $id;
				$resultado = pg_query ( $sql );
				if(pg_num_rows($resultado) <= 0) die("Aluno nao encontrado");
				
				//Dados do aluno
				$nome = $banco->anti_sql ( $_POST ['nome'] );
				$telefone = $banco->anti_sql ( $_POST ['telefone'] );
				$unidade = $banco->anti_sql ( $_POST ['unidade'] );
				$ativo = ( int ) $banco->anti_sql ( $_POST ['ativo'] );
				$aniversario = $banco->anti_sql ( implode ( "-", array_reverse ( explode ( "/", $_POST ['aniversario'] ) ) ) );
				
				if ($ativo != 1)
					$ativo = 0;
				
				$aniversario_partes = explode("-", $aniversario);
				if(checkdate($aniversario_partes[1], $aniversario_partes[2], $aniversario_partes[0]) && strtotime($aniversario) < strtotime(date('Y-m-d'))){
				
					$sql = "UPDATE aluno SET nome = '" . $nome . "', datanascimento = '" . $aniversario . "', ativo = " . $ativo . ", idunidade = " . $unidade . " where id = " . $id;
					$resultado = pg_query ( $sql );
					
					$sql = "SELECT * FROM alunotelefone WHERE alunoid = " . $id;
					$resultado = pg_query ( $sql );
					$alunoTelefoneDados = pg_fetch_assoc ( $resultado );
					
					$sql = "UPDATE telefone set numero = '" . $telefone . "' where id = " . $alunoTelefoneDados ['telefoneid'];
					$resultado = pg_query ( $sql );
					
					pg_close ();
				
				}else{
					$msg = "Aten��o, a data informada esta inv�lida";
				}
				
				header ( "Location:alunos.php?msg=" . urlencode ( utf8_encode ( $msg ) ) );
				exit ();
			}
			
			break;
		
		case 22 :
			
			if (isset ( $_POST ['efetuarCadastroPropaganda'] )) {
				// Mensagem de resultado do upload
				$msg = "";
				//Funcoes de banco
				$banco = new Banco ();
												
				//Verifica se esta editando
				if(isset($_POST['id'])){
					
					//Flag editando
					$editando = true;
					
					//Verifica se registro existe
					$sql = "SELECT * FROM propagandaescola WHERE id = " . $banco->anti_sql($_POST['id']);
					$resultado = pg_query ( $sql );
					if(pg_num_rows($resultado) <= 0) die("Registro nao encontrado!!!");
					
					//Validações
					$imagemVazia = true; //Como a imagem é obrigatória, então na edição sempre vamos ter uma imagem, logo passamos true sempre

					//Verifica se o usuário selecionou um arquivo
					if(isset($_FILES['imagem']) && !empty ( $_FILES ['imagem'] ['name'])){						
					   //Neste caso, valida se é imagem	
					   $ehImagem = $ehImagem = (isset($_FILES['imagem']) && preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type']));
					   //Neste caso, valida se o tamanho da imagem esta correto
					   $tamanhoCorreto = (isset($_FILES['imagem']) && ($_FILES ['imagem'] ['size'] < 2097152 && $_FILES ['imagem'] ['size'] > 0) );
					}else{
					   //Usuário não selecionou arquivo, portanto passamos batido nas validações	
					   $ehImagem 	   = true;
					   $tamanhoCorreto = true;
					}				
					
				}else{					
					//Validação normal, Inserindo novo registro
					$imagemVazia = (isset($_FILES ['imagem']) && !empty ( $_FILES ['imagem'] ['name']));
					$ehImagem = (isset($_FILES['imagem']) && preg_match ( "/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES ['imagem'] ['type']));
					$tamanhoCorreto = (isset($_FILES['imagem']) && ($_FILES ['imagem'] ['size'] < 2097152 && $_FILES ['imagem'] ['size'] > 0));
				}
												
				// Verificar se o arquivo foi enviado
				if ($imagemVazia) {
					
					// Verificar se o arquivo tem no m�ximo 2MB
					if ($tamanhoCorreto) {
						
						// Verificar se o arquivo � uma imagem
						if ($ehImagem) {

							// Caminho de onde ficar� a imagem
							$caminho_imagem = "../../web_files/upload/propaganda/";
							
							//Dados da propaganda							
							$id   = (isset($editando) ? $banco->anti_sql($_POST['id']) : null); 
							$nome = $banco->anti_sql($_POST['nome']);							
							$ativo = (!is_null($id) ? $banco->anti_sql($_POST['ativo']) : 0);
							// Tratar o nome do arquivo
							$fileName = $banco->TirarAcentos ( $_FILES ['imagem'] ['name'] );
							// Receber o nome do arquivo
							$nome_arquivo = date ( "Ymdhis" ) . "_" . $_FILES ['imagem'] ['name'];
														
							// Salvar os registros da propaganda
							if(is_null($id)){
								$sql = "INSERT INTO propagandaescola(nome,imagem,ativo)VALUES('".$nome."','".$nome_arquivo."',".$ativo.")";
							}else{											
								//Imagem já gravada no banco
								$imagemBanco = $banco->anti_sql($_POST['imagemBanco']);
								//Se esta atualizando, então verifica se alterou-se a imagem da propaganda
								if(! empty ( $_FILES ['imagem'] ['name'] )){									
									unlink($caminho_imagem.$imagemBanco);									
								}else{
									$nome_arquivo = $imagemBanco;
								} 
								$sql = "UPDATE propagandaescola set nome = '".$nome."', imagem = '".$nome_arquivo."' , ativo = '".$ativo."' where id = ".$id;								
							}

							//Adiciona o arquivo ao caminho
							$caminho_imagem .= $nome_arquivo;
							
							//Executa a query
							$resultado = pg_query ( $sql );
							
							// Verificar se salvou no banco
							if ($resultado) {							
								
								// Faz o upload da imagem para seu respectivo caminho
								if (! move_uploaded_file ( $_FILES ['imagem'] ['tmp_name'], $caminho_imagem )) {
									// Erro no upload
									$msg = "Não foi possivel salvar a imagem";
								}
								
								// Mensagem de confirma��o
								$msg = "Dados salvos com sucesso";
							} else {
								
								$msg = "Erro ao salvar a Imagem";
							}
						} else {
							
							$msg = "O arquivo selecionado esta no formato inválido";
						}
					} else {
						
						$msg = "O arquivo selecionado é grande demais, o arquivo deve ter menos de 2MB";
					}
				} else {
					
					$msg = "Por favor selecione uma imagem";
				}
				
				header ( "Location:propaganda.php?msg=" . urlencode ( utf8_encode ( $msg ) ) . (isset($_POST['id']) ? "&id=".$banco->anti_sql($_POST['id']) : "") );
				exit ();
			}
			
			break;
			
			case 23 :
				if (isset ( $_POST ['deletarPropaganda'] )) {
					
					//Mensagem
					$msg = "Propaganda removida com sucesso";
					//Funções de banco
					$banco = new Banco ();
					//ID da propaganda
					$propagandaId = $banco->anti_sql ( $_POST ['id'] );
					
					//Verifica se propaganda existe
					$sql = "SELECT * FROM propagandaescola WHERE id = " . $propagandaId;
					$resultado = pg_query ( $sql );
					if(pg_num_rows($resultado) <= 0){ die("Propaganda nao encontrada"); }
					
					//Dados propaganda
					$dadosPropaganda = pg_fetch_assoc($resultado);
					//Caminho Imagem									
					$caminhoImagem = $caminho_imagem = "../../web_files/upload/propaganda/".$dadosPropaganda['imagem'];
					
					//Tenta remover a imagem
					if(unlink($caminhoImagem)){					
						$sql = "DELETE FROM propagandaescola WHERE id = " . $propagandaId;
						$resultado = pg_query ( $sql );
				
						pg_close ();					
					}else{
						$msg = "Erro ao tentar excluir a propaganda";
					}
			
					header ( "Location:propaganda.php?msg=" . urlencode ( utf8_encode ( $msg ) ) . "" );
					exit ();
				}
				break;
		
		default :
			break;
	}
} else {
	header ( "Location:admin.php" );
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->

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

	<div id="admin_topo">CMS DO SITE</div>
	<?php
	include "../php/menu_admin.php";
	?>
  <div role="main" id="main">

		<p>Seu texto foi gravado com sucesso!</p>

		<div id="form"></div>
		<div class="clear"></div>
	</div>
	<!-- fim da div main -->
	<?php
	include "../php/js.php";
	?>
  
</body>
</html>