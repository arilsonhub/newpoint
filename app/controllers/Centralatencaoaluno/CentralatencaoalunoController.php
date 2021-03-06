<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class CentralatencaoalunoController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function CentralatencaoalunoController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
	   
	   /**
	    * Cadastra um novo registro na base de dados
	    */
	   private function cadastrar(){ 		   		
	   		
			//Verifica se uma requisi��o post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a grava��o dos dados do formul�rio
			     $this->Delegator('CentralatencaoalunoDAO', 'cadastrar', $this->getPost());
				 
			}
	   }
}
?>