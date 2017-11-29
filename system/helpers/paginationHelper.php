<?php
/**
 * Helper para auxiliar na construção de paginações
 * @author Connect System Consultoria LTDA
 *
 */
class paginationHelper {	
			
			//Cria e retorna a paginação
			public function create($url_default,Doctrine_Query $query, $pagina_atual, $qtd_registros_per_page , $qtd_paginas_per_session , $convert_result_to_array=null){
				
				//Array de retorno
				$retorno = array();
				
				//Recebe o total de registros da Query
                $total_registros_query = $query->count();
				
				//Verifica se é necessário gerar a paginação
				if($total_registros_query > $qtd_registros_per_page){
				
						//Calcula o total de páginas
						$total_paginas = ceil($total_registros_query / $qtd_registros_per_page);	
						
						//Valida o parâmetro da página atual
						if( (is_null($pagina_atual) || !is_numeric($pagina_atual)) || ($pagina_atual > $total_paginas) ){
							
							//Define a página 1 como padrão					
							$pagina_atual = 1;
						}
						
						//Define a página anterior
						$pagina_anterior  = $pagina_atual-1;
						//Define a página posterior
						$pagina_posterior = $pagina_atual+1;
						
						//******** APLICANDO PAGINACAO NO BANCO DE DADOS ***************				
						
							//Calcula o offset
							$offset = ($pagina_atual * $qtd_registros_per_page) - $qtd_registros_per_page;				
							//Aplicando a paginação no banco de dados
							$query->limit($qtd_registros_per_page)->offset($offset);     
							
						//***********************************************************						
						
						//Array de Links antes da página atual
						$array_links_antes_pagina_atual = array();
						//Array de Links depois da página atual
						$array_links_depois_pagina_atual = array();
						
						// Cria um for() para exibir os links antes da página atual 
						for($i = $pagina_atual-$qtd_paginas_per_session; $i <= $pagina_atual-1; $i++) {
							
							//Faz uma consistência para evitar páginas inválidas					
							if($i > 0){
								$array_links_antes_pagina_atual[] = $i;
							}
						}
						
						// Cria um for() para exibir os links depois da página atual 
						for($i = $pagina_atual+1; $i <= $pagina_atual+$qtd_paginas_per_session; $i++) {

							//Verifica se o total de páginas foi ultrapassado
							if($i <= $total_paginas){
								$array_links_depois_pagina_atual[] = $i;
							}
						}
						
						//Atribui os parâmetros ao Array de retorno
						$retorno['create_pagination']  = true; //Indica que a paginação deve ser criada
						$retorno['url_pagination']     = $url_default;
						$retorno['prior_pages']        = $array_links_antes_pagina_atual;
						$retorno['next_pages']         = $array_links_depois_pagina_atual;
						$retorno['total_rows']         = $total_registros_query;
						$retorno['total_pages']        = $total_paginas;
						$retorno['current_page']       = $pagina_atual;
						$retorno['prior_page']         = ($pagina_anterior > 0 ? $pagina_anterior : null);
						$retorno['next_page']          = ($pagina_posterior <= $total_paginas ? $pagina_posterior : null);
						
				
				}else{
				        //Retorna uma flag indicando que não é preciso gerar a paginação
				        $retorno['create_pagination']  = false;
				}
				
				//Armazena o resultado da query no retorno
				$retorno['recordset'] = ($convert_result_to_array === true ? $query->execute()->toArray() : $query->execute());
				
				//Retorna os dados da paginação
				return $retorno;
			}
}
?>