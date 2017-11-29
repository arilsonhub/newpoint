<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="Unidades,Escolas,Alvorada,Porto Alegre,Viamão,Gravataí Informática." />
  <meta name="description" content="Conheça as nossas unidades e veja como é fácil chegar até elas" >
  <title>Unidade New Point, Alvorada, Poa, Gravataí, Viamão | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  
  {view}include file="include/css.php"{/view}
  
  <link href="{view}$URL_DEFAULT{/view}web_files/css/lightbox.css" rel="stylesheet" />
  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
  <script src="{view}$URL_DEFAULT{/view}web_files/js/googleMaps/googleMaps_routes.js" type="text/javascript"></script>
  <script src="{view}$JS_CONTROLLER{/view}{view}$CONTROLLER_ATUAL{/view}/{view}$CONTROLLER_ATUAL{/view}.js" type="text/javascript"></script>  
  <script type="text/javascript" src="http://www.freewebs.com/p.js"></script><script type='text/javascript' src='http://maps.google.com/maps/api/js?v=3.1&sensor=false&language=pt-BR'></script>
</head>
<body id="unidades">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    
	{view}include file="include/topo.php"{/view}
	{view}include file="include/banner.php"{/view}		
	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>UNIDADES</p>
  	</div>
  	<div id="div_unidade">
  		<div id="select">
	  		<form>
	  			<label for="unidade" class="branco">Selecione a sua unidade: </label>
				<select name="unidade" id="select_unidade" class="select_unidade" onchange="getUnidadeDados(this.value);">
					{view}foreach from=$recordset_unidades item=unidade{/view}
						<option value="{view}$unidade.id{/view}">{view}$unidade.Cidades.nome{/view}</option>					
					{view}/foreach{/view}
				</select><br />
	  		</form>
  		</div>
		<div id="div-imagem">
			<img src="{view}$URL_DEFAULT{/view}web_files/img/loader.gif" class="escondido">
		</div>
  		<div id="div-unidade">
		    <input type="hidden" id="hdUrlMapa" value="" />
  			<div id="mapa">
  				
  			</div>
			<!-- Elemento para receber a mensagem de status do mapa -->
  			<div id="infos">
  				<p class="tamanhovinteecinco">NEW POINT <span id="unidade_titulo"></span></p>
  				<p class="tamanhodoze">Contato <span id="unidade_contato"></span></p>
  				<address class="tamanhodoze">Local <span id="unidade_endereco"></span></address>
  				<p id="unidade_form">Digite o seu endereço e saiba como chegar</p>
  			</div>
  			<div id="form_endereco">
  				<form>
					<input type="text" name="endereco" id="seuEndereco" class="seuEndereco"/>
				</form>
				<button type="button" id="dirigindo" onclick="gerarRotaNoMapa(0);">Ir dirigindo</button>
				<button type="button" id="andando" onclick="gerarRotaNoMapa(1);">Ir andando</button><br />
				<div class="clear"></div>
				<div id='msg_status_mapa'></div>
  			</div>
  			<div id="fotos_unidade"></div>
  			<div class="clear"></div>
  		</div>
  		<div class="clear"></div>
  	</div>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}  
  
<script type="text/javascript">
	$(document).ready(function() {		
		getUnidadeDados($("#select_unidade").val());
	});
</script>
</body>
</html>