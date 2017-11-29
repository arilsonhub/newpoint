<?php
class TesteValidator {

	public function validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
	  //Trata os parâmetros iduf e idunidade
	  $idunidade = (isset($parametros['idunidade']) ? $parametros['idunidade'] : "");
	  $idestado  = (isset($parametros['idestado']) ? $parametros['idestado'] : "");
	  
      //Seta a codificação de caracteres para UTF-8
	  $Validator->encode = false;
	  
	  //Define as regras de validação
	  $Validator->set($parametros['nome'], 'Campo nome é obrigatório' ,'nome', 'erro_nome')->obrigatorio()
	            ->set($parametros['email'], 'Campo e-mail é obrigatório' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inválido' ,'email', 'erro_email')->email()				
				->set($parametros['telefone'], '' ,'telefone', 'erro_telefone')
				     ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['celular'], 'No mínimo um telefone precisa ser informado' ,'celular', 'erro_celular')
					 ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['telefone'], 'Telefone com formato inválido' ,'telefone', 'erro_telefone')->telefone()
				->set($parametros['celular'], 'Celular com formato inválido' ,'celular', 'erro_celular')->telefone()
				->set($parametros['endereco'], 'Campo endereço é obrigatório' ,'endereco', 'erro_endereco')->obrigatorio()
				->set($parametros['numero'], 'Campo número é obrigatório' ,'numero', 'erro_numero')->obrigatorio()
				->set($parametros['numero'], 'Campo número deve ser numérico' ,'numero', 'erro_numero')->numerico()
				->set($parametros['bairro'], 'Campo bairro é obrigatório' ,'bairro', 'erro_bairro')->obrigatorio()				
				->set($idunidade, 'Selecione a unidade' ,'idunidade', 'erro_unidade')->obrigatorio()
				->set($idestado, 'Selecione o estado' ,'idestado', 'erro_uf')->obrigatorio();
	
      //Retorna os erros	
      return $Validator->getErrors();
   }
   
   public function validarEmail($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
      //Seta a codificação de caracteres para UTF-8
	  $Validator->encode = false;
	  
	  //Define as regras de validação
	  $Validator->set($parametros['email'], 'Campo e-mail é obrigatório' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inválido' ,'email', 'erro_email')->email();
	
      //Retorna os erros	
      return $Validator->getErrors();
   }
}
?>