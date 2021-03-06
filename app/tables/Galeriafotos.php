<?php
/**
 * Galeriafotos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Galeriafotos extends BaseGaleriafotos
{

   //Table Alias
   private $table_alias = "Galeriafotos g";

   //Busca os banners da base de dados
   public function getFotosByAlbum($idAlbum){
		
		try{
	    
	       $query = Doctrine_Query::create()
		           ->select('*')
				   ->from($this->table_alias)				   
				   ->innerJoin('g.Album al')
				   ->where('al.id = ?', $idAlbum);
				   
		   if($query->count() > 0){		   
		   
			   $recordset = $query->execute();			   
			   return $recordset;	   
			   
		   }else{
			   
			   return false;
		   }
	   
	   }catch(DOCTRINE_EXCEPTION $e){
	   
	      //Tratar Exceção		  
	      return false;
	   }
   }
}