<?php
class AulademonstrativaInformacoesDAO {

   public function getHorarios(){
   
      return TableFactory::getInstance('Turno')->getTurnos();
   }
   
   public function getUnidades(){
   
      return TableFactory::getInstance('Unidades')->buscarUnidades();
   }
}
?>