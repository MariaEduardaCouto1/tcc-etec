<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Campezan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
  <script src="https://kit.fontawesome.com/64f7aa2edc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/consulta.css">
</head>

<body>
  <header>
    <nav>
      <a href="home.html"><i class="logo"> <img src="img/logo.png" width="180" height="180"></i></a>
      <ul>
        <li><a href="consulta.php">Consulta</a></li>
        <li><a href="exames.php">Exames</a></li>
        <li><a href="prontuario.php">Prontuário</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
      </div>
    </nav>
  </header>

  <?php
  $nome = $_SESSION['nome'];
  ?>

  <div class="container">
    <div class="left">
      <div class="calendar">
        <div class="month">
          <span id="prev" class="material-symbols-rounded">&lang;</span>
          <div class="date">Setembro 2023</div>
          <span id="next" class="material-symbols-rounded">&rang;</span>
        </div>

        <div class="weekdays">
          <div>Dom</div>
          <div>Seg</div>
          <div>Ter</div>
          <div>Qua</div>
          <div>Qui</div>
          <div>Sex</div>
          <div>Sab</div>
        </div>

        <div class="days"></div>
        <div class="goto-today">
          <div class="goto">
            <input type="text" placeholder="mm/yyyy" class="date-input" />
            <button class="goto-btn">Pesquisar</button>
          </div>
          <button class="today-btn">Hoje</button>
        </div>
      </div>
    </div>

    <br><br>

    <div class="contato">
      <table>
        <thead>
          <tr>
            <th colspan="2" class="t">Horários de atendimento</th>
          </tr>
          <th class="f">Médicos</th>
          <th class="E">Horários</th>
        </thead>
        <tbody>
          <tr>
            <td class="esp"> Dra. Eduarda Santana (Dermatologista)</td>
            <td class="espe"> 7h 7h30 8h 8h30 9h 9h30 10h</td>
          </tr>
          <tr>
            <td class="esp"> Dr. Eduardo Couto (Oftalmologista)</td>
            <td class="espe"> 7h30 8h 8h30 9h 9h30 10h 10h30</td>
          </tr>
          <tr>
            <td class="esp">Dr. Gabriel Jovino (Neurologista)</td>
            <td class="espe"> 9h 9h30 10h 10h30 11h 11h30 12h</td>
          </tr>
          <tr>
            <td class="esp">Dra. Lívia Almeida (Pediatra)</td>
            <td class="espe">11h 11h30 12h 12h30 13h 13h30 14h</td>
          </tr>
          <tr>
            <td class="esp">Dra. Maria Mauri (Dentista)</td>
            <td class="espe">12h 12h30 13h 13h30 14h 14h30 15h</td>
          </tr>
          <tr>
            <td class="esp">Dra. Monique Ventura (Ginecologista)</td>
            <td class="espe">14h 14h30 15h 15h30 16h 16h30 17h</td>
          </tr>
        </tbody>

      </table>
    </div>

    <form method="POST" action="consultaa.php">
      <div class="right">

        <div class="events"></div>
        <div class="add-event-wrapper">
          <div class="add-event-header">
            <div class="title">Agendar</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="add-event-body">
            <div class="add-event-input">
              <input type="text" class="event-name" value=<?php echo $nome ?>>
            </div>

            <div class="add-event-input">
              <input type="text" placeholder="Horário" class="event-time-from" name="hora" id="hora">
              <input type="hidden" name="hora_oculta" id="hora_oculta">
            </div>

            <div class="today-date">
              <div class="event-day">wed</div>
              <div class="traco">-</div>
              <div class="event-date" name="data" id="data">09 de Outubro de 2023</div>
              <input type="hidden" name="data_oculta" id="data_oculta">
            </div>
            <!-- <div class="add-event-input">
              <input
                type="text"
                placeholder="Horario final"
                class="event-time-to"
              />
            </div> -->
            <div class="add-event-input">
              <label for="especialidade">Especialidade:</label>
              <select name="especialidade" id="especialidade">
                <option value="">Selecione</option>
                <?php
                include("config.php");
                $mysql = new banco();
                $mysql->conecta();
                $sql = "SELECT medico.especialidade FROM medico";
                $resultEspecialidades = @mysqli_query($mysql->con, $sql) or die("erro ao inserir");
                while ($row = $resultEspecialidades->fetch_assoc()) {
                  echo "<option value='" . $row["especialidade"] . "'>" . $row["especialidade"] . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="add-event-input">
              <label for="medico">Médico:</label>
              <select name="medico" id="medico">
                <option value="">Selecione</option>
                <?php
                $sql = "SELECT nome, crm FROM medico";
                $resultMedicos = @mysqli_query($mysql->con, $sql) or die("erro ao inserir");
                while ($row = $resultMedicos->fetch_assoc()) {
                  ?>
                  <option value=<?php echo $row["crm"] ?>> <?php echo $row["nome"] ?> </option>
                  <?php
                }
                ?>
              </select>
            </div>

          </div>

          <div class="add-event-footer">
            <button class="add-event-btn">Agendar</button>
          </div>
        </div>

      </div>
    </form>

    <button class="add-event">
      <i class="fas fa-plus"></i>
    </button>

  </div>
  </div>
  <br>
  <br>

  <!-- Saida -->
  <?php include('perfil.php'); ?>


  <!-- footer -->
  <?php include 'footer.php' ?>

  <script type="text/javascript" src="js/saida.js"></script>
  <script src="js/consulta.js"></script>

</body>

</html>