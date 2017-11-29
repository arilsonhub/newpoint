<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class NoticiasController extends ControllerBase{
   
       private $bannersRecordset;
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function NoticiasController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Solicita os banners
			 $this->bannersRecordset = $this->Delegator("NoticiasDAO","getBanners");
			 //Envia o Controller para a action solicitada
			 $this->$action();			
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Inicializa o array de parametros
			$parametros = array();
			//Valida e recebe a pagina atual de noticias
			$parametros['pagina'] = ($this->getParam('pagina') !== false ? $this->getParam('pagina') : null);
			
			//Solicita os dados das noticias
			$recordset = $this->delegator('NoticiasDAO','listarNoticias',$parametros);
			//Anexa os dados a view
			$this->View()->assign('recordset',$recordset);
			$this->View()->assign('recordset_banners',$this->bannersRecordset);
	   		//Apresenta a view
		   	$this->View()->display('noticias.php');
	   }
	   
	   private function visualizar(){
	        
			//Dados da noticia
			$dados_noticia = false;
			
		    //Verifica se o id da noticia foi informado
		    if($this->getParam('id') !== false){
		 
				//Solicita os dados da noticia selecionada
				$dados_noticia = $this->delegator('NoticiasDAO','getNoticiaById',$this->getParam());				
			}
			
			//Anexa os dados da noticia na view
			$this->View()->assign('dados_noticia',$dados_noticia);				
			//Anexa os banners na view
			$this->View()->assign('recordset_banners',$this->bannersRecordset);
	        //Apresenta a view
		   	$this->View()->display('ver_noticia.php');
	   }
}
?>