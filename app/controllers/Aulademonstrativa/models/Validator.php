<?php
class Validator{

  public function validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
	  //Setando codifica��o UTF-8
	  $Validator->encode = true;
	  	  
	  $Validator->set($parametros['nome'], 'Campo nome � obrigat�rio' ,'nome', 'erro_nome')->obrigatorio()
	            ->set($parametros['email'], 'Campo e-mail � obrigat�rio' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inv�lido' ,'email', 'erro_email')->email()
				->set($parametros['idunidade'], 'Selecione a unidade' ,'idunidade', 'erro_unidade')->obrigatorio()				
				->set($parametros['telefone'], '' ,'telefone', 'erro_telefone')
				     ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['celular'], 'No m�nimo um telefone precisa ser informado' ,'celular', 'erro_celular')
					 ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['telefone'], 'Telefone com formato inv�lido' ,'telefone', 'erro_telefone')->telefone()
				->set($parametros['celular'], 'Celular com formato inv�lido' ,'celular', 'erro_celular')->telefone()				
				->set($parametros['idturno'], 'Campo hor�rio � obrigat�rio' ,'idturno', 'erro_turno')->obrigatorio();	

      return $Validator->getErrors();
  }
}
?>