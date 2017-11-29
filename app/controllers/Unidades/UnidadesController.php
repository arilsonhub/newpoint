<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class UnidadesController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function UnidadesController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita os dados dos banners
			$recordset_banners = $this->Delegator('UnidadesDAO','getBanners');
			
			//Busca as unidades
			$recordset_unidades = $this->delegator("UnidadesDAO","getUnidades");
			
			//Anexa os dados na view
			$this->View()->assign('recordset_unidades',$recordset_unidades);
			$this->View()->assign('recordset_banners',$recordset_banners);			
	   		//Apresenta a view
		   	$this->View()->display('unidades.php');
	   }
	   
	   private function getUnidadeDados(){
	       
		   if($_SERVER['REQUEST_METHOD'] == "POST"){
		   
				$recordset = $this->delegator("UnidadesDAO","getUnidadeDados",$this->getPost());
				
				//Requisita a biblioteca do JSON
				LibFactory::getInstance(null,null,'Zend/Json.php');
		
				//Envia os dados em formato JSON
				echo Zend_Json::encode($recordset);
		   }
	   }	   
	   
	   private function getunidadesjson(){
	       
		   if($_SERVER['REQUEST_METHOD'] == "POST"){
		   
				$recordset = $this->delegator("UnidadesDAO","getUnidadesByEstado",$this->getPost());
				
				//Requisita a biblioteca do JSON
				LibFactory::getInstance(null,null,'Zend/Json.php');
		
				//Envia os dados em formato JSON
				echo Zend_Json::encode($recordset);
		   }
	   }
	   
	  private function getProfessorByUnidade(){
	  
	      if($_SERVER['REQUEST_METHOD'] == "POST"){
		   
				$recordset = $this->delegator("UnidadesDAO","getProfessorByUnidade",$this->getPost());
				
				//Requisita a biblioteca do JSON
				LibFactory::getInstance(null,null,'Zend/Json.php');
		
				//Envia os dados em formato JSON
				echo Zend_Json::encode($recordset);
		   }    
	  }
}
?>