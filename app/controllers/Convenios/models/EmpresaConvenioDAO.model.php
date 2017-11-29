<?php
class EmpresaConvenioDAO extends Empresaconvenio {

  public function listarConvenios(){
  
      return parent::listarConvenios();  
  }
  
  public function buscarTextoInformacoesConvenios(){
  
    $informacoes = TableFactory::getInstance('Instituicao')->buscarInformacoesInstitucionais();
	return $informacoes['texto_empresas_conveniadas'];
  }
}
?>