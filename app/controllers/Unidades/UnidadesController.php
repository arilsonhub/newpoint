<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class UnidadesController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function UnidadesController($controller,$action,$urlparams){
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