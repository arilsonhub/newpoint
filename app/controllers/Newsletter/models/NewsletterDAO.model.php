<?php
class NewsletterDAO extends Newsletter {

  public function cadastrar($parametros){
  
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o componente de validaчуo
		$ValidationComponent = getComponent('NewsletterValidator','NewsletterValidator');
		
		//Valida os dados
		$resultado_validacao = $ValidationComponent->validar($parametros);
		
		//Verifica o resultado da validaчуo
		if(count($resultado_validacao) == 0){
		
			//Trata os dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,true,null,null);
			//Insere os dados
			$flag = parent::cadastrar($parametros);
			
			//Verifica se os dados foram gravados
			if($flag == true){
			
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
}
?>