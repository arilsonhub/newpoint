<?php
//Classe de acesso a dados da Entidade Cursos
class CursosDAO extends Cursos {

  public function listarCursos(){
  
      return parent::listarCursosDisponiveis();  
  }
  
  public function getModuloById($parametros){
  
      return TableFactory::getInstance('Modulos')->getModuloById($parametros['id']);
  }
  
  public function buscarUnidades(){
  
	  return TableFactory::getInstance('Unidades')->buscarUnidades(); 
  }
  
   public function getBanners(){
	  
	  return TableFactory::getInstance('Banners')->getBanners();
   }
}
?>