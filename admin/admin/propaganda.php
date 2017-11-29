<?php

	include "../php/conexao.php";
  include "../php/banco.php";
  $ver = 1;
  include "../php/restrito.php";
  
  if(isset($_GET['id'])){
  	if(is_numeric($_GET['id'])){
  
  		$bancoFuncoes = new Banco();
  		$sql = "select * from propagandaescola where id = ".$bancoFuncoes->anti_sql($_GET['id']);
  		$resultado = pg_query($sql); 		
  
  		if(pg_num_rows($resultado) <= 0){  			
  			die("Erro ao localizar a propaganda");  
  		}else{  		
  			$propagandaInstanciaEditar = pg_fetch_assoc($resultado);
  		}
  
  	}else{ die("Codigo de propaganda invalido"); }
  }
  
  $sql = "SELECT * FROM propagandaescola order by nome";
  $resultado = pg_query($sql);  
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
  <title>Administrador</title>
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
		include "../php/menu_admin.php";
	?>
  <div role="main" id="main">
  	
  	<p class="titulo">Propagandas do site</p>
  	
  	<div id="abas">
  		<table id="tabela_cabecalho">
  			<thead>
          <th><a href="alunos.php">Alunos</a></th>
          <th><a href="agenda.php">Agenda</a></th>
          <th><a href="site.php">Textos do site</a></th>
          <th><a href="noticias.php">Notícias</a></th>
          <th><a href="banner.php">Banner</a></th>
          <th><a href="convenios.php">Convênios</a></th>
          <th><a href="propaganda.php">Propaganda</a></th>
  			</thead>
  		</table>
  	</div>
  	<div id="textos_site">

  		<div id="formulario_foto">  			
  			<form action="recebe.php" method="post" enctype="multipart/form-data" class="validarForm">
  				<fieldset>
			            <div class="mensagem"><?php if(isset($_GET['msg'])){ echo urldecode(utf8_decode($_GET['msg'])); } ?></div>
			            <div>
			              <label for="name">Nome:</label>
			              <input type="text" name="nome" value="<?php echo (isset($propagandaInstanciaEditar) ? $propagandaInstanciaEditar['nome'] : ""); ?>" required/><br />
			            </div>
			            <?php if(isset($propagandaInstanciaEditar)){ ?>
				            <div class="active">
				              <span class="ativoFakeLabel">Ativo: </span>
				              <div class="activeWrapper">
				                <label for="ativo1">Sim</label>
				                <input type="radio" name="ativo" <?php echo ($propagandaInstanciaEditar['ativo'] == "1" ? "checked=\"checked\"" : ""); ?> value="1" id="ativo1">
				                <label for="ativo2">Não</label>
				                <input type="radio" name="ativo" <?php echo ($propagandaInstanciaEditar['ativo'] == "0" ? "checked=\"checked\"" : ""); ?> value="0" id="ativo2">
				              </div>
				            </div><br />
				            <input type="hidden" value="<?php echo $propagandaInstanciaEditar['imagem']; ?>" name="imagemBanco" />
  							<input type="hidden" value="<?php echo $propagandaInstanciaEditar['id']; ?>" name="id" />
			            <?php } ?>
			            <div>
			              <label for="imagem">Arquivo:</label>
			              <input type="file" name="imagem" id="imagem" <?php if(!isset($propagandaInstanciaEditar)){ ?>required<?php } ?> /><br />
			            </div>
			            <input type="hidden" value="22" name="a" />			            
			            <input type="hidden" value="1" name="efetuarCadastroPropaganda" />            
			  			<button type="submit">Enviar.</button>
  				</fieldset>
  			</form>
  		</div>
  	  <?php if(pg_num_rows($resultado) > 0){ ?>
      <table>
        <thead>
          <th>Nome</th>
          <th>Imagem</th>
          <th>Ativo</th>
          <th>ações</th>
        </thead>
        <tbody>
        <?php
        	$lineCounter = 0;
        	while($dadosPropaganda = pg_fetch_assoc($resultado)){ 
		?>
        <tr>
	          <td><?php echo $dadosPropaganda['nome']; ?></td>
	          <td>
	            <a href="../../web_files/upload/propaganda/<?php echo $dadosPropaganda['imagem']; ?>" class='fancyimagem'>Visualizar foto</a>            
	          </td>
	          <td><?php echo ($dadosPropaganda['ativo'] == "1" ? "Ativo" : "Inativo"); ?></td>
	          <td>
			     <form id="frmExclusaopropagandas<?php echo $lineCounter; ?>" action="recebe.php" method="post">
			     	  <a href="propaganda.php?id=<?php echo $dadosPropaganda['id'] ?>" title='Editar propaganda'><img src="../img/edi.png" alt="editar"></a>
			     	  <a href="javascript:if(confirm('Deseja realmente excluir a propaganda?')){ document.getElementById('frmExclusaopropagandas<?php echo $lineCounter; ?>').submit(); }" title='Excluir propaganda'><img src='../img/del.png' /></a>				      
				      <input type="hidden" name="a" value="23" />
				      <input type="hidden" name="deletarPropaganda" value="deletarPropaganda" />
				      <input type="hidden" name="id" value="<?php echo $dadosPropaganda['id']; ?>" />			
			     </form>
	          </td>
          </tr>
          <?php $lineCounter++; } ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      <?php } ?>
  	</div>
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
	?>
  
</body>
</html>