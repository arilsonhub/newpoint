{view}if $recordset.create_pagination !== false {/view}

		{view}if !is_null($recordset.prior_page){/view}
			<a href="{view}$recordset.url_pagination{/view}{view}$recordset.prior_page{/view}" id="anterior" class="ativo">Anterior</a>
		{view}/if{/view}

		{view}foreach from=$recordset.prior_pages item=page{/view}
			<a href="{view}$recordset.url_pagination{/view}{view}$page{/view}" class="ativo">{view}$page{/view}</a> 	
		{view}/foreach{/view}

		<a class="inativo">{view}$recordset.current_page{/view}</a>

		{view}foreach from=$recordset.next_pages item=page{/view}
			<a href="{view}$recordset.url_pagination{/view}{view}$page{/view}" class="ativo">{view}$page{/view}</a> 	
		{view}/foreach{/view}

		{view}if !is_null($recordset.next_page){/view}
			<a href="{view}$recordset.url_pagination{/view}{view}$recordset.next_page{/view}" id="proximo" class="ativo">Próximo</a>
		{view}/if{/view}

{view}/if{/view}