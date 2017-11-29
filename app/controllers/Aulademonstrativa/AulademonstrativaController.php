<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class AulademonstrativaController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function AulademonstrativaController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita as informaчѕes do formulсrio
			$recordset_horarios = $this->Delegator('AulademonstrativaInformacoesDAO','getHorarios');
			$recordset_unidades = $this->Delegator('AulademonstrativaInformacoesDAO','getUnidades');
			
			//Anexa os dados na view
			$this->View()->assign('dados_horarios',$recordset_horarios);
			$this->View()->assign('dados_unidades',$recordset_unidades);
	   		//Apresenta a view
		   	$this->View()->display('aula_demonstrativa.php');
	   }
	   
	   private function cadastrar(){
	        
			//Verifica se uma requisiчуo post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a gravaчуo dos dados do formulсrio
			     $this->Delegator('AulademonstrativaDAO', 'cadastrar', $this->getPost());
				 
			}else{
			
				//Apresenta a view
				$this->View()->display('aula_demonstrativa.php');
			}
	   }
}
?>