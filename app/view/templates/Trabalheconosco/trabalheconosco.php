<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="Currículo,trabalhe conosco,vagas,emprego,perfil" />
  <meta name="description" content="Cadastre o seu currículo e venha fazer parte de nossa equipe." >
  <title>Trabalhe Conosco | New Point Escolas Profissionalizantes</title>

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
  		<p>TRABALHE CONOSCO</p>
  	</div>
  	<div id="trabalhe_texto">
  		<p>SEJA UM COLABORADOR NEWPOINT:</p>
  		<p>
  			É muito bom saber do seu interesse em trabalhar em nossas Escolas. As carreiras desenvolvidas na NEWPOINT, contam a história de uma empresa que oferece ótimas condições de trabalho e grandes oportunidades de crescimento, mas também está aberta a profissionais que queiram crescer e fazer parte de uma equipe de sucesso. 
  		</p>
  	</div>	
  	<div id="form_trabalhe">
  		<form id="formulario_trabalho" onsubmit="desabilitaBotaoSubmit();" method="post" target="trabalheconosco_iframe" enctype="multipart/form-data" action="{view}$URL_DEFAULT{/view}trabalhe-conosco/cadastrar">			
			<fieldset>
	  			<legend>Trabalhe Conosco</legend>
	  			<div id="span_trabalho">
	  				<span class="form_vermelho">venha vencer conosco</span>
	  			</div>
	  			<div id="inputs_trabalho">
		  			<input type="text" name="nome" id="nome" class="nome t_355" />
		  			<input type="text" name="email" id="email" class="email t_355" /><br />
		  			<div id="erros1" class="tamanho_erro2 escondido">
		  				<div id="erro_nome" class="erro tamanho_erro"></div><div id="erro_email" class="erro tamanho_erro"></div>
		  			</div>
		  			<input type="text" name="telefone" id="telefone" class="telefone t_355" />
		  			<input type="text" name="celular" id="celular" class="celular t_355" /><br />
		  			<div id="erros2" class="tamanho_erro2 escondido">
		  				<div id="erro_telefone" class="erro tamanho_erro"></div><div id="erro_celular" class="erro tamanho_erro"></div>
		  			</div>
		  			<input type="text" name="endereco" id="endereco" class="endereco" />
		  			<input type="text" name="numero" id="numero" class="numero" />
		  			<input type="text" name="complemento" id="complemento" class="complemento" /><br />
		  			<div id="erros3" class="tamanho_erro2 escondido">
		  				<div id="erro_endereco" class="erro tamanho_endereco"></div>
		  				<div id="erro_numero" class="erro tamanho_numero"></div>
		  				<div id="erro_complemento" class="erro tamanho_complemento"></div>
		  			</div>
		  			<input type="text" name="bairro" id="bairro" class="bairro t_355" />
		  			<select name="iduf" id="uf" class="" onchange="getUnidadesByEstado(this.value,'{view}$URL_DEFAULT{/view}','cidade');" />
		  				<option value="">Estado:</option>
						{view}foreach from=$recordset_estados item=estado{/view}
							<option value="{view}$estado.id{/view}">{view}$estado.nome{/view}</option>				
					    {view}/foreach{/view}
		  			</select>
		  			<select name="idunidade" id="cidade" class="cidade t_355" disabled="disabled" />
		  				<option>Selecione um estado.</option>
		  			</select><br>
		  			<div id="erros4" class="tamanho_erro2 escondido">
						<div id="erro_bairro" class="erro tamanho_bairro"></div>
		  				<div id="erro_uf" class="erro tamanho_uf"></div>
		  				<div id="erro_unidade" class="erro tamanho_cidade"></div>
		  			</div>
		  			<select name="idcargo" id="cargo" class="cargo t_355" />
					   <option value="">Cargo:</option>
					   {view}foreach from=$recordset_cargos item=cargo{/view}
							<option value="{view}$cargo.id{/view}">{view}$cargo.nome{/view}</option>				
					   {view}/foreach{/view}
		  			</select>
		  			<input type="text" name="salario" id="salario" class="salario t_355" /><br />
		  			<div id="erros5" class="tamanho_erro2 escondido">
		  				<div id="erro_cargo" class="erro tamanho_cargo"></div>
		  				<div id="erro_salario" class="erro tamanho_salario"></div>
		  			</div>
		  			<div id="texto_trabalho">
		  				<p>Envie seu CV – Curriculum Vitae (Arquivos com extensão pdf / doc / docx).</p>
		  			</div>
		  			<div id="input_file">
		  				<input type="file" name="curriculo" id="cv" class="cv" /><br>
					    <div id="erros6" class="tamanho_erro2 escondido">	
							<div id="erro_cv" class="erro tamanho_cv"></div>
					    </div>	
		  			</div>
		  			<div id="btn" class="">
		  				<input id="btn_enviar" type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_enviar.jpg" value="ENVIAR" alt="Botão Agendar" id="" name="btn" class="btn" />
		  			</div>
	  			</div>
  			</fieldset>
  		</form>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}  
</body>
</html>