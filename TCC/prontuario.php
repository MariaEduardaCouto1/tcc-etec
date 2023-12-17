<?php session_start(); ?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
  <title>Campezan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https:www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
  <script src="https://kit.fontawesome.com/64f7aa2edc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/prontuario.css">
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


  <!--saida-->
  <?php include('perfil.php'); ?>
  <br>
  <br>
  <section class="area-pront">
    <div class="pront">
      <p class="th2" colspan="5">Prontuário</p>

      <form method="POST">
        <?php
        include("config.php");
        $mysql = new banco();
        $mysql->conecta();
        $cod_pac = $_SESSION["cod_pac"];

        $sql = "SELECT paciente.nome, paciente.data_nasc, prontuario.* from paciente inner join prontuario on paciente.cod_pac= prontuario.cod_pac where prontuario.cod_pac = $cod_pac";

        $res = @mysqli_query($mysql->con, $sql) or die("erro ao selecionar");
        ?>

        <table>
          <?php
          while ($row = @mysqli_fetch_array($res)) { ?>
            <th>Dados Pessoais
              <hr class="responsivo-hr" size="1" width="180%">
            </th>
            <tr>
              <td>Número de Prontuário: &nbsp;
                <?= $row['num_pront']; ?>
              </td>
              <td>Nome: &nbsp;
                <?= $row['nome']; ?>
              </td>
              <td>Data de Nascimento: &nbsp;
                <?= $row['data_nasc']; ?>
              </td>
              <table><br>
                <th>Histórico
                  <hr class="responsivo-hr" size="1" width="206%">
                </th>
                <tr>
                  <td>Doenças: &nbsp;
                    <?= $row['doencas']; ?>
                  </td>
                  <td>Alergias: &nbsp;
                    <?= $row['alergias']; ?>
                  </td>
                  <td>Cirurgias: &nbsp;
                    <?= $row['cirurgias']; ?>
                  </td>
                  <td>Tipo Sanguineo: &nbsp;
                    <?= $row['tipo_sanguineo']; ?>
                  </td>
                  <td>Medicamento de uso: &nbsp;
                    <?= $row['medicamentos']; ?>
                  </td>
                </tr>
                <table><br>
                  <th>Observações Médicas
                    <hr class="responsivo-hr" size="1" width="172%">
                  </th>
                  <td>
                    <?= $row['obser_med']; ?>
                  </td>

                <?php } ?>
              </table>
            </table>
        </table>

    </div>
  </section>

  <!-- footer -->
  <?php include 'footer.php' ?>

  <script type="text/javascript" src="js/saida.js"></script>
</body>

</html>