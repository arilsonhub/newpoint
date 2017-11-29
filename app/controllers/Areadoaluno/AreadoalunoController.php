<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
    *
    */
   class AreadoalunoController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function AreadoalunoController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		
	   		
			//Foto editсvel Сrea do aluno
			$recordset_foto_editavel = $this->Delegator("AreadoalunoDAO","getInstitucional");
			
			//Busca pelos albuns
			$recordset_albuns = $this->Delegator("AreadoalunoDAO","getAlbuns");			
			
			//Solicita os banners
			$recordset_banners = $this->Delegator("AreadoalunoDAO","getBanners");
			
			//Solicita os dados da agenda
			$recordset_agenda = $this->Delegator('AreadoalunoDAO','getAgenda');
			
			//Solicita as 4 noticias mais lidas
			$recordset_mais_lidas = $this->Delegator('AreadoalunoDAO','getNoticiasMaisLidas');
			
			//Solicita as 3 њltimas notэcias
			$recordset_ultimas_noticias = $this->Delegator('AreadoalunoDAO','getUltimasNoticias');
			
			//Anexa os dados na view			
			$this->View()->assign('recordset_foto_editavel',$recordset_foto_editavel);
			$this->View()->assign('recordset_agenda',$recordset_agenda);
			$this->View()->assign('dados_mais_lidas',$recordset_mais_lidas);
			$this->View()->assign('dados_ultimas_noticias',$recordset_ultimas_noticias);			
			$this->View()->assign('recordset_banners',$recordset_banners);
			//Dados dos albuns
			$this->view()->assign('recordset_albuns',$recordset_albuns);
	   		//Apresenta a view
		   	$this->View()->display('area_aluno.php');
	   }
}
?>