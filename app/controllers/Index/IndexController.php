<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class IndexController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function IndexController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita os dados dos banners
			$recordset_banners = $this->Delegator('ConcreteIndex','getBanners');
			
			//Solicita os dados da agenda
			$recordset_agenda = $this->Delegator('ConcreteIndex','getAgenda',array('limit' => 4));
			
			//Anexa os dados na view
			$this->View()->assign('recordset_agenda',$recordset_agenda);			
			$this->View()->assign('recordset_banners',$recordset_banners);			
	   		//Apresenta a view
		   	$this->View()->display('index.php');
	   }
}
?>