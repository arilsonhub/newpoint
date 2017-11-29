<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Newpoint Escolas Profissionalizantes - Página Inicial</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}

</head>
<body id="index">
  <div role="main" id="main">
      {view}if $dados_modulo !== false{/view}
			{view}$dados_modulo.descricao{/view}
			
		{view}else{/view}	
			O Modulo solicitado não foi encontrado.			
	  {view}/if{/view}
  </div><!-- fim da div main -->
</body>
</html>