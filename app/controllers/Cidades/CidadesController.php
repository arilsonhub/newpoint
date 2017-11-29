<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class CidadesController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function CidadesController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
	   
	   private function getcidadesjson(){
	       
		   if($_SERVER['REQUEST_METHOD'] == "POST"){
		   
				$recordset = $this->delegator("CidadesDAO","getCidadesByEstado",$this->getPost());
				
				//Requisita a biblioteca do JSON
				LibFactory::getInstance(null,null,'Zend/Json.php');
		
				//Envia os dados em formato JSON
				echo Zend_Json::encode($recordset);
		   }
	   }
}
?>