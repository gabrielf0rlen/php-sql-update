<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <link rel="shortcut icon" href="icone.png">
        <title>Principal</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type="text/css" href='css.css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src='main.js'></script>
    </head>
    <body style="background-color:#686868;">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #181818;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">WEB Agendamentos</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">Principal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inserir.php">Inserir</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="listar.php">Listar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="excluir.php">Excluir</a>     
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="select.php">Select</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="update.php">Update</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <center>
        <div class=container-fluid style = "padding-top: 200px;">
          <form name = "" method = "POST" action = "">
          <fieldset id = "a">
            <legend><b> Agendamento: <br /></legend>
            <p> Nome: <input name = "txtnome" type = "text" size = "40" maxlength = "40" placeholder="Nome">
            <p> Telefone: <input name = "txttel" type = "text" size = "40" placeholder = "Telefone"> </p>
            <p> Origem: <input name = "txtorigem" type = "text" size = "40" maxlength = "40" placeholder="Origem">
            <p> Data do Contato: <input name = "txtdatacont" type = "text" size = "40" placeholder = "1111/11/11"> </p>
            <p> Obs: <input name = "txtobs" type = "text" size = "40" maxlength = "40" placeholder="Observação">

          </fieldset>
          <br>
          <fieldset id = "b">
              <br>
              <center>
              <input name = "btnenviar" type = "submit" value = "Cadastrar"> &nbsp;&nbsp;
              <input name = "limpar" type = "reset" value = "Limpar"></center>
          </fieldset>
          <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar))
            {
              include_once 'agendamento.php';
              $pro = new Agendamento();
              $pro->setNome($txtnome);
              $pro->setTelefone($txttel);
              $pro->setOrigem($txtorigem);
              $pro->setDataContato($txtdatacont);
              $pro->setObservacao($txtobs);
              echo "<h3><br><br>" . $pro -> salvar() . "</h3>";
            }
          ?>
          <br></center>
        </div>
    </body>
</html>