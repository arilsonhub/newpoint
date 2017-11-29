<?php /* Smarty version Smarty-3.1.1, created on 2014-04-18 04:36:51
         compiled from "include\agenda.php" */ ?>
<?php /*%%SmartyHeaderCode:1668553508fc38e21f9-66368302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '109d124bf68c8a181030e6194c9a5a0c332670ef' => 
    array (
      0 => 'include\\agenda.php',
      1 => 1394847943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1668553508fc38e21f9-66368302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recordset_agenda' => 0,
    'agenda_cursos' => 0,
    'URL_DEFAULT' => 0,
    'agenda_eventos' => 0,
    'agenda_feriados' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_53508fc398a1a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53508fc398a1a')) {function content_53508fc398a1a($_smarty_tpl) {?><div id="aba_agenda">
	<table id="links_agenda">
		<thead>
			<tr>
				<th id="id_cursos" class="agenda_inativo"><a id="link_cursos" class="">Cursos</a></th>
				<th id="id_eventos" class="agenda_ativo"><a id="link_eventos" class="">Eventos</a></th>
				<th id="id_feriados" class="agenda_ativo"><a id="link_feriados" class="">Feriados</a></th>
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
		  <?php if (isset($_smarty_tpl->tpl_vars['recordset_agenda']->value['Cursos'])){?>
			  <?php  $_smarty_tpl->tpl_vars['agenda_cursos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['agenda_cursos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recordset_agenda']->value['Cursos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['agenda_cursos']->key => $_smarty_tpl->tpl_vars['agenda_cursos']->value){
$_smarty_tpl->tpl_vars['agenda_cursos']->_loop = true;
?>
				<tr align="center">
					<td class="tamanhodez"><?php echo $_smarty_tpl->tpl_vars['agenda_cursos']->value['oque'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['agenda_cursos']->value['quando'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['agenda_cursos']->value['onde'];?>
</td>
				</tr>			
			  <?php } ?>	
		  <?php }?>	  
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3" class="tamanhodez facybox.ajax mais"><a class="fancybox.ajax" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
agenda">Ver mais +</a></td>
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
			<?php if (isset($_smarty_tpl->tpl_vars['recordset_agenda']->value['Eventos'])){?>
			  <?php  $_smarty_tpl->tpl_vars['agenda_eventos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['agenda_eventos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recordset_agenda']->value['Eventos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['agenda_eventos']->key => $_smarty_tpl->tpl_vars['agenda_eventos']->value){
$_smarty_tpl->tpl_vars['agenda_eventos']->_loop = true;
?>
				<tr align="center">
					<td class="tamanhodez"><?php echo $_smarty_tpl->tpl_vars['agenda_eventos']->value['oque'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['agenda_eventos']->value['quando'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['agenda_eventos']->value['onde'];?>
</td>
				</tr>			
			  <?php } ?>	
		    <?php }?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3" class="tamanhodez facybox.ajax mais"><a class="fancybox.ajax" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
agenda">Ver mais +</a></td>
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
			<?php if (isset($_smarty_tpl->tpl_vars['recordset_agenda']->value['Feriados'])){?>
			  <?php  $_smarty_tpl->tpl_vars['agenda_feriados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['agenda_feriados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recordset_agenda']->value['Feriados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['agenda_feriados']->key => $_smarty_tpl->tpl_vars['agenda_feriados']->value){
$_smarty_tpl->tpl_vars['agenda_feriados']->_loop = true;
?>
				<tr align="center">
					<td class="tamanhodez"><?php echo $_smarty_tpl->tpl_vars['agenda_feriados']->value['oque'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['agenda_feriados']->value['quando'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['agenda_feriados']->value['onde'];?>
</td>
				</tr>			
			  <?php } ?>	
		    <?php }?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3" class="tamanhodez facybox.ajax mais"><a class="fancybox.ajax" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
agenda">Ver mais +</a></td>
			</tr>
		</tfoot>
	</table>
</div><?php }} ?>