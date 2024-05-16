?:<!DOCTYPE html>
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

    <form action="edicaoAction.php?<?php echo "id='".$_GET['id']?>'" class="w3-container" method='post'>

<label class="w3-text-blue" style="fontweight: bold;">Nome</label>
<input disabled name="id_alimento" value="<?php echo $_GET['id_alimento']?>"><br>


<label class="w3-text-blue" style="fontweight: bold;">Data</label>
<input name="dia" type="date" value="<?php echo $_GET['dia']?>"><br>

<label class="w3-text-blue" style="fontweight: bold;">Horário</label>
<input name="horario" type="time" value="<?php echo $_GET['horario']?>"><br>

<label class="w3-text-blue" style="fontweight: bold;">Refeição</label>

<?php
  if( $_GET['tp_refeicao'] === 'almoco') {
    echo '<select name="tp_refeicao">
    <option value="cafe da manha"> Café da manhã </option>
    <option value="almoco" selected> Almoço </option>
    <option value="cafe da tarde"> Café da tarde </option>
    <option value="jantar"> Jantar </option>
  </select>';
  } else if ( $_GET['tp_refeicao'] === 'cafe da tarde'){
    echo '<select name="tp_refeicao">
    <option value="cafe da manha"> Café da manhã </option>
    <option value="almoco"> Almoço </option>
    <option value="cafe da tarde" selected> Café da tarde </option>
    <option value="jantar"> Jantar </option>
  </select>';
} else if ($_GET['tp_refeicao'] === 'jantar') {
  echo '<select name="tp_refeicao">
  <option value="cafe da manha"> Café da manhã </option>
  <option value="almoco"> Almoço </option>
  <option value="cafe da tarde" > Café da tarde </option>
  <option value="jantar" selected> Jantar </option>
</select>';
} else {
  echo '<select name="tp_refeicao">
  <option value="cafe da manha" selected> Café da manhã </option>
  <option value="almoco"> Almoço </option>
  <option value="cafe da tarde" > Café da tarde </option>
  <option value="jantar"> Jantar </option>
</select>';
}
?>


<br>

<label class="w3-text-blue" style="fontweight: bold;">Unidade de medida</label>

<?php
  if( $_GET['unidade_medida'] === 'mililitro') {
    echo '<select name="unidade_medida">
    <option> grama </option>
    <option selected> mililitro </option>
  </select>';
  } else {
    echo '<select name="unidade_medida">
    <option selected> grama </option>
    <option > mililitro </option>
  </select>';
} 
?>

<br>

<label class="w3-text-blue" style="fontweight: bold;">Quantidade</label>
<input name="quantidade" type="number" value="<?php echo $_GET['quantidade']?>">
<br>

<label class="w3-text-blue" style="fontweight: bold;">Lugar</label>
<?php
  if( $_GET['lugar'] === 'fora') {
    echo '<select name="lugar">
    <option value="casa"> Casa </option>
    <option value="fora" selected> Fora </option>
  </select> ';
  } else {
    echo '<select name="lugar">
    <option value="casa" selected> Casa </option>
    <option value="fora"> Fora </option>
  </select> ';
} 
?>
 
<br>

<label class="w3-text-blue" style="fontweight: bold;">Nível da fome</label>
<?php
  if(  $_GET['nivel_fome'] === '2') {
    echo '<select name="nivel_fome">
    <option value="1"> 1 </option>
    <option value="2" selected> 2 </option>
    <option value="3"> 3 </option>
  </select>  ';
  }  else if(  $_GET['nivel_fome'] === '3') {
    echo '<select name="nivel_fome">
    <option value="1"> 1 </option>
    <option value="2" > 2 </option>
    <option value="3" selected> 3 </option>
  </select>  ';
} else {
  echo '<select name="nivel_fome">
  <option value="1" selected> 1 </option>
  <option value="2" > 2 </option>
  <option value="3" > 3 </option>
</select>  ';
}
?>

<br>

<label class="w3-text-blue" style="fontweight: bold;">Observações</label>
<textarea name="registro"> <?php echo $_GET['registro']?></textarea>
<br>

<button name="btnAdd" class="">
 Atualizar
</button>
</form>


    



    </div>
  </body>
</html>
