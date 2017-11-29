<?php
class AulademonstrativaDAO extends Aulademonstrativa {

	public function cadastrar($parametros){

		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validação
		$ValidationComponent = getComponent('Validator','Validator');
		
		//Valida os dados
		$resultado_validacao = $ValidationComponent->validar($parametros);
		
		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0){
		
			//Trata os dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,true,null,null);
			//Insere os dados
			$flag = parent::cadastrar($parametros);
			
			//Verifica se os dados foram gravados
			if($flag == true){
			
			    //Dispara um e-mail para a unidade selecionada
			    $this->EnviarEmail($parametros);
			
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
	
	//Efetua o disparo de e-mail com os dados informados
	private function EnviarEmail($parametros){

		$layout  = "<html><head><title>E-mail</title>";
		$layout .= "<meta http-equiv=Content-Type content=text/html; charset=iso-8859-1>";
		$layout	.= "</head><body>";
		$layout	.= "<p>Nome: ".$parametros['nome']."</p>";
		$layout	.= "<p>E-mail: ".$parametros['email']."</p>";
		$layout .= "<p>Celular: ".$parametros['celular']."</p>";
		$layout .= "<p>Horário: ".$parametros['horario']."</p>";
		$layout .= "</body></html>";

	    //Busca o registro da unidade selecionada no banco de dados
	    $unidade_selecionada = TableFactory::getInstance('Unidades')->buscarUnidades($parametros['idunidade']);
		
		//Instancia o Helper de E-mail
		$simpleMailHelper = HelperFactory::getInstance('simplemail');
		//Seta os atributos
		$simpleMailHelper->setEmailRemetente(MAIL_FROM);
		$simpleMailHelper->setDestinatario($unidade_selecionada['email']);
		$simpleMailHelper->setReply($unidade_selecionada['email']);
		$simpleMailHelper->setAssunto("Envio de Formulário: Aula Demonstrativa");
		$simpleMailHelper->setConteudo($layout);
		//Tenta enviar o E-mail
		return $simpleMailHelper->sendMail();		
    }
}
?>