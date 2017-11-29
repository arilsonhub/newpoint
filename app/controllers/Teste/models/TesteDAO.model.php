<?php
class TesteDAO {

	public function getEstados(){
	
	    return TableFactory::getInstance('Estados')->getEstados();
	}
	
	public function logarEmail($parametros){
	
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validação
		$ValidationComponent = getComponent('TesteValidator','TesteValidator');
		
		//Valida os dados
		$resultado_validacao = $ValidationComponent->validarEmail($parametros);
		
		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0){
		
			//Instancia a tabela de candidatos
			$NivelamentoCandidatos = TableFactory::getInstance('Nivelamentocandidatos');
		
			//Trata os dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,true,null,null);
			//Valida o E-mail
			$recordset = $NivelamentoCandidatos->verificarEmail($parametros);
			
			//Verifica se o e-mail é válido
			if($recordset !== false){
			
				//Indica na sessão que este usuário tem permissão para fazer a prova
				$_SESSION['provaFlag'] = true;
				//Registra o id do usuário na Sessão
				$_SESSION['idCandidato'] = $recordset[0]['id'];
				//Registra o nome do usuário na Sessão
				$_SESSION['nomeCandidato'] = $recordset[0]['nome'];
				//Dados inseridos com sucesso
				echo Zend_Json::encode(array('1'));
				
			}else{
			   
				//Erro ao salvar os dados na base de dados
				echo Zend_Json::encode(array('0'));
			}
		
		}else{
		
			//Ocorreu um erro na validacao
			echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	public function cadastrar($parametros){
  
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validação
		$ValidationComponent = getComponent('TesteValidator','TesteValidator');
		
		//Valida os dados
		$resultado_validacao = $ValidationComponent->validar($parametros);
		
		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0){
		
			//Instancia a tabela de candidatos
			$NivelamentoCandidatos = TableFactory::getInstance('Nivelamentocandidatos');
		
			//Trata os dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,true,null,null);
			//Insere os dados
			$flag = $NivelamentoCandidatos->cadastrar($parametros);
			
			//Verifica se os dados foram gravados
			if($flag == true){
			
				//Indica na sessão que este usuário tem permissão para fazer a prova
				$_SESSION['provaFlag'] = true;
				//Autentica o usuário pelo e-mail
				$recordset = $NivelamentoCandidatos->verificarEmail($parametros);
				//Registra o id do usuário na Sessão
				$_SESSION['idCandidato'] = $recordset[0]['id'];
				//Registra o nome do usuário na Sessão
				$_SESSION['nomeCandidato'] = $recordset[0]['nome'];				
				//Dados inseridos com sucesso
				echo Zend_Json::encode(array('1'));
				
			}else{
			   
				//Erro ao salvar os dados na base de dados
				echo Zend_Json::encode(array('0'));
			}
		
		}else{
		
			//Ocorreu um erro na validacao
			echo Zend_Json::encode($resultado_validacao);
		}
  }
  
  public function getPerguntas(){
  
     //Verifica se para o usuário logado as perguntas já foram selecionadas
	 //if(isset($_SESSION['perguntasSelecionadas'])) return $_SESSION['perguntasSelecionadas'];	 	 
	 
	 //Coloca as perguntas selecionadas na sessão
	 $_SESSION['perguntasSelecionadas'] = TableFactory::getInstance('Nivelamentoquestoes')->getPerguntas();
	 
	 //Retorna as perguntas selecionadas
	 return $_SESSION['perguntasSelecionadas']; 
  }
  
  public function gravarNota($parametros){
     
	 //Recebe a nota
	 $notaFinal = $parametros['notaFinal'];
	 
	 //Grava no banco
	 return TableFactory::getInstance('Nivelamentonotas')->gravarNota($notaFinal);
  }
}
?>