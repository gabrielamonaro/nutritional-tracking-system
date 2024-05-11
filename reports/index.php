<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,501;1,501&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Nutritional Tracking System</title>
  </head>
  <body>
  <header>
      <div class="home-button">
        <a href="../home/">

          <img src="../assets/icons/home.svg" class="home-icon"/>
        </a>
      </div>
      <div class="header-container">
        <img class="logo" src="../assets/img/food-and-restaurant.png" />
        <div class="container-title">
          <h1 class="title">Relatórios</h1>
        </div>
      </div>
    </header>
    <div class="buttons-container">

    <form action="cadastroAction.php" class="w3-container" method='post'>

<label class="w3-text-blue" style="fontweight: bold;">Nome</label>
<input name="txtNome" class="w3-input w3-light-grey w3-
border"><br>

<button name="btnAdd" class="w3-button w3-blue w3-cell w3-roundlarge w3-right w3-margin-right">
<i class="w3-xxlarge fa fa-plus-square"></i> Adicionar
</button>
</form>


      <a href="../food/cadastro.php">
        <button name="btnAdd" class="button">
          <i class="w3-xxlarge fa fa-plus-square"></i> Alimentos cadastrados
        </button>
      </a>

    </div>

    <?php
 $servername = "localhost";
 $username = "root";
 $password = "usbw";
 $dbname = "nutridb";
 $conexao = new mysqli($servername, $username, $password, $dbname);
 if ($conexao->connect_error) {
 die("Connection failed: " . $conexao->connect_error);
 }
 $sql = "SELECT * FROM alimentos" ;
 $resultado = $conexao->query($sql);
 if($resultado != null)
 foreach($resultado as $linha) {
 echo '<tr>';
 echo '<td><br>'.$linha['nome'].'</td>';
 echo '<td> <br>'.$linha['id'].'</td>';
 echo '</tr>';
 }
 $conexao->close();
 ?>
  </body>
</html>
