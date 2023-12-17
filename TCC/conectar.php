<?php

$host = "localhost";
$user = "root";
$senha = "";
$dbname = "campezan";

$conexao = @mysqli_connect($host, $user, $senha, $dbname)
	or die("Não foi possível conectar ao servidor MySQL");

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>