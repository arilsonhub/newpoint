<?php
class SacDAO extends Sac {

   public function buscarUnidades(){
  
	  return TableFactory::getInstance('Unidades')->buscarUnidades(); 
   }
  
   public function buscarAssuntos(){
  
	  return TableFactory::getInstance('SacAssuntos')->buscarAssuntos(); 
   }
   
   public function getBanners(){
	  
	  return TableFactory::getInstance('Banners')->getBanners();
   }
   
   public function cadastrar($parametros){
  
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validação
		$ValidationComponent = getComponent('SacValidator','SacValidator');
		
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
	    //Busca o registro da unidade selecionada no banco de dados
	    $unidade_selecionada = TableFactory::getInstance('Unidades')->buscarUnidades($parametros['idunidade']);
	    $assunto_selecionado = TableFactory::getInstance('SacAssuntos')->buscarAssuntos($parametros['idassunto']);

		$layout  = "<html><head><title>E-mail</title>";
		$layout .= "<meta http-equiv=Content-Type content=text/html; charset=iso-8859-1>";
		$layout	.= "</head><body>";
		$layout	.= "<p>Nome: ".$parametros['nome']."</p>";
		$layout	.= "<p>E-mail: ".$parametros['email']."</p>";
		$layout .= "<p>Telefone: ".$parametros['telefone']."</p>";
		$layout .= "<p>Assunto: ".$assunto_selecionado['descricao']."</p>";
		$layout .= "<p>Mensagem: ".$parametros['mensagem']."</p>";
		$layout .= "</body></html>";
		
		//Instancia o Helper de E-mail
		$simpleMailHelper = HelperFactory::getInstance('simplemail');
		//Seta os atributos
		$simpleMailHelper->setEmailRemetente(MAIL_FROM);
		$simpleMailHelper->setDestinatario($unidade_selecionada['email']);
		$simpleMailHelper->setReply($unidade_selecionada['email']);
		$simpleMailHelper->setAssunto("Envio de Formulário: Sac");
		$simpleMailHelper->setConteudo($layout);
		//Tenta enviar o E-mail
		return $simpleMailHelper->sendMail();		
    }
}
?>