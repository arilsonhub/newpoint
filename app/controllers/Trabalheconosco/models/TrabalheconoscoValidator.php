<?php
class TrabalheconoscoValidator {


	public function validar($parametros, $uploadhelper){
  
      //Requisita a Classe de Validacao
      $Validator = LibFactory::getInstance('Validation',null,'Validation/Validation.class.php');    
	  
      //Seta a codificação de caracteres para UTF-8
	  $Validator->encode = true;
	  
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
				->set($parametros['idcargo'], 'Selecione o cargo' ,'idcargo', 'erro_cargo')->obrigatorio()
				//->set($parametros['salario'], 'Campo salário é obrigatório' ,'salario', 'erro_salario')->obrigatorio()
				->set($parametros['idunidade'], 'Selecione a unidade' ,'idunidade', 'erro_unidade')->obrigatorio()
				->set($parametros['iduf'], 'Selecione o estado' ,'iduf', 'erro_uf')->obrigatorio()
				->set($parametros['curriculo'], 'Você deve anexar seu currículo' ,'curriculo', 'erro_cv')->obrigatorio()
				->set($parametros['curriculo'], 'O arquivo deve estar no formato pdf,doc ou docx' ,'curriculo', 'erro_cv')
				->validarMimeType($uploadhelper,array('application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document'),'curriculo')
				->set($parametros['curriculo'], 'O tamanho máximo do arquivo é de 2 MB' ,'curriculo', 'erro_cv')
				->validarTamanhoArquivo($uploadhelper,'curriculo',2097152);
	
      //Retorna os erros	
      return $Validator->getErrors();
   }
}
?>