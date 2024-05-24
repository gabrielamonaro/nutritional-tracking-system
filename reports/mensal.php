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
        <?php
$meses = array(
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
);

$mesAtual = date('n');
$nomeMesAtual = $meses[$mesAtual];

echo '<h1 class="title">Relatório Mensal - '.$nomeMesAtual . '</h1>'
?>

        </div>
      </div>
    </header>

<table class="reports-table">

<?php
 $servername = "localhost";
 $username = "root";
 $password = "usbw";
 $dbname = "nutricao";
 $conexao = new mysqli($servername, $username, $password, $dbname);
 if ($conexao->connect_error) {
 die("Connection failed: " . $conexao->connect_error);
 }




 $sql_nivel_fome = "SELECT AVG(nivel_fome) AS media_nivel_de_fome 
 FROM cadastro_diario 
 WHERE MONTH(dia) = MONTH(CURRENT_DATE());
 ";
 $resultado_nivel_fome = $conexao->query($sql_nivel_fome);
 
 if ($resultado_nivel_fome) {
     $dados = $resultado_nivel_fome->fetch_assoc();
     
     if ($dados) {
 echo '<tr class="table-row">';
 echo '<td class="table-column"><br> Nível médio da fome </td>';
 echo '<td class="table-column"> <br>'. $dados['media_nivel_de_fome'] .'</td>';
 echo '</tr>';
     } else {
         // Se não houver dados, exibe uma mensagem de erro
         echo 'Nenhum dado encontrado.';
     }
 } else {
     // Se a consulta falhar, exibe uma mensagem de erro
     echo 'Erro ao executar a consulta: ' . $conexao->error;
 }



 $sql_lugar = "SELECT lugar, COUNT(*) AS total
 FROM cadastro_diario
 WHERE MONTH(dia) = MONTH(CURRENT_DATE())
 GROUP BY lugar
 ORDER BY total DESC
 LIMIT 1;
 ";
 $resultado_lugar = $conexao->query($sql_lugar);
 
 if ($resultado_lugar) {
     $dados = $resultado_lugar->fetch_assoc();
     
     if ($dados) {
 echo '<tr class="table-row">';
 echo '<td class="table-column"><br>Lugar onde mais se alimentou </td>';
 echo '<td class="table-column"> <br>'. $dados['lugar'] .'</td>';
 echo '</tr>';
     } else {
         // Se não houver dados, exibe uma mensagem de erro
         echo 'Nenhum dado encontrado.';
     }
 } else {
     // Se a consulta falhar, exibe uma mensagem de erro
     echo 'Erro ao executar a consulta: ' . $conexao->error;
 }
 

 


 $sql_qualidade = "SELECT AVG(ca.qualidade) AS qualidade_media
 FROM cadastro_diario cd
 JOIN cadastro_alimento ca ON cd.id_alimento = ca.id_alimento;";
 $resultado_qualidade = $conexao->query($sql_qualidade);
 
 if ($resultado_qualidade) {
     $dados = $resultado_qualidade->fetch_assoc();
     
     if ($dados) {
 echo '<tr class="table-row">';
 echo '<td class="table-column"><br>Qualidade média dos alimentos consumidos </td>';
 echo '<td class="table-column"> <br>'. $dados['qualidade_media'] .'</td>';
 echo '</tr>';
     } else {
         // Se não houver dados, exibe uma mensagem de erro
         echo 'Nenhum dado encontrado.';
     }
 } else {
     // Se a consulta falhar, exibe uma mensagem de erro
     echo 'Erro ao executar a consulta: ' . $conexao->error;
 }


 
 $sql_alimento_menos_saudavel = "SELECT ca.nome AS alimento,
 SUM(cd.quantidade) AS quantidade_consumida,
 MIN(ca.qualidade) AS qualidade_minima
FROM cadastro_diario cd
JOIN cadastro_alimento ca ON cd.id_alimento = ca.id_alimento
WHERE MONTH(cd.dia) = MONTH(CURRENT_DATE())
GROUP BY cd.id_alimento
ORDER BY qualidade_minima ASC, quantidade_consumida DESC;
";
 $resultado_alimento_menos_saudavel = $conexao->query($sql_alimento_menos_saudavel);
 
 if ($resultado_alimento_menos_saudavel) {
     $dados = $resultado_alimento_menos_saudavel->fetch_assoc();
     
     if ($dados) {
 echo '<tr class="table-row">';
 echo '<td class="table-column"><br>Alimento menos saudável mais consumido </td>';
 echo '<td class="table-column"> <br>'. $dados['alimento'] .'</td>';
 echo '</tr>';
     } else {
         // Se não houver dados, exibe uma mensagem de erro
         echo 'Nenhum dado encontrado.';
     }
 } else {
     // Se a consulta falhar, exibe uma mensagem de erro
     echo 'Erro ao executar a consulta: ' . $conexao->error;
 }


 $sql_refeicao_mais_consumida = "SELECT tp_refeicao,
 SUM(quantidade) AS quantidade_total_consumida
FROM cadastro_diario
WHERE MONTH(dia) = MONTH(CURRENT_DATE())
GROUP BY tp_refeicao
ORDER BY quantidade_total_consumida DESC
LIMIT 1;
";
 $resultado_refeicao_mais_consumida = $conexao->query($sql_refeicao_mais_consumida);
 
 if ($resultado_refeicao_mais_consumida) {
     $dados = $resultado_refeicao_mais_consumida->fetch_assoc();
     
     if ($dados) {
 echo '<tr class="table-row">';
 echo '<td class="table-column"><br>Refeição que mais consumiu </td>';
 echo '<td class="table-column"> <br>'. $dados['tp_refeicao'] .'</td>';
 echo '</tr>';
     } else {
         // Se não houver dados, exibe uma mensagem de erro
         echo 'Nenhum dado encontrado.';
     }
 } else {
     // Se a consulta falhar, exibe uma mensagem de erro
     echo 'Erro ao executar a consulta: ' . $conexao->error;
 }

 
 $conexao->close();
 ?>
</table>

  </body>
</html>
