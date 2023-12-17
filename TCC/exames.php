<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
    <script src="https://kit.fontawesome.com/64f7aa2edc.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/exames.css">

    <title>Campezan</title>
</head>

<body>
    <header>
        <div class="container">

            <div class="flex">
                <a href="home.html"><i class="logo"> <img src="img/logo.png" width="180" height="180"></i></a>
                <ul>
                    <li><a href="consulta.php">Consulta</a></li>
                    <li><a href="exames.php">Exames</a></li>
                    <li><a href="prontuario.php">Prontuário</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- saida -->
    <?php include('perfil.php'); ?>
    <br>
    <br>
    <section class="area-exame">
        <div class="exame">
            <p class="th2">Exames</p>
            <br>
            <div class="search-container">
                <form action="exames.php">
                    <label for="search-input" class="search-icon"></label>
                    <input type="text" class="search-input" id="search-input" name="search-input" placeholder="Pesquise"
                        required />
                </form>
            </div>
            <br>
            <?php include("conectar.php");
            $pdfsExames = array('');
            $nome_exame = array('');

            $cod_pac = $_SESSION['cod_pac'];

            if (!empty($_GET['search-input'])) {
                $tipo_exame = $_GET['search-input'];
                $sql = "SELECT nome_exame, caminho_arquivo 
            FROM exame_paciente inner join exame on exame.num_exame = exame_paciente.num_exame 
            WHERE cod_pac = $cod_pac and tipo_exame like '%$tipo_exame%'";
            } else {
                $sql = "SELECT nome_exame, caminho_arquivo FROM exame_paciente inner join exame on exame.num_exame = exame_paciente.num_exame WHERE cod_pac = $cod_pac";
            }

            $result = mysqli_query($conexao, $sql);
            $row = mysqli_num_rows($result);

            if ($row > 0) {

                while ($dados = mysqli_fetch_assoc($result)) {
                    $caminho_arquivo = $dados['caminho_arquivo'];

                    $exame = $dados['nome_exame'];

                    if (file_exists($caminho_arquivo)) { ?>
                        <table>
                            <tr>
                                <td>
                                    <?php echo $exame ?>
                                </td>
                                <td><a href="<?php echo $caminho_arquivo ?>" target="_blank">Visualizar PDF</a></td>
                            </tr>
                        </table>
                    <?php }
                }

            } else { ?>
                <br>
                <p align="center">Nenhum exame disponível.</p>

            <?php } ?>
        </div>

    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>

    <script type="text/javascript" src="js/saida.js"></script>

</body>

</html>