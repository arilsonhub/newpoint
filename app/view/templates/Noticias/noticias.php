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
  <title>Notícias/ou título da notícia | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}

  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="pag_noticias">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	{view}include file="include/banner.php"{/view}
	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>NOTÍCIAS</p>
  	</div>
  	<div id="">
  		
  	</div>
  	<div id="noticias">
  		  	
        {view}foreach from=$recordset.recordset item=noticia{/view}			
  		<div class="noticia">
  			<div class="imagem">
  				<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title=""><img src="{view}$URL_DEFAULT{/view}web_files/upload/noticias/{view}$noticia.imagem{/view}" alt="imagem da notícia"/></a>
  			</div>
  			<div class="texto">
  				<span class="noticia_titulo">
  					<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="Título">
  						{view}$noticia.titulo{/view}
  					</a>
  				</span>
  				<p>
	  				<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="Manchete">
	  					{view}$noticia.manchete{/view}
	  				</a>
  				</p>
  				<p>
  					<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="Parte do texto da notícia">
	  					{view}$noticia.texto{/view}...
  					</a>
  				</p>
  				<span class="saiba"><a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="Clique aqui para ler a notícia inteira.">SAIBA MAIS</a></span>
  			</div>
  			<div class="clear"></div>
  		</div>		
		{view}/foreach{/view}
  		
  		<div id="paginacao">
  			{view}include file="include/paginacao.php"{/view}
  		</div>
  		<div class="clear"></div>
  	</div>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
  
</body>
</html>