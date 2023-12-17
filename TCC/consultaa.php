<?php session_start(); ?>

<?php
$cod = $_SESSION["cod_pac"];
$hora = $_POST["hora_oculta"];
$data = $_POST["data_oculta"];
$medico = $_POST["medico"];

include("config.php");
$mysql = new banco();
$mysql->conecta();

$sql = "INSERT INTO consulta( crm, cod_pac, hora_consul, data_consul)
    VALUES ('$medico', '$cod', '$hora', '$data')";

// echo "$sql";
//  exit();



$res = @mysqli_query($mysql->con, $sql) or die("erro ao inserir");

header('location:consulta.php');

?>