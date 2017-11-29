<?php
/**
 * Unidades
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Unidades extends BaseUnidades
{
   private $table_alias = "Unidades unit";
   
   public function buscarUnidades($id=null){
   
       try{	    	  
	   
	     //Monta a query principal
	     $query = Doctrine_Query::create()
                  ->select('unit.id , unit.email ,city.nome')
                  ->from($this->table_alias)
                  ->innerjoin('unit.Cidades city');
				  
		 //Verifica se o crit�rio de id foi especificado
         if(!is_null($id)){
		     
			//Filtra por id  
			$query->where('unit.id = ?',$id); 
			//Executa a query
			$recordset = $query->execute();
			//Retorna a unidade selecionada
			return $recordset[0];
		 }		 
				  
		 //Executa a Query - retornando todas as unidades cadastradas no banco de dados	         
		 return $query->execute();			 
		 
		 }catch(DOCTRINE_EXCEPTION $e){		 
		    //Tratamento da Exce��o			
		 }
   }
   
   public function getUnidadesByEstado($estado){
   
       try{	    	  
	   
	     //Monta a query principal
	     $query = Doctrine_Query::create()
                  ->select('unit.id , city.nome')
                  ->from($this->table_alias)
                  ->innerjoin('unit.Cidades city')
				  ->innerjoin('city.Estados uf')
				  ->where('uf.id = ?',$estado);
				  
		 //Executa a Query	         
		 return $query->execute()->toArray();			 
		 
		 }catch(DOCTRINE_EXCEPTION $e){		 
		    //Tratamento da Exce��o			
		 }
   }
   
   public function getUnidades(){
   
       try{	    	  
	   
	     //Monta a query principal
	     $query = Doctrine_Query::create()
                  ->select('unit.id,city.nome')
                  ->from($this->table_alias)
                  ->innerjoin('unit.Cidades city');				  
				  
		 //Executa a Query	         
		 return $query->execute();			 
		 
		 }catch(DOCTRINE_EXCEPTION $e){		 
		    //Tratamento da Exce��o			
		 }
   }
   
   public function getUnidadeDados($idunidade){
   
       try{
	   
	     //Monta a query principal
	     $query = Doctrine_Query::create()
                  ->select('unit.*,uf.*, city.nome as titulo_unidade')
                  ->from($this->table_alias)
                  ->innerjoin('unit.Unidadesfotos uf')
				  ->innerjoin('unit.Cidades city')
				  ->where('unit.id = ?',$idunidade);	
				  
		 //Executa a Query	         
		 return $query->execute()->toArray();			 
		 
		 }catch(DOCTRINE_EXCEPTION $e){		    
		    //Tratamento da Exce��o			
		 }
   }   
}