<?php
class UnidadesDAO {
   
   public function getUnidadesByEstado($parametros){	    
		
		return TableFactory::getInstance('Unidades')->getUnidadesByEstado($parametros['estado']);
   }
   
   public function getProfessorByUnidade($parametros){	    
		
		return TableFactory::getInstance('Usuario')->getProfessorByUnidade($parametros['idunidade']);
   }
   
   public function getUnidades(){	    
		
		return TableFactory::getInstance('Unidades')->getUnidades();
   }
   
   public function getUnidadeDados($parametros){	    
		
		return TableFactory::getInstance('Unidades')->getUnidadeDados($parametros['idunidade']);
   }
   
   public function getBanners(){
	  
	  return TableFactory::getInstance('Banners')->getBanners();
   }
}
?>