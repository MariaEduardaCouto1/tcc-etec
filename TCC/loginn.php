<!DOCTYPE html>

<html lang="pt-br">

<head>
  <title>Campezan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <section class="area-login">
    <div class="login">

      <div class="seta">
        <a href="home.html"><img src="img/left-arrow.png" width="23"></a>
      </div>

      <div>
        <img src="img/logo.png" width="250">
      </div>
      <form action="login.php" method="POST">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="campezan@gmail.com" required>
        <small id="textEmail"></small>
        <br>
        <label for="senha">Senha</label>
        <input type="password" id="senha" required name="senha" placeholder="********" autofocus maxlength="8">
        <small id="textPassword"></small>

        <p> <a href="senha.php">Esqueceu a senha?</a></p>
        <center>
          <button class="btn" type="submit">entrar<a href="consulta.php"></a></button>
        </center>

      </form>

      <script type="text/javascript" src="js/login.js"></script>
      <p>Ainda não tem uma conta?<a href="cadastroo.php">Criar conta</a></p>
    </div>
  </section>
</body>

</html>