<?php
/**
 * Nivelamentoquestoes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Nivelamentoquestoes extends BaseNivelamentoquestoes
{
   //Álias da Tabela
   private $table_alias = "Nivelamentoquestoes nq";
   
   public function getPerguntas(){   
	   try {	   
	    /*		
			( TotalQuestões / QuestõesCorretas ) * 100 = %

			E.g.:

			20 / 4 = 0.2
			0.2 * 100 = 20
			20 %		
		*/	   
	     //Instancia a classe de Manutenção do Doctrine
	     $manager = Doctrine_Manager::getInstance();
		 //Solicita a conexão atual com o banco
		 $dbh = $manager->getCurrentConnection();
		 
		 //SQL a ser executado
		 $sql = "SELECT geraQuestionario()";
		 
		 //Prepara a query
		 $sth = $dbh->prepare($sql);
		 //Executa a query
		 $sth->execute();
		 //Recebe o resultado
		 $result = $sth->fetch(PDO::FETCH_ASSOC);
		 
		 //Requisita a biblioteca do JSON
		 LibFactory::getInstance(null,null,'Zend/Json.php');
		 
		 //Transforma o json recebido na query em um Array
		 $recordset = Zend_Json::decode($result['geraquestionario']);
		 
		 //retorna os dados
		 return $recordset;
	   
	   }catch(DOCTRINE_EXCEPTION $e){
	      //echo $e->getMessage(); exit();
	      //Tratar exceção	
          return false;		  
	   }
   }
}