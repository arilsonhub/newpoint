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
	
	{view}if $recordsetPerguntas !== false{/view}
  	<div id="trabalhe_texto">
  		<p>Boa sorte, {view}$nome_candidato{/view}</p>
  	</div>	
	
		
		<div class="perguntas">
		  {view}if isset($nenhumaResposta) {/view}
				<div style="color:red;">{view}$nenhumaResposta{/view}</div>
		  {view}/if{/view}
		  <form class="perguntas_teste" action="{view}$URL_DEFAULT{/view}teste/nota-final" method="post">		    
			<fieldset>
			  <legend>Teste de nivelamento</legend>
			  <ol class="">

				{view}foreach from=$recordsetPerguntas key=k item=nivel{/view}
				    {view}foreach from=$recordsetPerguntas[$k] item=pergunta{/view} 
						<li>{view}$pergunta.questao{/view}
						  <ul>
							{view}foreach from=$pergunta.alternativas key=alt_k item=alt{/view}
								<li><input type="radio" id="resposta_{view}$alt.alternativa_id{/view}" value="{view}$alt.correta{/view}" name="{view}$k{/view}_alternativa[{view}$pergunta.questao_id{/view}]"> <label for="resposta_{view}$alt.alternativa_id{/view}">{view}$alt.alternativa{/view}</label></li>					
							{view}/foreach{/view}
						  </ul>
						</li>            
					{view}/foreach{/view}
				{view}/foreach{/view}

			  </ol>
			  <button type="submit">Enviar</button>
			</fieldset>
		  </form>
		</div>
	
		{view}else{/view}	
			<div>Não foi possível acessar o banco de questões, tente novamente mais tarde...</div><br />
			<div><a href="{view}$URL_DEFAULT{/view}">clique aqui</a> para voltar a página inicial</div>
	{view}/if{/view}
	
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}  
</body>
</html>