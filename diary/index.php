<!DOCTYPE html>
<html lang="pt-br" >
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
          <h1 class="title">Diário alimentar</h1>
        </div>
      </div>
    </header>

    <main class="table-container" style="width: 60%">

    <table cellspacing="4" style="width: 100%">
     <td class="table-column"><br>Alimento</td>
         <td class="table-column"><br>Horário</td>
         <td class="table-column"><br>Dia</td>
         <td class="table-column"><br>Refeição</td>
         <td class="table-column"><br>Quantidade</td>
         <td class="table-column"><br>Lugar</td>
         <td class="table-column"><br>Nível da fome</td>
            <?php
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "nutricao";
        $conexao = new mysqli($servername, $username, $password, $dbname);
        if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
        }


        $sql = "SELECT * 
        FROM cadastro_diario cd
        LEFT JOIN cadastro_alimento ca ON cd.id_alimento = ca.id_alimento;" ;
        $resultado = $conexao->query($sql);
        if($resultado != null)



        foreach($resultado as $linha) {
        echo '<tr class="table-row">';
        echo '<td class="table-column"><br>'.$linha['nome'].'</td>';
        echo '<td class="table-column"><br>'.$linha['horario'].'</td>';
        echo '<td class="table-column"><br>'.$linha['dia'].'</td>';
        echo '<td class="table-column"><br>'.$linha['tp_refeicao'].'</td>';
        echo '<td class="table-column"><br>'.$linha['quantidade'].$linha['unidade_medida'].'</td>';
        echo '<td class="table-column"><br>'.$linha['lugar'].'</td>';
        echo '<td class="table-column"><br>'.$linha['nivel_fome'].'</td>';
        echo '<td  class="action-table-column"><a href="edit/edicaoForm.php?id='.$linha['id'].'&horario='.$linha['horario'].'&id_alimento='.$linha['id_alimento'].'&dia='.$linha['dia'].'&tp_refeicao='.$linha['tp_refeicao'].'&quantidade='.$linha['quantidade'].'&unidade_medida='.$linha['unidade_medida'].'&lugar='.$linha['lugar'].'&nivel_fome='.$linha['nivel_fome'].'&registro='.$linha['registro'].'"><img  src="../assets/icons/edit-button.svg"/></a></td>';
        echo '<td  class="action-table-column"><a href="deleteAction.php?id='.$linha['id'].'"><img src="../assets/icons/delete-button.svg"/></a></td>';
        echo '</tr>';
        }
        $conexao->close();
        ?>
    </table>

  <a href="cadastro/cadastroForm.php" class="table-add-button">
    <button name="btnAdd"   >
    Adicionar
   </button>
  </a>
    </main>


  </body>
</html>
