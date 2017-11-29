<?php
class AreadoalunoDAO {

  public function getAgenda(){
   
      return TableFactory::getInstance('Agenda')->getAgenda();
  } 

  public function getUltimasNoticias(){
  
     return TableFactory::getInstance('Noticia')->BuscarNoticias('n.id desc','3');
  }
  
  public function getNoticiasMaisLidas(){
  
     return TableFactory::getInstance('Noticia')->BuscarNoticias('n.rank desc','4');
  }
  
  public function getBanners(){
	  
	  return TableFactory::getInstance('Banners')->getBanners();
   }
   
   public function getAlbuns(){
   
	  return TableFactory::getInstance('Album')->getAlbuns(4,'al.id DESC');
   }
   
   public function getInstitucional(){
   
	  return TableFactory::getInstance('Instituicao')->buscarInformacoesInstitucionais();
   }
}
?>