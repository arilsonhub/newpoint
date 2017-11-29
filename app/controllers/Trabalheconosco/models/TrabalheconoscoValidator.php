<?php
class TrabalheconoscoValidator {


	public function validar($parametros, $uploadhelper){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
      //Seta a codifica��o de caracteres para UTF-8
	  $Validator->encode = true;
	  
	  //Define as regras de valida��o
	  $Validator->set($parametros['nome'], 'Campo nome � obrigat�rio' ,'nome', 'erro_nome')->obrigatorio()
	            ->set($parametros['email'], 'Campo e-mail � obrigat�rio' ,'email', 'erro_email')->obrigatorio()
				->set($parametros['email'], 'E-mail inv�lido' ,'email', 'erro_email')->email()				
				->set($parametros['telefone'], '' ,'telefone', 'erro_telefone')
				     ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['celular'], 'No m�nimo um telefone precisa ser informado' ,'celular', 'erro_celular')
					 ->minimoUmValorPreenchido(array($parametros['telefone'],$parametros['celular']))
				->set($parametros['telefone'], 'Telefone com formato inv�lido' ,'telefone', 'erro_telefone')->telefone()
				->set($parametros['celular'], 'Celular com formato inv�lido' ,'celular', 'erro_celular')->telefone()
				->set($parametros['endereco'], 'Campo endere�o � obrigat�rio' ,'endereco', 'erro_endereco')->obrigatorio()
				->set($parametros['numero'], 'Campo n�mero � obrigat�rio' ,'numero', 'erro_numero')->obrigatorio()
				->set($parametros['numero'], 'Campo n�mero deve ser num�rico' ,'numero', 'erro_numero')->numerico()
				->set($parametros['bairro'], 'Campo bairro � obrigat�rio' ,'bairro', 'erro_bairro')->obrigatorio()
				->set($parametros['idcargo'], 'Selecione o cargo' ,'idcargo', 'erro_cargo')->obrigatorio()
				//->set($parametros['salario'], 'Campo sal�rio � obrigat�rio' ,'salario', 'erro_salario')->obrigatorio()
				->set($parametros['idunidade'], 'Selecione a unidade' ,'idunidade', 'erro_unidade')->obrigatorio()
				->set($parametros['iduf'], 'Selecione o estado' ,'iduf', 'erro_uf')->obrigatorio()
				->set($parametros['curriculo'], 'Voc� deve anexar seu curr�culo' ,'curriculo', 'erro_cv')->obrigatorio()
				->set($parametros['curriculo'], 'O arquivo deve estar no formato pdf,doc ou docx' ,'curriculo', 'erro_cv')
				->validarMimeType($uploadhelper,array('application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document'),'curriculo')
				->set($parametros['curriculo'], 'O tamanho m�ximo do arquivo � de 2 MB' ,'curriculo', 'erro_cv')
				->validarTamanhoArquivo($uploadhelper,'curriculo',2097152);
	
      //Retorna os erros	
      return $Validator->getErrors();
   }
}
?>