<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="História,Curso de inglês,New Point,Logos,Newzito" />
  <meta name="description" content="Textos sobre a escola, nossa missão, valores e história do logo" >
  <title>Conheça-nos | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}

  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="aescola">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>A Escola</p>
  	</div>
  	<div id="">
  		
  		<span class="negrito">Missão</span>
  		<div id="missao">
  			{view}$dados_escola.missao{/view}
  		</div>
  		
  		<span class="negrito">Visão</span>
  		<div id="visao">
  			{view}$dados_escola.visao{/view}
  		</div>
  		
  		<span class="negrito">Valores</span>
  		<div id="valores">
	  		{view}$dados_escola.texto_principal{/view}
		</div>
		
		<span class="negrito">História do logo</span>
		<div id="historia_logo">
			<img src="{view}$URL_DEFAULT{/view}web_files/img/historico_logos.PNG" alt="história dos logos da Newpoint"/>
			<p class="negrito">Evolução da Logomarca</p>
			<p>A NEWPOINT sempre teve como característica ser inovadora, estar atenta a tudo, as tendências e as mudanças. Sua logo marca ao longo dos anos recebeu atenção especial, pois remete a proposta e a missão da Escola.</p>
		</div>
		
		<span class="negrito">Newzito</span>
		<div id="newzito">
			<p>Newzito é o mascote oficial da Escola New Point.</p>
			<img src="{view}$URL_DEFAULT{/view}web_files/img/newzito.png" alt="Newzito o mascote da escola" class="esquerda"/>
			<p>
				Nascido em 2009 , é um mascote muito inquieto, atento a tudo que está na sua volta. Gosta muito de notícias sobre o mundo, estudos, trabalho. Além de muito esperto é organizado, traduzindo assim o espirito e a preocupação com a Qualidade e a constante Atualização em tudo. O Newzito é além de tudo, muito participativo, quer estar nos eventos, nas aulas, nas formaturas, e onde o aluno está.
			</p>
			<div class="clear"></div>
		</div>
  	</div>

	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
  
</body>
</html>