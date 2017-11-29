<?php
class QuerosabermaisValidator {

  public function Validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');  

	  //Setando codifica��o para UTF-8
	  $Validator->encode = true;
	  	  
	  $Validator
	  ->set($parametros['idcurso'], 'Selecione o curso' ,'idcurso', 'erro_idcurso')->obrigatorio()	  
	  ->set($parametros['nome'], 'Campo nome � obrigat�rio' ,'nome', 'erro_nome_quero_saber_mais')->obrigatorio()	  
	  ->set($parametros['telefone'], '' ,'telefone', 'erro_telefone')
				 ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
	  ->set($parametros['celular'], 'No m�nimo um telefone precisa ser informado' ,'celular', 'erro_celular')
				 ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
	  ->set($parametros['telefone'], 'Telefone com formato inv�lido' ,'telefone', 'erro_telefone')->telefone()
	  ->set($parametros['celular'], 'Celular com formato inv�lido' ,'celular', 'erro_celular')->telefone()
	  ->set($parametros['idunidade'], 'Selecione a unidade' ,'idunidade', 'erro_idunidade')->obrigatorio()
	  ->set($parametros['observacoes'], 'Campo observa��es � obrigat�rio' ,'observacoes', 'erro_observacoes')->obrigatorio();
				
      //Retorna os erros encontrados
      return $Validator->getErrors();
  }
}
?>