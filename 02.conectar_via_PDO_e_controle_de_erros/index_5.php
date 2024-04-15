<?php

// CONECTAR VIA PDO E CONTROLO DE ERROS

/*
Não temos qualquer erro na conexão.
Deixámos de ter o bloco try... catch.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = 'c2hifo8akeka5iriKOT4X2N2NIG3jE';

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
$ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Temos um erro na query. Esta instrução não está completa.
$resultados = $ligacao->query("SELECT");

$ligacao = null;

/* 
PDO::ERRMODE_SILENT - Não apresenta erros
PDO::ERRMODE_WARNING - Apresenta avisos
PDO::ERRMODE_EXCEPTION - Dispara excepções que podem ser captadas no catch

Como referi, voltaremos aos erros sempre que necessário.
*/