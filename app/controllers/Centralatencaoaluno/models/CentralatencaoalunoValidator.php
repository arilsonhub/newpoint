<?php
class CentralatencaoalunoValidator {

  public function Validar($parametros){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');   
	  
      //Converte para UTF-8
      $Validator->encode = true;	  
	  	  
	  //Recebe os dados
      $curso     = (isset($parametros['curso'][0]) ? $parametros['curso'] : "");
      $professor = (isset($parametros['professor'][0]) ? $parametros['professor'] : "");
      $dia       = (isset($parametros['dia'][0]) ? $parametros['dia'] : "");
      $horario   = (isset($parametros['horario'][0]) ? $parametros['horario'] : "");
		  
	  $Validator
	  ->set($parametros['nome'], 'Campo nome é obrigatório' ,'nome', 'baixo form fieldset #erro_nome_central')->obrigatorio()
	  ->set($parametros['telefone'], 'Campo telefone é obrigatório' ,'telefone', 'baixo form fieldset #erro_telefone_central')->obrigatorio()
	  ->set($parametros['unidade'], 'Selecione a unidade' ,'unidade', 'baixo form fieldset #erro_unidade')->obrigatorio()
	  ->set($curso, 'Selecione o curso' ,'curso', 'baixo form fieldset #erro_curso')->obrigatorio()
	  ->set($professor, 'Selecione o professor' ,'professor', 'baixo form fieldset #erro_professor')->obrigatorio()
	  ->set($dia, 'Selecione o dia' ,'dia', 'baixo form fieldset #erro_dia')->obrigatorio()
	  ->set($horario, 'Selecione o horário' ,'horario', 'baixo form fieldset #erro_horario')->obrigatorio();
	  		
      //Retorna os erros encontrados
      return $Validator->getErrors();
  }
}
?>