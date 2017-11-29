<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="SAC,CAA,Contato,Recuperação de aula." />
  <meta name="description" content="Para manter contato, você pode ligar para a escola da sua cidade e solicitar atendimento junto ao CAA" >
  <title>SAC e CAA | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}  

  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
  <script src="{view}$JS_CONTROLLER{/view}{view}$CONTROLLER_ATUAL{/view}/{view}$CONTROLLER_ATUAL{/view}.js" type="text/javascript"></script>
  <script src="{view}$JS_CONTROLLER{/view}Centralatencaoaluno/Centralatencaoaluno.js" type="text/javascript"></script>
</head>
<body id="sac">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	{view}include file="include/banner.php"{/view}
		
  <div role="main" id="main">
  	<div class="titulo">
  		<p>SAC</p>
  	</div>
  	<div id="form_sac">
  		<div id="esquerda">
  			<form id="formulario_msg" action="javascript:enviarFormularioSac('{view}$URL_DEFAULT{/view}sac/cadastrar');">
  				<fieldset>
  					<legend>Mande-nos uma mensagem</legend>
  					<span class="form_azul">sua opinião é importante para nós</span>
	  				<input type="text" name="nome" id="nome" class="nome t_355 margem-cima margem-esquerda"/><br />
	  				<div id="erro_nome" class="erro"></div>
	  				<input type="text" name="email" id="email" class="email t_355 margem-cima margem-esquerda"/><br />
	  				<div id="erro_email" class="erro"></div>
	  				<input type="text" name="telefone" id="telefone" class="telefone t_355 margem-cima margem-esquerda"/><br />
	  				<div id="erro_telefone" class="erro"></div>
  					<select name="idunidade" id="select_unidade" class="unidade t_355 margem-cima margem-esquerda">
  						<option value="">Unidade:</option>
  						{view}foreach from=$recordset_unidades item=unidade{/view}
							<option value="{view}$unidade.id{/view}">{view}$unidade.Cidades.nome{/view}</option>  				
						{view}/foreach{/view}
  					</select><br />
  					<div id="erro_idunidade" class="erro"></div>
  					<select name="idassunto" id="assunto" class="assunto t_355 margem-cima margem-esquerda">
  						<option value="">Assunto:</option>
  						{view}foreach from=$recordset_assuntos item=assunto{/view}
							<option value="{view}$assunto.id{/view}">{view}$assunto.descricao{/view}</option>  				
						{view}/foreach{/view}
  					</select><br />
  					<div id="erro_idassunto" class="erro"></div>
  					<textarea name="mensagem" id="mensagem" class="mensagem t_355 margem-cima margem-esquerda"></textarea><br />
  					<div id="erro_mensagem" class="erro"></div>
  					{view}include file="include/erros.php"{/view}
  					<div id="posicao_botao" class="margem-cima margem-direita">
  						<input type="image" id="btn_enviar_sac" src="{view}$URL_DEFAULT{/view}web_files/img/btn_enviar.jpg" value="ENVIAR" alt="Botão Agendar" />
  					</div>
  				</fieldset>
  			</form>
  		</div>
  		<div id="direita">
  			<div id="cima">
  				<p>Para manter contato, você pode ligar para a escola da sua cidade e solicitar atendimento junto ao CAA (Centro de Atendimento ao Aluno) ou deixar aqui sua mensagem.</p>
  				<p>Obrigado pelo seu interesse em fazer contato conosco. Para que sua mensagem fique registrada e possamos dar um retorno rápido e eficiente, pedimos que você preencha o formulário a seguir da forma mais completa possível. Todos os campos são essenciais.</p>
  			</div>
  			<div id="baixo">
  			<form id="formulario_caa" action="javascript:enviarFormularioCentralatencaoaluno('{view}$URL_DEFAULT{/view}Centralatencaoaluno/cadastrar');">
  				<fieldset>
  					<legend>Centro de Atenção ao Aluno</legend>
  					<span class="form_vermelho">reserve sua recuperação de aula</span>
  					<input type="text" name="nome" id="nomeCompleto" class="nomeCompleto t_355 margem-cima margem-esquerda"/><br />
  					<div id="erro_nome_central" class="erro_central"></div>
  					<input type="text" name="telefone" id="telefone2" class="telefone2 t_355 margem-cima margem-esquerda"/><br />
  					<div id="erro_telefone_central" class="erro_central"></div>
  					<select name="unidade" id="select_unidade" onchange="escolherCentralAtencaoAlunoUnidade(this);" class="unidade t_355 margem-cima margem-esquerda">
  						<option value="">Unidade:</option>
  						{view}foreach from=$recordset_unidades item=unidade{/view}
							<option value="{view}$unidade.id{/view}">{view}$unidade.Cidades.nome{/view}</option>  				
						{view}/foreach{/view}
  					</select><br />
  					<div id="erro_unidade" class="erro_central"></div>
  					<div id="cur_professor" class="margem-esquerda alpha">
  						<span>Curso:</span>
  						<input type="radio" name="curso" id="ingles" value="inglês" class="ingles inp_radio" disabled="disabled"><label for="ingles" class="lbl_radio">Inglês</label>
  						<input type="radio" name="curso" id="informatica" value="informática" class="informatica inp_radio" disabled="disabled"><label for="informatica" class="lbl_radio">Informática</label>
	  					<br />
	  					<div id="erro1" class="">
		  					<div id="erro_curso" class="erro_central"></div>
	  					</div>
              <div>
                <input type="text" name="professor" id="professor" class="professor t_355 margem-cima alphaProfessor" disabled="disabled" />
              </div>
              <div id="erro3" class="">
                <div id="erro_professor" class="erro_central"></div>
              </div>
	  					<select name="dia" id="dia" class="dia margem-cima" disabled="disabled">
	  						<option value="">Dia:</option>
							<option value="Segunda-Feira">Segunda-Feira</option>
							<option value="Terça-Feira">Terça-Feira</option>							
							<option value="Quarta-Feira">Quarta-Feira</option>
							<option value="Quinta-Feira">Quinta-Feira</option>
	  						<option value="Sexta-Feira">Sexta-Feira</option>
							<option value="Sábado">Sábado</option>
	  					</select>
	  					<select name="horario" id="horario" class="horario margem-cima margem-esquerda" disabled="disabled">
	  						<option value="">Horário:</option>
	  						<option value="manha">Manhã</option>
	  						<option value="tarde">Tarde</option>
	  						<option value="noite">Noite</option>
	  					</select><br />
	  					<div id="erro2" class="">
		  					<div id="erro_dia" class="erro_central"></div>
		  					<div id="erro_horario" class="erro_central"></div>
	  					</div>
  					</div>
  					{view}include file="include/erros.php"{/view}
  					<div id="posicao_botao" class="margem-cima margem-direita">
  						<input id="btn_enviar_central" type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_reservar.jpg" value="ENVIAR" alt="Botão Agendar" />
  					</div>
  				</fieldset>
  			</form>
  			</div>
  		</div>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}  
</body>
</html>