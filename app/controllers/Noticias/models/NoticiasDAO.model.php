<?php
class NoticiasDAO extends Noticia {

  public function listarNoticias($parametros){
  
      return parent::BuscarNoticias('id desc',null,$parametros['pagina']);
  }
  
  public function getNoticiaById($parametros){
  
      return parent::getNoticiaById($parametros['id']);
  }
  
  public function getBanners(){
	  
	  return TableFactory::getInstance('Banners')->getBanners();
   }
}
?>