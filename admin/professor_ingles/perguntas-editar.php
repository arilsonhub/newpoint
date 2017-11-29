<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 8;
  include "../php/restrito.php";

  $query = "select * from nivelamentoquestaonivel order by id";
  $result = pg_query($query) or die();

  if(empty($_GET['id'])){
    header("Location:perguntas-cadastrar.php");
  }else{
    $id_enunciado       = $_GET['id'];
    $sql                = "SELECT * FROM nivelamentoquestoes WHERE id = $id_enunciado";
    $resultado          = pg_query($sql) or die(pg_result_error());
    $row                = pg_fetch_assoc($resultado);
    $descricao          = $row['descricao'];
    $idnivel            = $row['idnivel'];

    $sql_pergunta = "SELECT * FROM nivelamentoalternativas WHERE idquestao = $id_enunciado";
    //echo $sql_pergunta."<br />";
    $resultado    = pg_query($sql_pergunta) or die(pg_result_error());

    $sql_correta = "SELECT id FROM nivelamentoalternativas WHERE idquestao = $id_enunciado AND correta = 1";
    $resultado_correta = pg_query($sql_correta) or die(pg_result_error());
    $certa = pg_fetch_assoc($resultado_correta);
    $id_correta = $certa['id'];
  }

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

  	<div id="form_cms_prof_ing">
  		<form name="pergunta" method="post" action="recebe.php">
        <fieldset> 
          <label for="enunciado">ENUNCIADO:</label><input type="text" value='<?php echo $descricao; ?>' name="enunciado" id="enunciado" /><br />
          <label for="nivel">NÍVEL:</label>
          <select name="nivel" id="nivel">
            <option value="">Escolha o nível</option>
            <?php
              while($row = pg_fetch_assoc($result)){
                $id_nivel   = $row['id'];
                $nome_nivel   = $row['nome'];
                if($id_nivel == $idnivel){
                  echo "<option value=$id_nivel selected>$nome_nivel</option>";
                }else{
                  echo "<option value=$id_nivel>$nome_nivel</option>";
                }
              }
            ?>
          </select><br />

          <?php
            $p = 0;
            $r = 1;
            while($linha = pg_fetch_assoc($resultado)){

              $id         = $linha['id'];
              $descricao  = $linha['descricao'];
              $idquestao  = $linha['idquestao'];

              echo "<label for='resposta$r'>RESPOSTA $r:</label>";
              echo "<input type='text' name='resposta[]' id='resposta$r' class='resposta' value='$descricao'/>\n";
              if($id_correta == $id){
                echo "<input type='radio' name='certa' value='$p' id='certa$p' class='radio' checked='checked'><label for='certa$p'>Correta</label><br />\n";
              }else{
                echo "<input type='radio' name='certa' value='$p' id='certa$p' class='radio'><label for='certa$p'>Correta</label><br />\n";
              }
              echo "<input type='hidden' name='id_questao[]' value='$id' />\n";

              $r++;
              $p++;
            }
            echo "<input type='hidden' value='$id_enunciado' name='id_enunciado'>\n";
          ?>

          <input type="hidden" value="8" name="a">
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