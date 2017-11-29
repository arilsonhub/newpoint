<?php
class NewsletterValidator {

  public function Validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
	  //Setando codificação para UTF-8
	  $Validator->encode = true;
	  
	  //Seta as validações
	  $Validator->set($parametros['nome'], 'Campo nome é obrigatório' ,'nome', 'erro_nome')->obrigatorio()
	            ->set($parametros['email'], 'Campo e-mail é obrigatório' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inválido' ,'email', 'erro_email')->email();

	  //Retorna os erros			
      return $Validator->getErrors();
  }
}
?>