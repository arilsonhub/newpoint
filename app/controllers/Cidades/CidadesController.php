<?php
   /**
    * Controller Index
	* @author Linea Comunicaзгo com Design - http://www.lineacom.com.br
    *
    */
   class CidadesController extends ControllerBase{
   	
        /* Mйtodo Construtor do Controller(Obrigatуrio Conter em Todos os Controllers)
		 * Params String Action -> Aзгo a ser Executada Pelo Controller	 	
		 * Atenзгo Demais Mйtodos do Controller Devem ser Privados 
		*/
		public function CidadesController($controller,$action,$urlparams){
			 //Inicializa os parвmetros da SuperClasse
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