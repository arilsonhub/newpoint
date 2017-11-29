<?php
class simplemailHelper
{
	private $email_remetente;
	private $email_destinatario;
	private $email_reply;
	private $email_assunto;
	private $email_conteudo;
	private $email_headers;
	
	public function setEmailRemetente($email_remetente){
	   $this->email_remetente = $email_remetente;
	}
	
	public function setDestinatario($email_destinatario){
	   $this->email_destinatario = $email_destinatario;
	}
	
	public function setReply($email_reply){
	   $this->email_reply = $email_reply;
	}
	
	public function setAssunto($email_assunto){
	   $this->email_assunto = $email_assunto;
	}
	
	public function setConteudo($email_conteudo){
	   $this->email_conteudo = $email_conteudo;
	}
	
	public function sendMail(){

		//Define as variáveis com os atributos
		$email_remetente    = $this->email_remetente; // deve ser um email do dominio
		$email_destinatario = $this->email_destinatario; // qualquer email pode receber os dados
		$email_reply        = $this->email_reply;
		$email_assunto      = $this->email_assunto;
		$email_conteudo     = $this->email_conteudo; 
		
		//Seta o Header antes do Envio
		$this->email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=iso-8859-1" ) );
		
	    //Enviando o email
		//====================================================
		if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $this->email_headers)){
			return true;
		}
		else{						
			return false;
		}
		//====================================================
	}
}	 