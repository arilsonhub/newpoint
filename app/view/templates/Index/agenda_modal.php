<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="keywords" content="História,Curso de inglês,New Point,Logos,Newzito" />
  <meta name="description" content="Textos sobre a escola, nossa missão, valores e história do logo" >
  <title>Conheça-nos | New Point Escolas Profissionalizantes</title>

  <meta name="viewport" content="width=device-width">
  {view}include file="include/css.php"{/view}

  <script src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body id="aescola">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  	
  <div role="main" id="main">

    <div id="agenda">
      <div id="aba_agenda">
        <table id="links_agenda">
          <thead>
            <tr>
              <th id="id_cursos" class="agenda_inativo"><a id="link_cursos15" class="">Cursos</a></th>
              <th id="id_eventos" class="agenda_ativo"><a id="link_eventos15" class="">Eventos</a></th>
              <th id="id_feriados" class="agenda_ativo"><a id="link_feriados15" class="">Feriados</a></th>
            </tr>
          </thead>
        </table>
      </div>
      <div id="agenda_cursos" class="">
        <table id="tabela_cursos">
          <thead>
            <tr>
              <th class="">O que:</th>
              <th class="">Quando:</th>
              <th class="">Onde:</th>
            </tr>
          </thead>
          <tbody>
            {view}if isset($recordset_agenda.Cursos){/view}
              {view}foreach from=$recordset_agenda.Cursos item=agenda_cursos{/view}
              <tr align="center">
                <td class="tamanhodez">{view}$agenda_cursos.oque{/view}</td>
                <td>{view}$agenda_cursos.quando{/view}</td>
                <td>{view}$agenda_cursos.onde{/view}</td>
              </tr>     
              {view}/foreach{/view} 
            {view}/if{/view}    
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="tamanhodez mais facybox.ajax"><a href="{view}$URL_DEFAULT{/view}index/agenda-modal">Ver mais +</a></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div id="agenda_eventos" class="">
        <table id="tabela_eventos">
          <thead>
            <th class="">O que:</th>
            <th class="">Quando:</th>
            <th class="">Onde:</th>
          </thead>
          <tbody>
            {view}if isset($recordset_agenda.Eventos){/view}
              {view}foreach from=$recordset_agenda.Eventos item=agenda_eventos{/view}
              <tr align="center">
                <td class="tamanhodez">{view}$agenda_eventos.oque{/view}</td>
                <td>{view}$agenda_eventos.quando{/view}</td>
                <td>{view}$agenda_eventos.onde{/view}</td>
              </tr>     
              {view}/foreach{/view} 
              {view}/if{/view}
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="tamanhodez mais facybox.ajax"><a href="{view}$URL_DEFAULT{/view}index/agenda-modal">Ver mais +</a></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div id="agenda_feriados" class="">
        <table id="tabela_feriados">
          <thead>
            <th class="">O que:</th>
            <th class="">Quando:</th>
            <th class="">Onde:</th>
          </thead>
          <tbody>
            {view}if isset($recordset_agenda.Feriados){/view}
              {view}foreach from=$recordset_agenda.Feriados item=agenda_feriados{/view}
              <tr align="center">
                <td class="tamanhodez">{view}$agenda_feriados.oque{/view}</td>
                <td>{view}$agenda_feriados.quando{/view}</td>
                <td>{view}$agenda_feriados.onde{/view}</td>
              </tr>     
              {view}/foreach{/view} 
              {view}/if{/view}
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="tamanhodez mais facybox.ajax"><a href="{view}$URL_DEFAULT{/view}index/agenda-modal">Ver mais +</a></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

	<div class="clear"></div>
  </div><!-- fim da div main -->
</body>
</html>