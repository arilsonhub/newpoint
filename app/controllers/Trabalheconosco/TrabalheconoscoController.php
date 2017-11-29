<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class TrabalheconoscoController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function TrabalheconoscoController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Solicita os cargos cadastrados
			$recordset_cargos = $this->delegator("TrabalheconoscoDAO","getCargos");
			
			//Solicita os estados cadastrados
			$recordset_estados = $this->delegator("TrabalheconoscoDAO","getEstados");
			
			//Anexa os cargos na view
			$this->View()->assign('recordset_cargos',$recordset_cargos);
			//Anexa os estados na view
			$this->View()->assign('recordset_estados',$recordset_estados);
	   		//Apresenta a view
		   	$this->View()->display('trabalheconosco.php');
	   }
	   
	   private function cadastrar(){
	   
	       if($_SERVER['REQUEST_METHOD'] == "POST"){
		     
			  //Recebe a resposta do JSON
		      $json_return = $this->delegator("TrabalheconoscoDAO","cadastrar",$this->getPost());
			  //Inclui o arquivo que recebe o retorno do JSON
			  include("web_files/js/controllers/Trabalheconosco/formularioTrabalheConoscoJson.php");
		   }
	   }
}
?>