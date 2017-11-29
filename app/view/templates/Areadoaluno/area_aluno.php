<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="Dicionário de Inglês,Notícias,Area do Aluno,Dicas inglês." />
  <meta name="description" content="Local destinado ao aluno, onde você encontra várias informações, dicionário de inglês, conteúdo exclusivo e notícias" >
  <title>Área do Aluno | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}
  
  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="areadoaluno">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    {view}include file="include/topo.php"{/view}
    {view}include file="include/banner.php"{/view}		
	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>ÁREA DO ALUNO</p>
  	</div>
  	<div id="acesso_restrito_aluno">
  		<form>
  			<fieldset>Acesso Restrito - Alunos</fieldset>
  			<label for="login">LOGIN:</label><input type="text" name="login" id="login" disabled="disabled" /><br />
  			<label for="senha">SENHA:</label><input type="password" name="senha" id="senha" disabled="disabled" /><br />
  			<input type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_form.jpg" value="enviar" id="enviar" alt="enviar formulário" disabled="disabled" />
  			<div class="clear"></div>
  		</form>
  		<p id="texto_aluno">Acesso restrito para alunos da rede New point</p>
  	</div>
  	<div id="agenda">
  		{view}include file="include/agenda.php"{/view}
  	</div>
  	<div id="dictionaries">
  		<form id="" action="http://dictionary.cambridge.org/search/british/direct/?utm_source=widget_searchbox_source&utm_medium=widget_searchbox&utm_campaign=widget_tracking" method="post" target="_blank">
  			<input type="text" name="q" class="q" id="q" />
  			<input type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_look.jpg" class="look" id="look" alt="Search on Cambridge Dictionary" />
  		</form>
  	</div>
  	<div id="fazbem">
  		<a href="{view}$URL_DEFAULT{/view}faz-bem" title="Link Externo para o Newpoint faz bem">
  			<img src="{view}$URL_DEFAULT{/view}web_files/img/fazbem.jpg" alt="Imagem do link Externo para o Newpoint faz bem" />
  		</a>
  	</div>
  	<div id="multimidia">
  		<a href="http://50.22.69.40/~learnetc/MML_NP/multimidia.html" target="_blank" class="link" id="link" title="Clique aqui para abrir o multimidia"></a>
  	</div>
  	<div id="bandeira">
  		<img src="{view}$URL_DEFAULT{/view}web_files/upload/area_do_aluno/{view}$recordset_foto_editavel.imagem_area_aluno{/view}" width="207" height="195" alt="" />
	  	<div id="convenios_aluno">
	  		<a href="{view}$URL_DEFAULT{/view}convenios" title="Link para os convênios"><img src="{view}$URL_DEFAULT{/view}web_files/img/convenios.JPG" /></a>
	  	</div>
  	</div>
  	<div id="aluno_facebook">
	    {view}include file="include/facebook.php"{/view}  		
  	</div>
  	<div id="aluno_twitter">
	    {view}include file="include/twitter.php"{/view}  		
  	</div>
  	<div id="ultimas_noticias" class="">
		<p id="titulo_noticia"><a href="{view}$URL_DEFAULT{/view}noticias" title="Para a página notícias">VEJA MAIS NOTÍCIAS AQUI.</a></p>

		{view}foreach from=$dados_ultimas_noticias item=noticia{/view} 
			<div class="noticia">
				<div class="imagem">
					<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title=""><img src="{view}$URL_DEFAULT{/view}web_files/upload/noticias/{view}$noticia.imagem{/view}" alt="imagem da notícia" /></a>
				</div>
				<div class="texto">
					<span class="noticia_titulo">
						<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="{view}$noticia.titulo{/view}">
							{view}$noticia.titulo{/view}
						</a>
					</span>
					<p>
						<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="{view}$noticia.manchete{/view}">
							{view}$noticia.manchete{/view}
						</a>
					</p>
					<span class="saiba"><a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="">SAIBA MAIS</a></span>
				</div>
				<div class="clear"></div>
			</div>
		{view}/foreach{/view}
		
  	</div>
	<div id="mais_lidas">
		
		<p id="titulo_noticia"><a href="{view}$URL_DEFAULT{/view}noticias{/view}" title="Para a página notícias">MAIS LIDAS</a></p>
		
		{view}foreach from=$dados_mais_lidas item=noticia{/view}
  		<div class="noticia">
  			<div class="texto">
  				<span class="noticia_titulo">
  					<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="{view}$noticia.titulo{/view}">
  						{view}$noticia.titulo{/view}
  					</a>
  				</span>
  				<p>
	  				<a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title="{view}$noticia.manchete{/view}">
	  					{view}$noticia.manchete{/view}<span class="saiba"><a href="{view}$URL_DEFAULT{/view}noticias/visualizar/id/{view}$noticia.id{/view}" title=""> (+)</a></span> 
	  				</a>
  				</p>
  			</div>
  			<div class="clear"></div>
  		</div>
		{view}/foreach{/view}
  		
  	</div>
  	<div id="fotos">
  		<div id="fotos_icone">
  			<img src="{view}$URL_DEFAULT{/view}web_files/img/bg_fotos.png" alt="Foto ilustrativa de uma câmera" />
  		</div>
		{view}if $recordset_albuns !== false{/view}
			<div id="ultimos_albuns">
				{view}foreach from=$recordset_albuns item=album{/view}		
				    {view}if isset($album.Galeriafotos[0].imagem){/view}
					<a href="{view}$URL_DEFAULT{/view}album/fotos/{view}$album.tag{/view}" title="clique e veja o álbum {view}$album.titulo{/view}">
						<img src="{view}$URL_DEFAULT{/view}web_files/upload/galeria_fotos/{view}$album.Galeriafotos[0].imagem{/view}" alt="Album {view}$album.titulo{/view}" width="170" />
					</a>  			
					{view}/if{/view}
				{view}/foreach{/view}
			</div>
		{view}/if{/view}
  		<div id="mais">
  			<a href="{view}$URL_DEFAULT{/view}album" title="clique aqui para ver mais fotos">VEJA MAIS ÁLBUNS AQUI.</a>
  		</div>
  	</div>
  	
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->  
  {view}include file="include/footer.php"{/view}  
</body>
</html>