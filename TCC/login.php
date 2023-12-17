<?php
session_start();
include('conectar.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: loginn.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from paciente where email = '{$email}' and senha = '" . md5($senha) . "'";


$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$dados = mysqli_fetch_assoc($result);
	$_SESSION['senha'] = $senha;
	$_SESSION['usuario'] = $dados['nome'];
	$_SESSION['cod_pac'] = $dados['cod_pac'];
	$_SESSION['nome'] = $dados['nome'];

	header('Location: consulta.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginn.php');
	exit();
}
?>