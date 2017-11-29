<?php
   /**
    * Controller do Teste de Nivelamento
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class TesteController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function TesteController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   			   		
			
			//Solicita os estados cadastrados
			$recordset_estados = $this->delegator("TesteDAO","getEstados");
			
			//Anexa os estados na view
			$this->View()->assign('recordset_estados',$recordset_estados);
	   		//Apresenta a view
		   	$this->View()->display('cadastro.php');
	   }
	   
	   private function cadastrar(){
	   
			//Verifica se uma requisi��o post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a grava��o dos dados do formul�rio
			     $this->Delegator('TesteDAO', 'cadastrar', $this->getPost());				 
			}
	   }
	   
	   private function logaremail(){
			
			//Verifica se uma requisi��o post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			     //Solicita a valida��o de e-mail
			     $this->Delegator('TesteDAO', 'logarEmail', $this->getPost());				 
			}
	   }
	   
	   private function provateste(){
	   
			//Verifica se o usu�rio tem autoriza��o para fazer a prova
			if(isset($_SESSION['provaFlag'])){				
				
				//Busca as perguntas do banco
				$recordsetPerguntas = $this->Delegator('TesteDAO','getPerguntas');

				//Verifica se perguntas foram encontradas
				if($recordsetPerguntas !== false){
				
					//Cria uma vari�vel para acumular o total de perguntas
					$totalPerguntas = 0;
					foreach($recordsetPerguntas as $nivel){
						//Soma as perguntas
						$totalPerguntas += count($nivel);
					}
					
					//Recebe total de perguntas
					$_SESSION['totalPerguntas'] = $totalPerguntas;
				}
				
				//Coloca o nome do candidato na view
				$this->View()->assign('nome_candidato',$_SESSION['nomeCandidato']);
				//Coloca as perguntas na view				
				$this->View()->assign('recordsetPerguntas',$recordsetPerguntas);
				//Permiss�o concedida para fazer a prova, exibindo a view de perguntas
				$this->View()->display('perguntas.php');
				
			}else{
			
				//Redireciona o usu�rio para tela de cadastro
				HelperFactory::getInstance('redirector')->goToControllerAction('Teste','index');
			}
	   }
	   
	   private function notafinal(){
	   
	        //Flag de controle
			$gotoIndex = false;
	   
		    //Verifica se o usu�rio tem autoriza��o para ver a nota final
			if(isset($_SESSION['provaFlag'])){				
			
			    if($_SERVER['REQUEST_METHOD'] == "POST"){
				
					//Total de perguntas
					$totalPerguntas = $_SESSION['totalPerguntas'];
					//N�mero de acertos
					$numeroAcertos = 0;					
					//Niveis de dificuldade
					$Niveis = array('nivel_1_alternativa','nivel_2_alternativa','nivel_3_alternativa','nivel_4_alternativa');
					//Flag para verificar se o aluno respondeu no m�nimo uma pergunta
					$flagRespondeuMinimoUmaPergunta = false;					
					
					//Percorre o question�rio
					foreach($Niveis as $nivel){
					
					    //Recebe as quest�es do n�vel
					    $nivelQuestoes = $this->getPost($nivel);
						
						//Valida o n�vel de quest�es
						if($nivelQuestoes !== false){
							//Altera a flag indiciando que o aluno respondeu no m�nimo uma pergunta
							$flagRespondeuMinimoUmaPergunta = true;
							//Percorre as quest�es
							foreach($nivelQuestoes as $questao => $resposta){
								//Verifica se alternativa escolhida � a correta para esta quest�o
								if($resposta == "1"){
								   //Incrementa acertos
								   $numeroAcertos++;
								}
							}
						}
					}
					
					//Verifica se o aluno respondeu o question�rio
					if(!$flagRespondeuMinimoUmaPergunta){
						//Retorna ao question�rio e exibe o erro
						$this->View()->assign('nenhumaResposta',utf8_encode('Voc� n�o respondeu nenhuma pergunta'));
						$this->provateste();
						return;
					}
					
					//Grava a nota no banco
					$resultadoNota = $this->Delegator('TesteDAO','gravarNota',array('notaFinal' => $numeroAcertos));
					
					//Manda o nome do aluno pra view
					$this->View()->assign('nomeCandidato',$_SESSION['nomeCandidato']);
					//Manda o total de perguntas pra view
					$this->View()->assign('totalPerguntas',$totalPerguntas);
					//Manda o total de acertos para a view
					$this->View()->assign('numeroAcertos',$numeroAcertos);
					//Flag grava��o da nota
					$this->View()->assign('flagGravacaoNota',$resultadoNota);
					
					//Limpa a sess�o
					unset($_SESSION);
					//Destr�i a sess�o
					session_destroy();
					//Exibe o resultado final na view
					$this->View()->display('nota.php');
					
				}else{				   
				   //Volta pro inicio
				   $gotoIndex = true;
				}
				
			}else{				
				//Volta pro inicio
				$gotoIndex = true;
			}
			
			//Se deve voltar ao inicio ent�o faz o redirecionamento
			if($gotoIndex){
				//Redireciona o usu�rio para tela de cadastro
				HelperFactory::getInstance('redirector')->goToControllerAction('Teste','index');
			}
	   }
}
?>