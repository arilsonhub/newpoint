<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="Convênios,Empresas,Descontos,Compras" />
  <meta name="description" content="Conheça as nossas empresas conveniadas e ganhe descontos nas suas compras" >
  <title>Empresas Conveniadas | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width" />
  {view}include file="include/css.php"{/view}

  <script src="js/libs/modernizr-2.5.3.min.js" type="text/jscript"></script>
</head>
<body id="pagina_convenios">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
	{view}include file="include/topo.php"{/view}
	
  <div role="main" id="main">
  	<div class="titulo">
  		<p>EMPRESAS CONVENIADAS</p>
  	</div>
  	<div id="info_convenios">
  		{view}$informacoes_convenios{/view}
  		<table id="tabela_convenios" summary="Todas as empresas conveniadas.">
  			<caption>Empresas Conveniadas</caption>
  			<thead>
  				<tr>
  					<th id="empresa">Empresa</th>
  					<th id="telefone">Telefone</th>
  					<th id="endereco">Endere&ccedil;o</th>
  					<th id="desconto">Desconto</th>
  				</tr>
  			</thead>
  			<tbody align="center">
			    <tr>
				  <td>&nbsp;</td>
				</tr>
			    {view}foreach from=$dados_convenios item=convenio{/view}
					<tr>
						<td>{view}$convenio.nome{/view}</td>
						<td>{view}$convenio.telefone{/view}</td>
						<td>{view}$convenio.endereco{/view}</td>
						<td>{view}$convenio.desconto{/view}</td>
					</tr>
				{view}/foreach{/view}
  			</tbody>
  		</table>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}
  
</body>
</html>