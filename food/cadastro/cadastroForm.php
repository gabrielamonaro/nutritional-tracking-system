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
    <link rel="stylesheet" href="../../styles/global.css" />
    <link rel="stylesheet" href="../style.css" />
    <title>Nutritional Tracking System</title>
  </head>
  <body>
  <header>
      <div class="home-button">
        <a href="../../home/">

          <img src="../../assets/icons/home.svg" class="home-icon"/>
        </a>
      </div>
      <div class="header-container">
        <img class="logo" src="../../assets/img/food-and-restaurant.png" />
        <div class="container-title">
          <h1 class="title">Alimentos</h1>
        </div>
      </div>
    </header>
    <div class="buttons-container">

    <form action="cadastroAction.php" class="w3-container" method='post'>
    <div class="field-container">

<label style="fontweight: bold;">Nome</label>
<input name="txtNome"><br> </div>

<label  style="fontweight: bold;">Qualidade</label>
<div class="field-container">
  <select name="qualidade">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>

<button name="btnAdd" class="">
 Adicionar
</button>
</form>


    </div>
  </body>
</html>
