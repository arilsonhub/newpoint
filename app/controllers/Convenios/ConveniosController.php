<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class ConveniosController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function ConveniosController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
			
			//Busca os dados dos conv�nios 
			$recordset = $this->Delegator("EmpresaConvenioDAO","listarConvenios");
			$texto_informacoes_convenios = $this->Delegator("EmpresaConvenioDAO","buscarTextoInformacoesConvenios");			
			//Anexa os dados na View
			$this->View()->assign('dados_convenios',$recordset);
			$this->View()->assign('informacoes_convenios',$texto_informacoes_convenios);
	   		//Apresenta a View
		   	$this->View()->display('convenios.php');
	   }
}
?>