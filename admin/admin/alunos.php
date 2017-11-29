<?php
	include "../php/conexao.php";
  $ver = 1;
  include "../php/restrito.php";
  include "../php/banco.php";
  
  if(isset($_GET['id'])){
  	if(is_numeric($_GET['id'])){
  		
  		$bancoFuncoes = new Banco();
  		$sql = "select * from aluno where id = ".$bancoFuncoes->anti_sql($_GET['id']);
  		$resultado = pg_query($sql);
  		  		
  		if(pg_num_rows($resultado) > 0){

  			$alunoInstanciaEditar = pg_fetch_assoc($resultado);
  			
  			$sql = "select * from alunotelefone where alunoid = ".$alunoInstanciaEditar['id'];
  			$resultado = pg_query($sql);
  			$alunoTelefoneRelacaoDados = pg_fetch_assoc($resultado);
  			
  			$sql = "select * from telefone where id = ".$alunoTelefoneRelacaoDados['telefoneid'];
  			$resultado = pg_query($sql);
  			$telefoneAlunoDados = pg_fetch_assoc($resultado);  			  			
  			$alunoInstanciaEditar['telefone'] = $telefoneAlunoDados['numero'];
  			  			
  		}else{
  			die("Erro ao localizar o aluno");
  		}
  		  		
  	}else{ die("Codigo de aluno invalido"); }
  }
?>
<!DOCTYPE html>
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
  	
  	<p class="titulo">Cadastro de alunos</p>
  	
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
  	
  	<div id="formulario_banner">
      <p class="vermelho">Todos os campos são obrigatórios.</p>
      <div id="formulario_foto" class="">
        <?php if(isset($_GET['msg'])) { ?>
          <div style="color:red;"><?php echo $_GET['msg']; ?></div>
        <?php } ?>
        <form enctype="multipart/form-data" action="recebe.php" method="post" class="validarForm">
          <fieldset>
             <input type="hidden" name="efetuarCadastroAluno" value="efetuarCadastroAluno" />
            <label for="nome">Nome:</label><input type="text" name="nome" id="nome" value="<?php echo (isset($alunoInstanciaEditar)  ? $alunoInstanciaEditar['nome']  : ""); ?>" required/><br />
            
            <?php if(isset($alunoInstanciaEditar)){ ?>            
              <div class="active">
                <span class="ativoFakeLabel">Ativo: </span>
<div class="activeWrapper">                <label for="ativo1">Sim</label>
                <input type="radio" name="ativo" <?php if($alunoInstanciaEditar['ativo'] == "1") echo "checked='checked'"; ?> value="1" id="ativo1"/>
                <label for="ativo2">Não</label>
                <input type="radio" name="ativo" <?php if($alunoInstanciaEditar['ativo'] == "0") echo "checked='checked'"; ?> value="0" id="ativo2"/></div>
              </div><br />
            <?php } ?>
            
            <label for="telefone">Telefone:</label><input type="text" name="telefone" id="" value="<?php echo (isset($alunoInstanciaEditar)  ? $alunoInstanciaEditar['telefone']  : ""); ?>" class="numeroTelefone" required data-rule-customphone2="true" /><br />

            <label for="unidade">Unidade: </label>
            <select name="unidade" id="unidade" required>
              <option value="">Escolha a unidade</option>
              <?php
                $query_unidade = "select unidades.*,cidades.nome from unidades inner join cidades on (unidades.idcidade = cidades.id) order by nome";
                $result_unidade = pg_query($query_unidade);
                while($row_unidade = pg_fetch_assoc($result_unidade)){
                  $id_unidade      = $row_unidade['id'];
                  $nome_unidade    = $row_unidade['nome'];
                if(isset($alunoInstanciaEditar['idunidade']) && ($id_unidade == $alunoInstanciaEditar['idunidade'])){
                  echo "<option selected='selected' value=$id_unidade>$nome_unidade</option>";
                }else{
                  echo "<option value=$id_unidade>$nome_unidade</option>";
                }
                }
              ?>
            </select><br />

            <label for="aniversario">Aniversário:</label><input type="text" name="aniversario" id="aniversario" class="data" value="<?php echo (isset($alunoInstanciaEditar)  ? implode("/",array_reverse(explode("-",$alunoInstanciaEditar['datanascimento'])))  : ""); ?>" required data-rule-custombirthdate="true"/><br />
            <input type="hidden" value="<?php echo (isset($alunoInstanciaEditar) ? "21" : "19"); ?>" name="a">
            <?php if(isset($alunoInstanciaEditar)){ ?>
              <input type="hidden" value="<?php echo $alunoInstanciaEditar['id']; ?>" name="id">  
            <?php } ?>
            <button type="submit">Enviar.</button>
          </fieldset>
        </form>
      </div>
  		<table>
  			<thead>
  				<th>Nome</th>
          <th>Telefone</th>
          <th>Unidade</th>
  				<th>Aniversário</th>
          <th>Ativo</th>
  				<th>ações</th>
  			</thead>
  			<tbody>
        
        <?php
           $consulta     = "select * from aluno order by nome";
           $resultado    = pg_query($consulta) or die("Falha ao fazer pesquisa.");
           $lineCounter  = 0;
           while($linha  = pg_fetch_assoc($resultado)){

             $id          = $linha['id'];
             $nome        = $linha['nome'];
             $sql         = "select * from telefone t inner join alunotelefone at on (t.id = at.telefoneid) where at.alunoid = ".$id;            
             $result 	  = pg_query($sql);             
             $telefone    = pg_fetch_assoc($result);
             $sql         = "select c.* from unidades u inner join cidades c on (u.idcidade = c.id) where u.id = ".$linha['idunidade'];
             $result 	  = pg_query($sql);
             $unidade     = pg_fetch_assoc($result);
             $aniversario = implode("/",array_reverse(explode("-",$linha['datanascimento'])));
             $lineCounter++;        
	    ?>
             <tr>
	             <td><?php echo $nome; ?></td>
	             <td><?php echo $telefone['numero']; ?></td>
	             <td><?php echo $unidade['nome']; ?></td>
	             <td><?php echo $aniversario; ?></td>

               <td><?php echo ($linha['ativo'] == "1" ? "Ativo" : "Inativo"); ?></td>
	             <td>
	             	<form id="frmExclusaoAlunos<?php echo $lineCounter; ?>" action="recebe.php" method="post">
                  <a href="alunos.php?id=<?php echo $id ?>" title='Editar aluno <?php echo $nome; ?>'><img src="../img/edi.png" alt="editar"></a>
                  <a href="javascript:if(confirm('Deseja realmente excluir o aluno: <?php echo $nome; ?> ?')){ document.getElementById('frmExclusaoAlunos<?php echo $lineCounter; ?>').submit(); }" title='Excluir aluno <?php echo $nome; ?>'><img src='../img/del.png' /></a>
	             		<input type="hidden" name="a" value="20" />
	             		<input type="hidden" name="deletarAluno" value="deletarAluno" />
	             		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	             	</form>
	             </td>
             </tr>
        <?php      
          }
        ?>

  			</tbody>
  		</table>
  	</div>
  	
	<div class="clear"></div>
  </div><!-- fim da div main -->
	<?php
		include "../php/js.php";
		//fecha conexão com o banco
		pg_close();
	?>
  
</body>
</html>