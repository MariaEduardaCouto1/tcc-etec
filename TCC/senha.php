<!DOCTYPE html>

<html lang="pt-br">

<head>
  <title>Campezan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
  <link rel="stylesheet" href="css/senha.css">
</head>

<body>
  <section class="area-login">
    <div class="login">
      <div class="seta">
        <a href="loginn.php"><img src="img/left-arrow.png" width="23"></a>
      </div>
      <div>
        <img src="img/logo.png" width="250">
      </div>
      <form>
        <label for="nome">Digite um E-mail para redefinir sua senha</label>
        <input type="text" name="nome" autocomplete="off" placeholder="@gmail.com" autofocus maxlength="50">
        <br>
        <label for="nome">Confirme seu E-mail</label>
        <input type="text" name="nome" autocomplete="off" placeholder="@gmail.com" autofocus maxlength="50">
        <br>
        <br>
        <center>
          <button class="btn" type="button" onclick="alerta()">Enviar</button>
        </center>
      </form>
    </div>
  </section>
  <script>
    function alerta() {
      alert("Redefinição de senha enviada para o e-mail!");
      window.location.href = "loginn.php";
    }
  </script>

</body>

</html>