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
                    <a class="nav-link" href="inserir.php">Inserir</a>
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
                    <a class="nav-link active" aria-current="page" href="update.php">Update</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav><center>
        <legend><b> Alterar: </b></legend>
				
				<?php
					$txtid=$_POST["txtid"];
					include_once 'Agendamento.php';
					$p = new Agendamento();
					$p->setId($txtid);
					$pro_bd=$p->alterar();
				?>
				<br><form name = "agendamento2" method = "POST" action = "">
				<?php
					foreach($pro_bd as $pro_mostrar)
					{
				?>
					<input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>'>
					<b><?php echo "ID: " . $pro_mostrar[0];?></b>
					<br><br> <b><?php echo "Nome: " ;?></b>
					<input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
					<br><br> <b> <?php echo "Telefone: " ;?></b>
					<input type="text" name="txttel" size="10" value ='<?php echo $pro_mostrar[2]?>'>
					<br><br> <b><?php echo "Origem: " ;?></b>
					<input type="text" name="txtorigem" size="25" value='<?php echo $pro_mostrar[3]?>'>
					<br><br> <b> <?php echo "Data do Contato: " ;?></b>
					<input type="text" name="txtdatacont" size="10" value ='<?php echo $pro_mostrar[4]?>'>
					<br><br> <b><?php echo "Observacao: " ;?></b>
					<input type="text" name="txtobs" size="50" value='<?php echo $pro_mostrar[5]?>'>

					<br><br><br><center>
					<input name = "btnalterar" type="submit" value = "Alterar">
				<?php
					}
				?>
		</form>
		</fieldset>
			<?php
			extract($_POST, EXTR_OVERWRITE);
			if(isset($btnalterar))
			{
				include_once 'agendamento.php';
				$pro = new Agendamento();
				$pro->setNome($txtnome);
				$pro->setTelefone($txttel);
				$pro->setOrigem($txtorigem);
				$pro->setDataContato($txtdatacont);
				$pro->setObservacao($txtobs);
				$pro->setId($txtid);
				echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
				header("location:update.php");
			}
			?>
			<center> <br><br><br><br>
			<button><a href = "index.html"> Voltar </a></button>
			<br>
			</center>
			<br />
		</form>
    </body>
</html>