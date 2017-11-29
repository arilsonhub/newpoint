<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 8;
  include "../php/restrito.php";

  if(empty($_GET['idnivel'])){
    header("Location:perguntas-cadastrar.php");
  }else{
    $nivel    = $_GET['idnivel'];
    $sql      = "SELECT * FROM nivelamentoquestoes WHERE idnivel = $nivel";
    $resultado= pg_query($sql) or die(pg_result_error());
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
          <tr>
            <th colspan="2"><a href="perguntas-cadastrar.php">Nova Pergunta</a></th>
            <th colspan="2"><a href="perguntas-listar.php?idnivel=1">Listar Perguntas</a></th>
          </tr>
          <tr>
            <th><a href="perguntas-listar.php?idnivel=1">Básico</a></th>
            <th><a href="perguntas-listar.php?idnivel=2">Intermediário</a></th>
            <th><a href="perguntas-listar.php?idnivel=3">Pré-intermediário</a></th>
            <th><a href="perguntas-listar.php?idnivel=4">Avançado</a></th>
          </tr>
        </thead>
      </table>
    </div>
    <?php
      if(isset($_GET['mensagem'])){
        echo "
          <div class='mensagem sucesso'>
            <p>Pergunta excluida com sucesso</p>
          </div>
        ";
      }
    ?>
  	<div>
      <table>
        <caption></caption>
        <thead>
        <tr class='cabecalho'>
          <th>ID</th>
          <th>DESCRICAO</th>
          <th>AÇÃO</th>
        </tr>
        </thead>
        <tbody>
          <?php
            while($row      = pg_fetch_assoc($resultado)){
              $id           = $row['id'];
              $descricao    = $row['descricao'];
              echo "<tr>\n";
                echo "<form id='form-deletar-perguntas_$id' method='post' action='excluir.php'>";
                  echo "<input type='hidden' name='a' value='2' /> 
                  <input type='hidden' name='id' value='$id' />
                  <input type='hidden' name='nivel' value='$nivel' />
                  ";
                echo "</form>\n";
                echo "<td>$id</td>";
                echo "<td>$descricao</td>";
                echo "<td><a href='perguntas-editar.php?id=$id'>Editar</a> /";
                ?>
                <a href="#" onclick="if(confirm('deseja excluir?')){ document.getElementById('form-deletar-perguntas_<?php echo $id; ?>').submit(); }"> Excluir</a></td>
                <?php
              echo "</tr>\n";
            }
          ?>
        </tbody>
    </table>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>