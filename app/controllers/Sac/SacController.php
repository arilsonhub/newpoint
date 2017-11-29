<?php
   /**
    * Controller Index
	* @author Linea Comunicação com Design - http://www.lineacom.com.br
    *
    */
   class SacController extends ControllerBase{
   	
        /* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
		 * Params String Action -> Ação a ser Executada Pelo Controller	 	
		 * Atenção Demais Métodos do Controller Devem ser Privados 
		*/
		public function SacController($controller,$action,$urlparams){
			 //Inicializa os parâmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Ações Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
				
			$recordset_banners = $this->Delegator("SacDAO","getBanners");
			//Solicita os assuntos disponíveis
			$recordset_assuntos = $this->Delegator("SacDAO","buscarAssuntos");
			//Anexa os assuntos na view
			$this->View()->assign('recordset_assuntos',$recordset_assuntos);
			//Solicita as unidades disponíveis
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
	   		
			//Verifica se uma requisição post foi disparada
	        if($_SERVER['REQUEST_METHOD'] == "POST"){
			 
			     //Solicita a gravação dos dados do formulário
			     $this->Delegator('SacDAO', 'cadastrar', $this->getPost());
				 
			}
	   }
}
?>