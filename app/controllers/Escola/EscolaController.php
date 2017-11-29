<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class EscolaController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function EscolaController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita as informaчѕes da Escola
			$recordset = $this->Delegator('EscolaDAO','buscarInformacoesInstitucionais');
			
			//Anexa os dados na View
			$this->View()->assign('dados_escola',$recordset);
	   		//Apresenta a view
		   	$this->View()->display('aescola.php');
	   }
}
?>