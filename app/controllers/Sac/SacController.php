<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class SacController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function SacController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
				
			$recordset_banners = $this->Delegator("SacDAO","getBanners");
			//Solicita os assuntos dispon�veis
			$recordset_assuntos = $this->Delegator("SacDAO","buscarAssuntos");
			//Anexa os assuntos na view
			$this->View()->assign('recordset_assuntos',$recordset_assuntos);
			//Solicita as unidades dispon�veis
			$recordset_unidades = $this->Delegator("SacDAO","buscarUnidades");
			//Anexa as unidades na view
			$this->View()->assign('recordset_unidades',$recordset_unidades);
			//Anexa os banners na view
			$this->View()->assign('recordset_banners',$recordset_banners);
	   		//Apresenta a view
		   	$this->View()->display('sac.php');
	   }
	   
	   /**
	    * Cadastra um novo registro na base de dados
	    */
	   private function cadastrar(){ 		   		
	   		
			//Verifica se uma requisi��o post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a grava��o dos dados do formul�rio
			     $this->Delegator('SacDAO', 'cadastrar', $this->getPost());
				 
			}
	   }
}
?>