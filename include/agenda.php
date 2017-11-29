<div id="aba_agenda">
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
				<td colspan="3" class="tamanhodez facybox.ajax mais"><a class="fancybox.ajax" href="{view}$URL_DEFAULT{/view}agenda">Ver mais +</a></td>
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
				<td colspan="3" class="tamanhodez facybox.ajax mais"><a class="fancybox.ajax" href="{view}$URL_DEFAULT{/view}agenda">Ver mais +</a></td>
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
				<td colspan="3" class="tamanhodez facybox.ajax mais"><a class="fancybox.ajax" href="{view}$URL_DEFAULT{/view}agenda">Ver mais +</a></td>
			</tr>
		</tfoot>
	</table>
</div>