<?php
class CentralatencaoalunoDAO {
   
   //Valida os dados do usuário e solicita o envio de e-mail
   public function cadastrar($parametros){
  
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validação
		$ValidationComponent = getComponent('CentralatencaoalunoValidator','CentralatencaoalunoValidator');
		
		//Valida os dados
		$resultado_validacao = $ValidationComponent->validar($parametros);
		
		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0){
		
			//Trata os dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,true,null,null);
			//Insere os dados
			$flag = $this->EnviarEmail($parametros);
			
			//Verifica se os dados foram gravados
			if($flag == true){
			
				//Dados inseridos com sucesso
				echo Zend_Json::encode(array('1'));
				
			}else{
			   
				//Erro ao enviar o e-mail
				echo Zend_Json::encode(array('0'));
			}
		
		}else{
		
			//Ocorreu um erro na validacao
			echo Zend_Json::encode($resultado_validacao);
		}
    }
	
	//Efetua o disparo de e-mail com os dados informados
	private function EnviarEmail($parametros){

		$layout  = "<html><head><title>E-mail</title>";
		$layout .= "<meta http-equiv=Content-Type content=text/html; charset=iso-8859-1>";
		$layout	.= "</head><body>";
		$layout	.= "<p>Nome: ".$parametros['nome']."</p>";
		$layout .= "<p>Telefone: ".$parametros['telefone']."</p>";
		$layout .= "<p>Professor: ".$parametros['professor']."</p>";
		$layout .= "<p>Dia: ".$parametros['dia']." às ".$parametros['horario']."</p>";
		$layout .= "</body></html>";

	    //Busca o registro da unidade selecionada no banco de dados
	    $unidade_selecionada = TableFactory::getInstance('Unidades')->buscarUnidades($parametros['unidade']);
		
		//Instancia o Helper de E-mail
		$simpleMailHelper = HelperFactory::getInstance('simplemail');
		//Seta os atributos
		$simpleMailHelper->setEmailRemetente(MAIL_FROM);
		$simpleMailHelper->setDestinatario($unidade_selecionada['email']);
		$simpleMailHelper->setReply($unidade_selecionada['email']);
		$simpleMailHelper->setAssunto("Envio de Formulário: Central de Atenção ao Aluno");
		$simpleMailHelper->setConteudo($layout);
		//Tenta enviar o E-mail
		return $simpleMailHelper->sendMail();		
    }		
}
?>