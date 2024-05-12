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

$sql = "INSERT INTO cadastro_alimento (nome, qualidade) VALUES (:nome, :qualidade)";

try {
    $stmt = $conecta->prepare($sql);

    $stmt->bindParam(':nome', $_POST['txtNome']);
    $stmt->bindParam(':qualidade', $_POST['qualidade']);

    $stmt->execute();

    header("Location: ../index.php");
    // echo '<a href="index.php"><h1 class="w3-button w3-blue">Produto Salvo com sucesso!</h1></a>';
} catch(PDOException $e) {
    echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
}
?>
