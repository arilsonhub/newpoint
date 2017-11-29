<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="Cursos de Inglês,Informática,Qualificação Profissional,New Point" />
  <meta name="description" content="O ponto inicial para a sua qualificação, cursos de inglês e informática." >
  <title>Cursos de Inglês | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}

</head>
<body id="index">
	<div class="escondido">
		<a href="{view}$URL_DEFAULT{/view}web_files/img/promoNP.png" id="romo" class="fancybox">fancy</a>
	</div>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    {view}include file="include/topo.php"{/view}
	{view}include file="include/banner.php"{/view}	

  <div role="main" id="main">
  	<div id="galeria" class="galeria_background">
  		<a href="{view}$URL_DEFAULT{/view}album" title="Link para a galeria de fotos"></a>
  	</div>
  	<div id="area_do_aluno">
  		<a href="{view}$URL_DEFAULT{/view}area-do-aluno" title="Link para a área do aluno"></a>
  	</div>
  	<div id="convenios">
  		<a href="{view}$URL_DEFAULT{/view}convenios" title="Link para os convênios"></a>
  	</div>
  	
  	<div id="agenda">
  		{view}include file="include/agenda.php"{/view}
  	</div>
  	
  	<div id="nivelamento">
  		<a href="{view}$URL_DEFAULT{/view}teste" title="Faça o seu teste de nivelamento para o inglês aqui."></a>
  	</div>
  	<div id="aula_demonstrativa">
  		<a href="{view}$URL_DEFAULT{/view}aula-demonstrativa" title="Faça sua solicitação de aula demonstrativa aqui"></a>
  	</div>
  	<div id="facebook">
	    {view}include file="include/facebook.php"{/view}  		
  	</div>
  	<div id="twitter">
	    {view}include file="include/twitter.php"{/view}  				
  	</div>
  	<div id="self_study">
  		<a href="http://184.172.11.187/~learnetc/MML_NP/" title="Link Externo para página"></a>
  	</div>
  	<div id="trabalhe_conosco">
  		<a href="{view}$URL_DEFAULT{/view}trabalhe-conosco" title="Envie seu currículo clicando aqui."></a>
  	</div>
  	<div id="acesso_restrito">
  		<form action="{view}$URL_DEFAULT{/view}admin/index.php" method="post">
  			<fieldset>Acesso restrito - Colaboradores</fieldset>
  			<label for="login">LOGIN:</label><input type="text" name="login" id="login" /><br />
  			<label for="senha">SENHA:</label><input type="password" name="senha" id="senha" /><br />
  			<input type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_form.jpg" value="enviar" id="enviar" alt="enviar formulário" /><br />
  			<a href="http://webmail.escolasnewpoint.com.br/" title="Acesso ao webmail da instituição">Acesso ao Webmail</a>
  		</form>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
</body>
</html>