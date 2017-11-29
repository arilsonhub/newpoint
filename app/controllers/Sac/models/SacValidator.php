<?php
class SacValidator {

  public function Validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');

	  //Tratamento UTF-8
	  $Validator->encode = true;
	  	  
	  $Validator
	  ->set($parametros['nome'], 'Campo nome é obrigatório' ,'nome', 'erro_nome')->obrigatorio()
	  ->set($parametros['email'], 'Campo e-mail é obrigatório' ,'email', 'erro_email')->obrigatorio()
	  ->set($parametros['email'], 'E-mail inválido' ,'email', 'erro_email')->email()
	  ->set($parametros['telefone'], 'Campo telefone é obrigatório' ,'telefone', 'erro_telefone')->obrigatorio()
	  ->set($parametros['idunidade'], 'Selecione a unidade' ,'idunidade', 'erro_idunidade')->obrigatorio()
	  ->set($parametros['idassunto'], 'Selecione o assunto' ,'idassunto', 'erro_idassunto')->obrigatorio()
	  ->set($parametros['mensagem'], 'Campo Mensagem é obrigatório' ,'mensagem', 'erro_mensagem')->obrigatorio();
				
      //Retorna os erros encontrados
      return $Validator->getErrors();
  }
}
?>