	{view}if $recordset_banners !== false{/view}
		<div id="banner_bg">
			<div id="banner" class="nivoSlider theme-default">
				{view}foreach from=$recordset_banners item=banner{/view}
						<img src="{view}$URL_DEFAULT{/view}web_files/upload/banner/{view}$banner.imagem{/view}" alt="{view}$banner.titulo{/view}" title="{view}$banner.titulo{/view}"/>
				{view}/foreach{/view}
			</div><!-- Fim banner -->
		</div>
	{view}/if{/view}