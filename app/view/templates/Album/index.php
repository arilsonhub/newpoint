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
  <title>Álbum de Fotos</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}  
  
  <script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/controllers/Trabalheconosco/Trabalheconosco.js"></script>
  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="album">
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->    
   {view}include file="include/topo.php"{/view}	

  <div role="main" id="main">
    <div class="titulo">
      <p>Álbuns de fotos</p>
    </div>

	{view}if $recordset_albuns !== false{/view}
    <div class="gallery">
      <ul class="gallery">
	    {view}foreach from=$recordset_albuns item=album{/view}		
			<li>
			  <a href="{view}$URL_DEFAULT{/view}album/fotos/{view}$album.tag{/view}">
				<em>
				    {view}$album.titulo{/view}
				</em>
				<img src="{view}$URL_DEFAULT{/view}web_files/upload/galeria_fotos/{view}$album.Galeriafotos[0].imagem{/view}" alt="Album {view}$album.titulo{/view}" width="170" height="123"/>
			  </a>
			</li> 
		{view}/foreach{/view}
      </ul>
    </div>
	    {view}else{/view} 	     
		
		<!-- Se não tiver fotos cai aqui -->
		<div class="erro">Estamos escolhendo as melhores fotos</div>
		
	{view}/if{/view}

  </div>

   {view}include file="include/footer.php"{/view}  
</body>
</html>