<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class AulademonstrativaController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function AulademonstrativaController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita as informa��es do formul�rio
			$recordset_horarios = $this->Delegator('AulademonstrativaInformacoesDAO','getHorarios');
			$recordset_unidades = $this->Delegator('AulademonstrativaInformacoesDAO','getUnidades');
			
			//Anexa os dados na view
			$this->View()->assign('dados_horarios',$recordset_horarios);
			$this->View()->assign('dados_unidades',$recordset_unidades);
	   		//Apresenta a view
		   	$this->View()->display('aula_demonstrativa.php');
	   }
	   
	   private function cadastrar(){
	        
			//Verifica se uma requisi��o post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a grava��o dos dados do formul�rio
			     $this->Delegator('AulademonstrativaDAO', 'cadastrar', $this->getPost());
				 
			}else{
			
				//Apresenta a view
				$this->View()->display('aula_demonstrativa.php');
			}
	   }
}
?>