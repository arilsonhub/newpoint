<?php
/**
 * Model do Controller Album
 * O objetivo desta classe щ conectar O Controller com o seu Modelo de Abstraчуo
 * Que por sua vez conectarс o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
 *
 */
class ConcreteAlbum
{	

   public function getAlbumByTag($parametros){
   
		return TableFactory::getInstance('Album')->getAlbumByTag($parametros['tag']);
   }
   
   public function getFotosByAlbum($parametros){
		
		return TableFactory::getInstance('Galeriafotos')->getFotosByAlbum($parametros['id']);
   }
   
   public function getAlbuns(){
   
		return TableFactory::getInstance('Album')->getAlbuns();
   }
}
?>