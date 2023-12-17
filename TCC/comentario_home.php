<?php
include("config.php");

$host = "localhost";
$user = "root";
$senha = "";
$dbname = "campezan";

$conexao = @mysqli_connect($host, $user, $senha, $dbname)
    or die("Não foi possível conectar ao servidor MySQL");

if (!empty($_POST['mensagem'])) {

    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];
    $email = $_POST['email'];
    $telefone = $_POST["fone"];

    $sql = "INSERT INTO contato (nome, mensagem, email, fone, created) 
        VALUES 	('$nome', '$mensagem', '$email', '$telefone', now() )";


    $res = @mysqli_query($conexao, $sql) or die("erro ao inserir");
    header("Location: contato.php");
    exit();
}



?>