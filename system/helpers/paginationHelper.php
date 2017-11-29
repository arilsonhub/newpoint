<?php
/**
 * Helper para auxiliar na constru��o de pagina��es
 * @author Connect System Consultoria LTDA
 *
 */
class paginationHelper {	
			
			//Cria e retorna a pagina��o
			public function create($url_default,Doctrine_Query $query, $pagina_atual, $qtd_registros_per_page , $qtd_paginas_per_session , $convert_result_to_array=null){
				
				//Array de retorno
				$retorno = array();
				
				//Recebe o total de registros da Query
                $total_registros_query = $query->count();
				
				//Verifica se � necess�rio gerar a pagina��o
				if($total_registros_query > $qtd_registros_per_page){
				
						//Calcula o total de p�ginas
						$total_paginas = ceil($total_registros_query / $qtd_registros_per_page);	
						
						//Valida o par�metro da p�gina atual
						if( (is_null($pagina_atual) || !is_numeric($pagina_atual)) || ($pagina_atual > $total_paginas) ){
							
							//Define a p�gina 1 como padr�o					
							$pagina_atual = 1;
						}
						
						//Define a p�gina anterior
						$pagina_anterior  = $pagina_atual-1;
						//Define a p�gina posterior
						$pagina_posterior = $pagina_atual+1;
						
						//******** APLICANDO PAGINACAO NO BANCO DE DADOS ***************				
						
							//Calcula o offset
							$offset = ($pagina_atual * $qtd_registros_per_page) - $qtd_registros_per_page;				
							//Aplicando a pagina��o no banco de dados
							$query->limit($qtd_registros_per_page)->offset($offset);     
							
						//***********************************************************						
						
						//Array de Links antes da p�gina atual
						$array_links_antes_pagina_atual = array();
						//Array de Links depois da p�gina atual
						$array_links_depois_pagina_atual = array();
						
						// Cria um for() para exibir os links antes da p�gina atual 
						for($i = $pagina_atual-$qtd_paginas_per_session; $i <= $pagina_atual-1; $i++) {
							
							//Faz uma consist�ncia para evitar p�ginas inv�lidas					
							if($i > 0){
								$array_links_antes_pagina_atual[] = $i;
							}
						}
						
						// Cria um for() para exibir os links depois da p�gina atual 
						for($i = $pagina_atual+1; $i <= $pagina_atual+$qtd_paginas_per_session; $i++) {

							//Verifica se o total de p�ginas foi ultrapassado
							if($i <= $total_paginas){
								$array_links_depois_pagina_atual[] = $i;
							}
						}
						
						//Atribui os par�metros ao Array de retorno
						$retorno['create_pagination']  = true; //Indica que a pagina��o deve ser criada
						$retorno['url_pagination']     = $url_default;
						$retorno['prior_pages']        = $array_links_antes_pagina_atual;
						$retorno['next_pages']         = $array_links_depois_pagina_atual;
						$retorno['total_rows']         = $total_registros_query;
						$retorno['total_pages']        = $total_paginas;
						$retorno['current_page']       = $pagina_atual;
						$retorno['prior_page']         = ($pagina_anterior > 0 ? $pagina_anterior : null);
						$retorno['next_page']          = ($pagina_posterior <= $total_paginas ? $pagina_posterior : null);
						
				
				}else{
				        //Retorna uma flag indicando que n�o � preciso gerar a pagina��o
				        $retorno['create_pagination']  = false;
				}
				
				//Armazena o resultado da query no retorno
				$retorno['recordset'] = ($convert_result_to_array === true ? $query->execute()->toArray() : $query->execute());
				
				//Retorna os dados da pagina��o
				return $retorno;
			}
}
?>