<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="Curso de Inglês, Teste ne Nivelamento, Professores, Curso, Inglês" />
  <meta name="description" content="Você já possui alguma noção de inglês? Faça um pequeno teste, saiba o seu nível e comece já." >
  <title>Teste de Nivelamento | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}  
  
  <script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/controllers/Trabalheconosco/Trabalheconosco.js"></script>
  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="trabalheconosco">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    
   {view}include file="include/topo.php"{/view}
  <iframe id="trabalheconosco_iframe" name="trabalheconosco_iframe" style="width:0px;height:0px"></iframe>		
  <div role="main" id="main">
  	<div class="titulo">
  		<p>Teste de Nivelamento</p>
  	</div>

    <div class="nota">
      <p class="um">Parabéns, {view}$nomeCandidato{/view}!</p>
      <p class="dois">Você acertou:</p>
      <p class="tres">{view}$numeroAcertos{/view} questões de {view}$totalPerguntas{/view}</p>
      <p class="quatro">Aguarde que entraremos em contato para agendar sua prova oral. Até mais!</p>
    </div>
	
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}  
</body>
</html>