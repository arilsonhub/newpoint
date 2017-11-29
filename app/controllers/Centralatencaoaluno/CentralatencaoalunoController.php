<?php
   /**
    * Controller Index
	* @author Linea Comunicaзгo com Design - http://www.lineacom.com.br
    *
    */
   class CentralatencaoalunoController extends ControllerBase{
   	
        /* Mйtodo Construtor do Controller(Obrigatуrio Conter em Todos os Controllers)
		 * Params String Action -> Aзгo a ser Executada Pelo Controller	 	
		 * Atenзгo Demais Mйtodos do Controller Devem ser Privados 
		*/
		public function CentralatencaoalunoController($controller,$action,$urlparams){
			 //Inicializa os parвmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
	   
	   /**
	    * Cadastra um novo registro na base de dados
	    */
	   private function cadastrar(){ 		   		
	   		
			//Verifica se uma requisiзгo post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a gravaзгo dos dados do formulбrio
			     $this->Delegator('CentralatencaoalunoDAO', 'cadastrar', $this->getPost());
				 
			}
	   }
}
?>