<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="Notícias,Novas,Tecnologia,Mercado de Trabalho,Inglês" />
  <meta name="description" content="Fique atento à novas curiosidades sobre o mundo da tecnologia e mercado de trabalho." >
  <title>{view}$dados_noticia.titulo{/view} | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}

  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="vernoticia">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	{view}include file="include/banner.php"{/view}	

  
  <div role="main" id="main">

   {view}if $dados_noticia !== false{/view}	 
		<div class="titulo">
			{view}$dados_noticia.titulo{/view}
		</div>
		<div id="imagem_noticia">
			<img src="{view}$URL_DEFAULT{/view}web_files/upload/noticias/{view}$dados_noticia.imagem{/view}" /> <!-- Colocar Campo para Thumb/Imagem tamanho normal -->
		</div>
		<div id="">
			{view}$dados_noticia.texto{/view}			
		</div>
		
		<div id="ver_noticia_coments">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=428341490529969";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-comments" data-href="{view}$URL_DEFAULT{/view}{view}$CONTROLLER_ATUAL{/view}/{view}$ACTION_ATUAL{/view}/id/{view}$dados_noticia.id{/view}" data-num-posts="3" data-width="800"></div>			
		</div>
		
		{view}else{/view}
		    <!-- Quando a noticia não for encontrada então vai cair aqui -->
		    <div align="center" style="color:red;">Noticia não encontrada</div>
					
	{view}/if{/view}	

	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
  
</body>
</html>