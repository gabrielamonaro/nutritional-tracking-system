<?php
$host = "localhost";
$usuario = "root";
$senha = "usbw";
$bd = "nutricao";

try {
    $conecta = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $senha);
    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "falha ao conectar: " . $e->getMessage();
}

$sql = "INSERT INTO cadastro_diario (id_alimento, dia, horario, tp_refeicao, unidade_medida, quantidade, lugar, nivel_fome, registro) VALUES (:id_alimento, :dia, :horario, :tp_refeicao, :unidade_medida, :quantidade, :lugar, :nivel_fome, :registro)";

try {
    $stmt = $conecta->prepare($sql);

    $stmt->bindParam(':id_alimento', $_POST['id_alimento']);
    $stmt->bindParam(':dia', $_POST['dia']);
    
    $stmt->bindParam(':horario', $_POST['horario']);
    $stmt->bindParam(':tp_refeicao', $_POST['tp_refeicao']);
    
    $stmt->bindParam(':unidade_medida', $_POST['unidade_medida']);
    $stmt->bindParam(':quantidade', $_POST['quantidade']);
    $stmt->bindParam(':lugar', $_POST['lugar']);
    $stmt->bindParam(':nivel_fome', $_POST['nivel_fome']);
    $stmt->bindParam(':registro', $_POST['registro']);


    $stmt->execute();

    header("Location: ../index.php");
} catch(PDOException $e) {
    // echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
    header("Location: ../../error");
}
?>
