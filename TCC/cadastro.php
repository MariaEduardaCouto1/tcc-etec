<!DOCTYPE html>
<HTML LANG="pt-br">

<head>
    <meta charset="utf-8" />
    <TITLE> Cadastro</TITLE>
</head>

<body>

    <?php
    //$cod_pac =$_POST["cod_pac"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nasc = $_POST["data_nasc"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $telefone = $_POST["telefone"];
    $senha = md5($_POST["senha"]);


    include("config.php");
    $mysql = new banco();
    $mysql->conecta();

    $sql = "INSERT INTO paciente( nome, cpf, data_nasc, email, cep, rua, numero, bairro, cidade, estado, telefone, senha)
    VALUES ('$nome', '$cpf' , '$data_nasc' , '$email' , '$cep' , '$rua' , '$numero','$bairro' , '$cidade' ,'$estado',  
    '$telefone', '$senha')";

    echo "$sql";



    $res = @mysqli_query($mysql->con, $sql) or die("erro ao inserir");

    header('location:loginn.php');

    ?>


</body>

</HTML>