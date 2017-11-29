<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="Cursos,Inglês,Idiomas,Informática,Kids" />
  <meta name="description" content="Conheça nossos cursos e entre em contato ou assine nossa News Letter" >
  <title>Cursos de Inglês e Informática | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}

  <script src="{view}$JS_CONTROLLER{/view}Newsletter/Newsletter.js"></script>
  <script src="{view}$JS_CONTROLLER{/view}Querosabermais/Querosabermais.js"></script>
  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="cursos">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	{view}include file="include/banner.php"{/view}
		
  <div role="main" id="main">
  	<div class="titulo">
  		<p>CURSOS</p>
  	</div>
  	
  	<div id="slide_cursos">
	   {view}foreach from=$recordset_cursos key=k item=curso{/view}
			<div id="curso{view}($k+1){/view}">
				<span id="BtnCurso{view}($k+1){/view}">{view}$curso.nome{/view} - {view}$Helper->ExecuteRegex('/\./',',',$curso.total_horas){/view} Horas</span><br />				
				<ul class="curso{view}($k+1){/view}">
				{view}foreach from=$curso.CursosHasModulos item=curso_modulo{/view}
					<li><a href="{view}$URL_DEFAULT{/view}cursos/detalhes-modulo/id/{view}$curso_modulo.Modulos.id{/view}" class="fancybox.ajax various">{view}$curso_modulo.Modulos.titulo{/view}</a></li>					
				{view}/foreach{/view}	
				</ul>				
			</div>  		
		{view}/foreach{/view}
  	</div>
  	
  	<div id="formulario_cursos">
  		<form id="newsletter_form" action="javascript:enviarFormularioNewsletter('{view}$URL_DEFAULT{/view}newsletter/cadastrar');">
	  		<legend>NEWSLETTER</legend>
	  		<div class="block"></div>
	  		<p class="texto">Quer receber informações sobre cursos e promoções diretamente no seu e-mail? Basta se cadastrar em nossa newsletter preenchendo o formulário abaixo. </p>
  			<input name="nome" id="nome" placeholder="Nome" /><br />
  			<div id="erro_nome" class="erro"></div>
			<input name="email" id="email" placeholder="E-mail" /><br />
			<div id="erro_email" class="erro"></div>
			{view}include file="include/erros.php"{/view}
			<button id="btn_enviar_newsletter" type="submit" >Enviar.</button>
  		</form>
  		
  		<form id="QueroSaberMais_form" action="javascript:enviarFormularioQuerosabermais('{view}$URL_DEFAULT{/view}quero-saber-mais/cadastrar');">
  			<legend>QUERO SABER MAIS</legend>
  			<div class="block"></div>
  			<select name="idcurso">
  				<option value="">Escolha um curso</option>
				{view}foreach from=$recordset_cursos item=curso{/view}
					<option value="{view}$curso.id{/view}">{view}$curso.nome{/view}</option>
				{view}/foreach{/view}
  			</select>
  			<div id="erro_idcurso" class="erro"></div>
			<input name="nome" id="nome" placeholder="Nome" /><br />
			<div id="erro_nome_quero_saber_mais" class="erro"></div>
			<input name="telefone" id="telefone" placeholder="Telefone" /><br />
			<div id="erro_telefone" class="erro"></div>
			<input name="celular" id="celular" placeholder="Celular" /><br />
			<div id="erro_celular" class="erro"></div>
  			<select name="idunidade">
  				<option value="">Escolha a unidade</option>
				{view}foreach from=$recordset_unidades item=unidade{/view}
					<option value="{view}$unidade.id{/view}">{view}$unidade.Cidades.nome{/view}</option>  				
				{view}/foreach{/view}
  			</select><br />
  			<div id="erro_idunidade" class="erro"></div>
  			<textarea name="observacoes" id="observacoes" placeholder="Digite aqui suas dúvidas ou observações para nossa equipe de atendimento."></textarea>
  			<div id="erro_observacoes" class="erro"></div>
			{view}include file="include/erros.php"{/view}
			<button id="btn_enviar_querosabermais" type="submit" >Enviar.</button>
  		</form>
  	</div>

	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
  
</body>
</html>