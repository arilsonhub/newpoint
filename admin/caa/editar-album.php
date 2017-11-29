<?php
  include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 3;
  include "../php/restrito.php";
  //Máximo de fotos
  $maximoDeFotos = MAXIMO_FOTOS;

  $sql    = "SELECT * FROM album";
  $result = pg_query($sql) or die(pg_result_error());

  $query_cidade = "select * from cidades order by nome";
  $result_cidade = pg_query($query_cidade) or die();

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
    include "../php/menu_caa.php";
  ?>
  <div role="main" id="main">
    <div class="titulo">
      ÁLBUNS
    </div>
    <div id="abas">
      <div class="mensagem"><?php if(isset($_GET['msg'])) echo urldecode($_GET['msg']); ?></div>
      <table id="tabela_cabecalho">
        <thead>
          <th><a href="album.php">Cadastrar Álbum</a></th>
          <th><a href="editar-album.php">Editar Álbum</a></th>
        </thead>
      </table>
    </div>
    <div id="usuarios_visualizar">
        <?php if(pg_num_rows($result) == 0) {?>
        <div class="mensagem">Nenhum álbum cadastrado</div>
      <?php }else{ ?>
      <table id="visualizar_usuarios">
        <thead>
          <th>Título</th>
          <th>Unidade</th>
          <th>Data do Evento</th>
          <th>Ação</th>
        </thead>
        <tbody>
        <?php

      $x = 0;
          while($row  = pg_fetch_assoc($result)){

      //Conta quantas fotos tem nesse album
      $query = "SELECT count(*) as total_fotos from galeriafotos where idalbum = ".$row['id']."";
      $result_Album_foto = pg_query($query);
      $recordsetFotoAlbum = pg_fetch_assoc($result_Album_foto);

            $id       = $row['id'];
            $titulo   = $row['titulo'];
            $unidade  = $row['idunidade'];
            $descricao= $row['descricao'];
            $data     = implode("/",array_reverse(explode("-",$row['data_do_evento'])));
            echo "<tr>\n";
            echo "<td>$titulo</td>\n";

            switch($unidade){
              case 1:
                echo "<td>Alvorada</td>\n";
                break;
              case 2:
                echo "<td>Gravataí</td>\n";
                break;
              case 3:
                echo "<td>Porto Alegre</td>\n";
                break;
              case 4:
                echo "<td>Viamão</td>\n";
                break;
              default:
                break;
            }

            echo "<td>$data</td>\n";
            
            
            //Verifica se esse album tem o máximo de fotos suportado
            if($maximoDeFotos != null && $recordsetFotoAlbum['total_fotos'] > $maximoDeFotos){              
        echo "<td> </td>";              
            }else{
        ?>
        <form id="album_deletar_form<?php echo $x; ?>" method="post" action="recebe.php">
                <td>
                  <a href='add-fotos.php?id=<?php echo $id; ?>'><img src='../img/plus.png' /></a> | 
                  <a href='ex-fotos.php?id=<?php echo $id; ?>' title='excluír fotos'><img src='../img/minus.png' /></a> | 
                  <a href='album_editar.php?id=<?php echo $id; ?>' title='editar Ã¡lbum'><img src='../img/edi.png' /></a> |                               
                    <input type="hidden" name="a" value="5" />
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <a href='#' title='excluír Álbum' onclick="if(confirm('deseja excluir?')){ document.getElementById('album_deletar_form<?php echo $x; ?>').submit();  }"><img src='../img/del.png' /></a>                
                </td>
              </form>
              <?php 
            }
            echo "</tr>\n";
      
      $x++;
          }

        ?>
        </tbody>
      </table>
      <?php } ?>
    </div><!-- fim usuarios_vizualizar -->
  <div class="clear"></div>
  </div><!-- fim da div main -->
  <?php
    include "../php/js.php";
  ?>
  
</body>
</html>