<?php
// CONFIGURAÇÃO DA CONEXÃO COM O BANCO DE DADOS.
$server="localhost";
$usuario="root";
$senha="";
$banco="usersdb";

// CONEXÃO
$pdo = new PDO("mysql:host=$server;dbname=$banco",$usuario,$senha);
?>