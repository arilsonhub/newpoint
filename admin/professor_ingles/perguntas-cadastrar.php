<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 8;
  include "../php/restrito.php";

  $query = "select * from nivelamentoquestaonivel order by nome";
  $result = pg_query($query) or die();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Newpoint Escolas Profissionalizantes - Página Inicial</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">
	<?php
		include "../php/css.php";
	?>

</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  
  <div id="admin_topo">
  	CMS DO SITE
  </div>
	<?php
		include "../php/menu_professor_ingles.php";
	?>
  <div role="main" id="main">

    <div id="abas">
      <table id="tabela_cabecalho">
        <thead>
          <th><a href="perguntas-cadastrar.php">Nova Pergunta</a></th>
          <th><a href="perguntas-listar.php?idnivel=1">Listar Perguntas</a></th>
        </thead>
      </table>
    </div>
    <div class="mensagem">
      <?php include "../php/mensagem_perguntas_ingles.php"; ?>
    </div>
  	<div id="form_cms_prof_ing">
  		<form name="pergunta" method="post" action="recebe.php">
        <fieldset> 
          <label for="enunciado">ENUNCIADO:</label><input type="text" name="enunciado" id="enunciado" /><br />
          <label for="nivel">NÍVEL:</label>
          <select name="nivel" id="nivel">
            <option value="">Escolha o nível</option>
            <?php
              while($row = pg_fetch_assoc($result)){
                $id_nivel   = $row['id'];
                $nome_nivel   = $row['nome'];
              echo "<option value=$id_nivel>$nome_nivel</option>";
              }
            ?>
          </select><br />
          <label for="respostas1">RESPOSTA 1:</label><input type="text" name="respostas[]" id="respostas1" class="resposta"/>
          <input type="radio" name="certa" value="0" id="certa1" class="radio"><label for="certa1">Correta</label><br />

          <label for="respostas2">RESPOSTA 2:</label><input type="text" name="respostas[]" id="respostas2" class="resposta"/>
          <input type="radio" name="certa" value="1" id="certa2" class="radio"><label for="certa1">Correta</label><br />

          <label for="respostas3">RESPOSTA 3:</label><input type="text" name="respostas[]" id="respostas3" class="resposta"/>
          <input type="radio" name="certa" value="2" id="certa3" class="radio"><label for="certa1">Correta</label><br />

          <label for="respostas4">RESPOSTA 4:</label><input type="text" name="respostas[]" id="respostas4" class="resposta"/>
          <input type="radio" name="certa" value="3" id="certa4" class="radio"><label for="certa1">Correta</label><br />

          <label for="respostas5">RESPOSTA 5:</label><input type="text" name="respostas[]" id="respostas5" class="resposta"/>
          <input type="radio" name="certa" value="4" id="certa5" class="radio"><label for="certa1">Correta</label><br />

          <input type="hidden" value="7" name="a">
          <button type="submit" class="margem-cima">Enviar.</button>
        </fieldset>
      </form>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>