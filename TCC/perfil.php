<div class="action">
  <div class="profile" onclick="menuToggle();">
    <img src="img/pessoa.png">
  </div>
  <div class="menu">
    <h3>
      <?php echo $_SESSION['usuario']; ?>
    </h3>
    <ul>
      <li><img src="img/sair.png"><a href="home.html">Sair</a></li>
    </ul>
  </div>
</div>