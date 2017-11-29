<?php
class TrabalheconoscoDAO extends Trabalheconosco {

    public function getCargos(){
	
	    return TableFactory::getInstance('Cargos')->getCargos();
	}
	
	public function getEstados(){
	
	    return TableFactory::getInstance('Estados')->getEstados();
	}
	
	public function cadastrar($parametros){        
  
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Instancia o Helper de upload
		$uploadhelper = HelperFactory::getInstance('upload');
		
		//Recebe o arquivo
		$uploadhelper->setFile('curriculo');
		
		//Atribui o valor contido no campo file para os parametros da requisiчуo
		$parametros['curriculo'] = $uploadhelper->getFileName();
        
		//Instancia o componente de validaчуo
		$ValidationComponent = getComponent('TrabalheconoscoValidator','TrabalheconoscoValidator');
		
		//Valida os dados
		$resultado_validacao = $ValidationComponent->validar($parametros,$uploadhelper);
		
		//Verifica o resultado da validaчуo
		if(count($resultado_validacao) == 0){
		    
			//Instancia o Helper Principal
			$Helper = HelperFactory::getInstance();
			
			//Trata os dados
			$parametros = $Helper->TrataValor($parametros,null,true,null,null);		
			
			//Insere os dados
			$flag = parent::cadastrar($parametros);
			
			//Verifica se os dados foram gravados
			if($flag == true){
			    
				//Seta o caminho do upload
				$uploadhelper->setPath(UPLOAD_PATH.'curriculos/');				
                //Executa o upload do arquivo
				$uploadhelper->upload();
				
				//Dados inseridos com sucesso
				return Zend_Json::encode(array('1'));
				
			}else{
			   
				//Erro ao salvar os dados na base de dados
				return Zend_Json::encode(array('0'));
			}
		
		}else{
		
			//Ocorreu um erro na validacao
			return Zend_Json::encode($resultado_validacao);
		}
    }
}
?>