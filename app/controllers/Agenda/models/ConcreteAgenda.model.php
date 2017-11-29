<?php
/**
 * Model do Controller Index
 * O objetivo desta classe щ conectar O Controller com o seu Modelo de Abstraчуo
 * Que por sua vez conectarс o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
 *
 */
class ConcreteAgenda
{	
   public function getAgenda($parametros){
   
      return TableFactory::getInstance('Agenda')->getAgenda($parametros['limit']);
   } 

   public function getBanners(){
	  
	  return TableFactory::getInstance('Banners')->getBanners();
   }
}
?>