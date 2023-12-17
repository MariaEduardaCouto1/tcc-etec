<!DOCTYPE html>
<html lang="pt-br">

<head>

  <title>Campezan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icone.png">
  <link rel="stylesheet" href="css/cadastro.css">

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

      <form method="POST" action="cadastro.php">
        <label for="nome">Nome</label>
        <input type="text" name="nome" autocomplete="off" placeholder="Maria Campezan" autofocus maxlength="50">
        <br>

        <label for="cpf">CPF</label>
        <input type="text" id="RegraValida" name="cpf" autocomplete="off" maxlength="14" onkeydown="fMasc( this, mCPF )"
          onblur="ValidaCPF()" required>
        <br>

        <label for="data_nasc">Data de Nascimento</label>
        <input type="date" id="data_nasc" name="data_nasc" max="2023-12-31" min="1923-01-01">
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" autocomplete="off" placeholder="@gmail.com" required>
        <br>

        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep" maxlength="9" autocomplete="off" onkeypress="cepMascara(this)"
          onblur="buscacep()" required>
        <br>

        <label for="cidade">Rua</label>
        <input type="text" id="rua" name="rua">
        <br>

        <label for="bairro">Bairro</label>
        <input type="text" id="bairro" name="bairro">
        <br>

        <label for="numero">Numero</label>
        <input type="text" id="numero" name="numero" maxlength="5" required>
        <br>

        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" name="cidade">
        <br>
        <label for="estado">Estado</label>
        <input type="text" id="estado" name="estado">
        <br>

        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" maxlength="15" autocomplete="off" onkeypress="applymasctel(this)" required>
        <br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" autofocus maxlength="8" required>
        <br><label for="senha">Confirme sua Senha</label>
        <input type="password" name="senha" autofocus maxlength="8" required>
        <br>
        <div class="form-check">
          <input class="check-termos" type="checkbox">
          <label class="check-label" for="flexCheckDefault">
            Aceito os <a class="btn-termos" onclick="abrirModal('vis-modal')">Termos</a> e condições.
          </label>
        </div>
        <div id="vis-modal" class="modal">
          <div class="conteudo-modal">
            <div class="cabecalho-modal">
              <h1 class="titulo-modal">Política de Privacidade da Clínica Campezan</h1>
              <span class="cabecalho-modal-fechar" type="button" onclick="fecharModal('vis-modal')">X</span>
            </div>

            <div class="corpo-modal">
              <p>A Clínica Campezan está empenhada em proteger a privacidade dos visitantes deste site. Esta Política de
                Privacidade descreve como coletamos, usamos, compartilhamos e protegemos as informações pessoais que
                você nos fornece quando usa nosso site. Ao acessar e utilizar o site da Clínica Campezan, você aceita os
                termos desta política.
                Coleta de informações<br>
                Ao visitar nosso site, podemos coletar direta ou indiretamente as seguintes informações pessoais:<br>
                1. Informações que você fornece: podemos coletar informações pessoais, como seu nome, endereço de
                e-mail, número de telefone e outros dados que você fornece voluntariamente ao preencher formulários,
                enviar mensagens ou interagir com os recursos do Site.<br>
                2. Informações de navegação: podemos coletar informações não identificáveis pessoalmente, como endereço
                IP, tipo de navegador, provedor de serviços de Internet, páginas de referência/saída, arquivos exibidos
                no Site (como páginas HTML, gráficos, etc.), sistema operacional , etc data/hora e clique em dados para
                analisar tendências e administrar o site.<br>
                <br>

                <strong>Uso de informações</strong><br>
                A informação pessoal recolhida pela Clínica Campezan é utilizada para as seguintes finalidades:<br>
                1. Prestação de serviços: Utilizamos a informação que nos fornece para responder às suas questões,
                agendar consultas médicas, fornecer informações sobre os nossos serviços e enviar-lhe comunicações
                relevantes.<br>
                2. Melhoria do site: As informações coletadas nos ajudam a melhorar continuamente nosso site, sua
                funcionalidade e a qualidade dos serviços que oferecemos.<br>
                3. Comunicações de marketing: podemos usar seus dados de contato para enviar comunicações de marketing
                sobre nossos Serviços se você tiver dado seu consentimento prévio para receber tais comunicações. Você
                pode optar por não receber essas comunicações a qualquer momento, seguindo as instruções fornecidas em
                cada comunicação.<br>
                <br>

                <strong>Divulgação de informações</strong><br>
                A Clínica Campezan não compartilhará, venderá, alugará ou divulgará suas informações pessoais a
                terceiros, com as seguintes exceções:<br>
                1. Provedores de serviços: podemos compartilhar suas informações com provedores de serviços
                terceirizados que nos ajudam a operar o Site e fornecer serviços relacionados. Esses provedores de
                serviços têm acesso limitado às suas informações e são obrigados a protegê-las de acordo com esta
                Política de Privacidade.<br>
                2. Requisitos legais: podemos divulgar suas informações pessoais se formos obrigados a fazê-lo por lei,
                regulamentação, processo legal ou solicitação governamental aplicável.<br>
                <br>

                <strong>Segurança da informação</strong><br>
                A Clínica Campezan utiliza medidas de segurança adequadas para proteger as informações pessoais que você
                fornece contra acesso não autorizado, alteração, divulgação ou destruição. No entanto, nenhuma
                transmissão de dados pela Internet ou sistemas de armazenamento eletrônico é totalmente segura.<br>
                <br>

                <strong>Última atualização: 17 de maio de 2023.</strong>
              </p>
            </div>

            <div class="rodape-modal">
              <button class="btn-outline-success" type="button" onclick="fecharModal('vis-modal')"
                align-items="center">Fechar</button>
            </div>
          </div>
        </div>

        <button class="btn" type="submit" onclick="alerta()">Cadastrar</button>

      </form>

      <script>
        function alerta() {
          var nome = document.getElementsByName("nome")[0].value;
          var cpf = document.getElementsByName("cpf")[0].value;
          var data_nasc = document.getElementsByName("data_nasc")[0].value;
          var email = document.getElementsByName("email")[0].value;
          var cep = document.getElementsByName("cep")[0].value;
          var rua = document.getElementsByName("rua")[0].value;
          var bairro = document.getElementsByName("bairro")[0].value;
          var numero = document.getElementsByName("numero")[0].value;
          var cidade = document.getElementsByName("cidade")[0].value;
          var estado = document.getElementsByName("estado")[0].value;
          var telefone = document.getElementsByName("telefone")[0].value;
          var senha = document.getElementsByName("senha")[0].value;

          if (
            nome === "" || cpf === "" || data_nasc === "" ||
            email === "" || cep === "" || rua === "" ||
            bairro === "" || numero === "" || cidade === "" ||
            estado === "" || telefone === "" || senha === ""
          ) {
            alert("Por favor, preencha todos os campos.");
          } else {
            alert("Cadastro realizado com sucesso!!");
          }
        }
      </script>

  </section>
  <script src="js/modal.js"></script>
  <script type="text/javascript" src="js/cep.js"></script>
  <script type="text/javascript" src="js/cpf.js"></script>
  <script type="text/javascript" src="js/telefone.js"></script>

</body>

</html>