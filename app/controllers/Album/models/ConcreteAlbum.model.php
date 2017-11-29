<?php
/**
 * Model do Controller Album
 * O objetivo desta classe � conectar O Controller com o seu Modelo de Abstra��o
 * Que por sua vez conectar� o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
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