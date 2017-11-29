<?php
class Validator{

  public function validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
	  //Setando codificação UTF-8
	  $Validator->encode = true;
	  	  
	  $Validator->set($parametros['nome'], 'Campo nome é obrigatório' ,'nome', 'erro_nome')->obrigatorio()
	            ->set($parametros['email'], 'Campo e-mail é obrigatório' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inválido' ,'email', 'erro_email')->email()
				->set($parametros['idunidade'], 'Selecione a unidade' ,'idunidade', 'erro_unidade')->obrigatorio()				
				->set($parametros['telefone'], '' ,'telefone', 'erro_telefone')
				     ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['celular'], 'No mínimo um telefone precisa ser informado' ,'celular', 'erro_celular')
					 ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['telefone'], 'Telefone com formato inválido' ,'telefone', 'erro_telefone')->telefone()
				->set($parametros['celular'], 'Celular com formato inválido' ,'celular', 'erro_celular')->telefone()				
				->set($parametros['idturno'], 'Campo horário é obrigatório' ,'idturno', 'erro_turno')->obrigatorio();	

      return $Validator->getErrors();
  }
}
?>