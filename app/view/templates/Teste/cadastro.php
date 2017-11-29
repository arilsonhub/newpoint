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
  	<div id="trabalhe_texto">
  		<p>
			Você já possui alguma noção de inglês?
      </p>
  		<p>
        Cadastre-se e faça o nosso teste de nivelamento. 
      </p>
      <p>
        Se você já fez o seu teste escrito, então a New Point entrará
  			em contato com você para agendar seu teste oral, na unidade mais próxima, escolhida por você.
  			Caso tenha alguma dúvida, entre em <a href="{view}$URL_DEFAULT{/view}sac" title="Serviço de Atendimento ao Cliente, clique aqui e fale conosco" class="underline">contato conosco</a>.
  		</p>
  	</div>

  	<div id="form_nivelamento">
  		<form id="formulario_nivelamento" action="javascript:enviarFormularioTeste('{view}$URL_DEFAULT{/view}teste/cadastrar');">
			<fieldset>
	  			<legend>Teste de Nivelamento</legend>
	  			<div id="span_trabalho">
	  				<span class="form_vermelho">Faça o teste e saiba o seu nível</span>
	  			</div>

          <input type="text" name="email" id="email" class="email t_355" /><br />
          <input type="text" name="nome" id="nome" class="nome t_355" />
          <div id="erros1" class="tamanho_erro2">
            <div id="erro_email" class="erro tamanho_erro"></div><div id="erro_nome" class="erro tamanho_erro"></div>
          </div>
          <input type="text" name="telefone" id="telefone" class="telefone t_355" />
          <input type="text" name="celular" id="celular" class="celular t_355" /><br />
          <div id="erros2" class="tamanho_erro2">
            <div id="erro_telefone" class="erro tamanho_erro"></div><div id="erro_celular" class="erro tamanho_erro"></div>
          </div>
          <input type="text" name="endereco" id="endereco" class="endereco" />
          <input type="text" name="numero" id="numero" class="numero" />
          <input type="text" name="complemento" id="complemento" class="complemento" /><br />
          <div id="erros3" class="tamanho_erro2">
            <div id="erro_endereco" class="erro tamanho_endereco"></div>
            <div id="erro_numero" class="erro tamanho_numero"></div>
            <div id="erro_complemento" class="erro tamanho_complemento"></div>
          </div>

          <input type="text" name="bairro" id="bairro" class="bairro t_355" />
          <select name="idestado" id="uf" class="" onchange="getUnidadesByEstado(this.value,'{view}$URL_DEFAULT{/view}','cidade');" />
            <option value="">Estado:</option>
            {view}foreach from=$recordset_estados item=estado{/view}
            <option value="{view}$estado.id{/view}">{view}$estado.nome{/view}</option>        
            {view}/foreach{/view}
          </select>
          <select name="idunidade" id="cidade" class="cidade t_355" disabled="disabled" />
            <option>Selecione uma cidade.</option>
          </select><br>
          <div id="erros4" class="tamanho_erro2">
          <div id="erro_bairro" class="erro tamanho_bairro"></div>
            <div id="erro_uf" class="erro tamanho_uf"></div>
            <div id="erro_unidade" class="erro tamanho_cidade"></div>
          </div>
          <div class="clear"></div>
          <div id="btn">
            <input id="btn_enviar" type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_enviar.jpg" value="ENVIAR" alt="Botão Agendar" id="" name="btn" class="btn" />
          </div>

  			</fieldset>
  		</form>
  	</div>
    <div class="jaecadastrado">
      <p class="" id="cadastrado">Já é cadastrado?</p>
      <div id="formcadastrador" class="escondido">
        <form id="formulario_nivelamento_login" action="javascript:efetuarLoginTesteNivelamento('formulario_nivelamento_login');">
          <fieldset>
            <input type="text" name="email" id="email2" class="t_355 email2" /><br />
            <div id="erros_logar_email" class="tamanho_erro2">
              <div id="erro_logar_email" class="erro tamanho_erro"></div>
            </div><br />
            <input id="btn_enviar_login" type="image" src="{view}$URL_DEFAULT{/view}web_files/img/btn_enviar.jpg" value="ENVIAR" alt="Botão Agendar" id="" name="btn" class="btn" />
          </fieldset>
        </form>
      </div>
    </div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
  {view}include file="include/footer.php"{/view}  
  <script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/controllers/Teste/Teste.js"></script>
</body>
</html>