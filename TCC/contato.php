<?php session_start();
include("comentario_home.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
  <script src="https://kit.fontawesome.com/64f7aa2edc.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/contato.css">
  <title>Campezan</title>
</head>

<body>

  <!-- Barra de Navegacao -->
  <header>
    <div class="container">

      <div class="flex">
        <a href="home.html"><i class="logo"> <img src="img/logo.png" width="180" height="180"></i></a>
        <ul>
          <li><a href="consulta.php">Consulta</a></li>
          <li><a href="exames.php">Exames</a></li>
          <li><a href="prontuario.php">Prontuário</a></li>
          <li><a id="bold" href="contato.php">Contato</a></li>
        </ul>
      </div>
    </div>
  </header>


  <!-- Tabela Email Medicos -->
  <center>
    <div class="contato">
      <table>
        <tr>
          <th colspan="3">Médicos</th>
        </tr>
        <tr>
          <td> Dentista </td>
          <td> Dra. Maria Mauri</td>
          <td><a class="a1" href="mailto:tccinfo2023@gmail.com"> dra.mauri@gmail.com </a> </td>
        </tr>
        <tr>
          <td> Dermatologista</td>
          <td> Dra. Eduarda Santana</td>
          <td><a class="a1" href="mailto:tccinfo2023@gmail.com"> dra.santana@gmail.com </a></td>
        </tr>
        <tr>
          <td>Ginecologista</td>
          <td>Dra. Monique Ventura</td>
          <td><a class="a1" href="mailto:tccinfo2023@gmail.com"> dra.ventura@gmail.com </a></td>
        </tr>
        <tr>
          <td>Neurologista</td>
          <td>Dr. Gabriel Jovino </td>
          <td><a class="a1" href="mailto:tccinfo2023@gmail.com"> dr.jovino@gmail.com </a></td>
        </tr>
        <tr>
          <td>Oftalmologista</td>
          <td>Dr. Eduardo Couto</td>
          <td><a class="a1" href="mailto:tccinfo2023@gmail.com"> dr.couto@gmail.com </a></td>
        </tr>
        <tr>
          <td>Pediatra</td>
          <td>Dra. Lívia Almeida</td>
          <td><a class="a1" href="mailto:tccinfo2023@gmail.com"> dra.almeida@gmail.com </a></td>
        </tr>
      </table>
    </div>
  </center>

  <!-- Form Contato -->
  <div id="login">
    <form action="comentario_home.php" method="POST">
      <p class="fale">Fale Conosco</p>

      <input type="text" name="nome" placeholder="Nome" autofocus maxlength="50"><br>
      <input type="email" name="email" placeholder="E-mail" autofocus maxlength="50"><br>
      <input type="text" name="fone" placeholder="Fone" autofocus maxlength="11"><br>
      <input type="text" name="mensagem" style="height: 50px;" placeholder="Mensagem" autofocus maxlength="500"><br><br>

      <button class="btn" type="submit" onclick="alerta()">Enviar</button>
    </form>
  </diV>
  </div>

  <br>
  <br>
  <script>
    function alerta() {
      alert("Formulário enviado com sucesso!!");
    }
  </script>

  <!-- Saida -->
  <?php include('perfil.php'); ?>

  <!-- footer -->
  <?php include 'footer.php' ?>

  <script type="text/javascript" src="js/saida.js"></script>



</body>

</html>