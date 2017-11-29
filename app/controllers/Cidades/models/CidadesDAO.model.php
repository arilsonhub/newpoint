<?php
class CidadesDAO {
   
   public function getCidadesByEstado($parametros){	    
		
		return TableFactory::getInstance('Cidades')->getCidades($parametros['estado']);
	}
}
?>