<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class FazbemController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function FazbemController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita os dados do banco
			$recordset = $this->Delegator("FazbemDAO","buscarInformacoesInstitucionais");
			
			//Anexa os dados na view
			$this->View()->assign("recordset",$recordset);
	   		//Apresenta a view
		   	$this->View()->display('Fazbem.php');
	   }
}
?>