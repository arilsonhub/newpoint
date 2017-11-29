<?php
class NewsletterValidator {

  public function Validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
	  //Setando codifica��o para UTF-8
	  $Validator->encode = true;
	  
	  //Seta as valida��es
	  $Validator->set($parametros['nome'], 'Campo nome � obrigat�rio' ,'nome', 'erro_nome')->obrigatorio()
	            ->set($parametros['email'], 'Campo e-mail � obrigat�rio' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inv�lido' ,'email', 'erro_email')->email();

	  //Retorna os erros			
      return $Validator->getErrors();
  }
}
?>