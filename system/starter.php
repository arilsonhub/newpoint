<?php
//Sem cache na sess�o
session_cache_limiter("nocache");
//Inicializa a Sess�o
session_start();
//Sobreposi��o de cabe�alhos
header("Cache-Control: no-cache, must-revalidate, post-check=3600, pre-check=3600");
//Cabe�alho para Tratamento de Acentua��o
header("Content-Type: text/html; charset=utf-8", true);
//Carregamento Autom�tico de Classes
include('system/loader/loader.php');
//Carrega o BOOTSTRAP
include(MODELS."bootstrap.php");
//Arquivo de Fun��es Gen�ricas do Framework
include('system/util/functions.util.php');

//Instancia a classe de carregamento
$AutoLoader = new ClassAutoloader();
//Temos uma �nica instancia que gerencia todo o sistema
$initializer = new initializer();
?>