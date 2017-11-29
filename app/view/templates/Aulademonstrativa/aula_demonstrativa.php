<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="Aula demonstrativa,demonstração,curso de inglês,curso de informática" />
  <meta name="description" content="Agende uma aula demonstrativa e conheça nossos instrutores e escola." >
  <title>Aula demonstrativa | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}

  <script src="{view}$JS_CONTROLLER{/view}{view}$CONTROLLER_ATUAL{/view}/{view}$CONTROLLER_ATUAL{/view}.js" type="text/javascript"></script>
  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="aulademonstrativa">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>AULA DEMONSTRATIVA</p>
  	</div>
  	<div id="form_aula">
  		<div id="esquerda">
  			<form id="formulario_aula" action="javascript:enviarFormularioAulaDemonstrativa('{view}$URL_DEFAULT{/view}aula-demonstrativa/cadastrar');">
  				<fieldset>
  					<legend>Dados Pessoais</legend>
  					<span class="form_azul">agende sua aula. É rápido</span>
  					<input type="text" name="nome" id="nome" class="nome t_355 margem-cima margem-esquerda"/><br />
  					<div id="erro_nome" class="erro"></div>
  					<input type="text" name="email" id="email" class="email t_355 margem-cima margem-esquerda"/><br />
  					<div id="erro_email" class="erro"></div>
  					<input type="text" name="telefone" id="telefone" class="telefone t_355 margem-cima margem-esquerda"/><br />
  					<div id="erro_telefone" class="erro"></div>
  					<input type="text" name="celular" id="celular" class="celular t_355 margem-cima margem-esquerda"/><br />
  					<div id="erro_celular" class="erro"></div>
  					<select name="idunidade" id="select_unidade" class="unidade t_355 margem-cima margem-esquerda">
  						
						<option value="">Unidade:</option>
						{view}foreach from=$dados_unidades item=unidade{/view}
							<option value="{view}$unidade.id{/view}">{view}$unidade.Cidades.nome{/view}</option>							
						{view}/foreach{/view}
						
  					</select><br />
  					<div id="erro_unidade" class="erro"></div>
  					<select name="idturno" id="horario" class="horario t_355 margem-cima margem-esquerda">
  						<option value="">Horário:</option>
  						{view}foreach from=$dados_horarios item=horario{/view}
							<option value="{view}$horario.id{/view}">{view}$horario.nome{/view}</option>							
						{view}/foreach{/view}
  					</select><br />
  					<div id="erro_turno" class="erro"></div>
  					{view}include file="include/erros.php"{/view}
  					<div id="posicao_botao" class="margem-cima margem-direita">
  						<input type="image" id="btn_enviar" onclick="document.getElementById('formulario_aula').submit();" src="{view}$URL_DEFAULT{/view}web_files/img/btn_agendar.jpg" value="ENVIAR" alt="Botão Agendar" />
  					</div>
  				</fieldset>
  			</form>
  		</div>
  		<div id="direita">
  			<p>Quer começar agora mesmo? Agende já uma Aula Demonstrativa.</p>
  			<p>É a sua oportunidade de conhecer na prática eficácia de nossa metodologia, bem como nossas instalações e equipe. Você aprende desde a primeira aula.
Caso você já tenha algum domínio do idioma escolhido, após a aula de apresentação realizaremos um teste de nivelamento para encontrarmos qual o melhor módulo para Você. Vamos lá?</p>
  		</div>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
  
</body>
</html>