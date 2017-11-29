<?php
   /**
    * Controller Index
	* @author Linea Comunica��o com Design - http://www.lineacom.com.br
    *
    */
   class CursosController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function CursosController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   			   		
			
			//Solicita os banners
			$recordset_banners = $this->Delegator("CursosDAO","getBanners");
			//Solicita os cursos disponiveis
			$recordset_cursos = $this->Delegator("CursosDAO","listarCursos");
			//Solicita as unidades dispon�veis
			$recordset_unidades = $this->Delegator("CursosDAO","buscarUnidades");			
			//Anexa o Helper na view			
			$this->View()->assign('Helper',HelperFactory::getInstance());
			//Anexa as unidades na view
			$this->View()->assign('recordset_unidades',$recordset_unidades);
			//Anexa os cursos na view
			$this->View()->assign('recordset_cursos',$recordset_cursos);
			//Anexa os banners na view
			$this->View()->assign('recordset_banners',$recordset_banners);
	   		//Apresenta a view
		   	$this->View()->display('cursos.php');
	   }
	   
	   private function detalhesmodulo(){
	   
			//Dados da modulo
			$dados_modulo = false;
			
		    //Verifica se o id da noticia foi informado
		    if($this->getParam('id') !== false){
		 
		        //Solicita os dados do m�dulo
			    $dados_modulo = $this->Delegator("CursosDAO","getModuloById",$this->getParam()); 				
			}			
			
			//Anexa os dados do modulo na view
			$this->View()->assign('dados_modulo',$dados_modulo);				
	        //Apresenta a view
		   	$this->View()->display('descricao.php');
	   }
}
?>