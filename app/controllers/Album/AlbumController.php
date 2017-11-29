<?php
   /**
    * Controller AlbumController
    */
   class AlbumController extends ControllerBase{
   
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function AlbumController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 
		  	
		  //Busca pelos albuns
	      $recordset_albuns = $this->Delegator("ConcreteAlbum","getAlbuns");
		  //Dados dos albuns
		  $this->view()->assign('recordset_albuns',$recordset_albuns);
		  //Exibe a view	
		  $this->view()->display('index_album.php');
	   }
	   
	   private function fotos(){
		
		  //Instancia o Helper
		  $Helper = HelperFactory::getInstance();		
		  //Pega o permalink(Produчуo)
		  //$Permalink = $Helper->getPermalink(5,3,null,'?');		  
		  //Pega o permalink(Localhost)
		  $Permalink = $Helper->getPermalink(5,4,null,'?');
		  //Flag erro 404
		  $flag404 = true;
		  
		  //Valida o permalink
		  if(isset($Permalink[0])){		  
			  
			  //Busca pelo album
			  $recordset_album = $this->Delegator("ConcreteAlbum","getAlbumByTag",array('tag' => $Permalink[0]));			  
			  //Verifica se o album existe
			  if($recordset_album != false){			  
			  
				  //Busca as fotos pelo Album
				  $recordset_fotos = $this->Delegator("ConcreteAlbum","getFotosByAlbum",array('id' => $recordset_album['id']));
				  //Nуo houve 404
				  $flag404 = false;
			  }
		  }		  
		  
		  //Verifica se houve erro 404
		  if($flag404 == false){
		  
		     //Dados do album
			 $this->View()->assign('recordset_album',$recordset_album);			 
		     //Anexa as fotos na view
			 $this->View()->assign('recordset_fotos',$recordset_fotos);
			 //Exibe a view
		     $this->View()->display('fotosAlbum.php');
			 
		  }else{		 

			  //Dispara erro 404
			  $Helper->send404Error();
		  }
	   }
}
?>