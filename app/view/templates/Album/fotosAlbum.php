<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="" />
  <meta name="description" content="" >
  <title>{view}$recordset_album.titulo{/view}</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}  
  
  <script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/controllers/Trabalheconosco/Trabalheconosco.js"></script>
  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="album">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId==397175023683025";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->    
   {view}include file="include/topo.php"{/view}	

  <div role="main" id="main">
    <div class="titulo">
      <p>{view}$recordset_album.titulo{/view}</p>
    </div>
	<div class="social-plugins">
		<div class="fb-like" data-href="http://{view}$smarty.server.HTTP_HOST{/view}{view}$smarty.server.REQUEST_URI{/view}" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false"></div>
	</div>
	{view}if $recordset_fotos !== false{/view}
		<div class="gallery">
		  	<ul class="gallery">
		    {view}foreach from=$recordset_fotos item=foto{/view}
				<li>
				<!-- {view}$URL_DEFAULT{/view}web_files/upload/albuns/ -->
				  <a href="{view}$URL_DEFAULT{/view}web_files/upload/galeria_fotos/{view}$foto.imagem{/view}" class='fancybox' rel='album'>
					<img src="{view}$URL_DEFAULT{/view}web_files/upload/galeria_fotos/{view}$foto.imagem{/view}" width="170" height="123" alt="Foto do(a) {view}$recordset_album.titulo{/view}" />
				  </a>
				</li>
			{view}/foreach{/view}
		  </ul>
		</div>
		<div id="ver_noticia_coments">
			<div class="fb-comments" data-href="{view}$URL_DEFAULT{/view}{view}$CONTROLLER_ATUAL{/view}/{view}$ACTION_ATUAL{/view}/{view}$recordset_album.tag{/view}" data-num-posts="3" data-width="800"></div>			
		</div>
		{view}else{/view}
			
			<!-- ESTE CONTEUDO SERA EXIBIDO CASO NAO TENHAM FOTOS PARA O ALBUM SELECIONADO -->
			<h3>Não existem fotos cadastradas para este album.</h3>
		
	{view}/if{/view}

  </div>

   {view}include file="include/footer.php"{/view}  
</body>
</html>