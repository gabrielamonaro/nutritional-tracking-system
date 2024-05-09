<?php
$host = "localhost";
$usuario = "root";
$senha = "usbw";
$bd = "nutridb";

try {
    $conecta = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $senha);
    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "falha ao conectar: " . $e->getMessage();
}

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO alimentos (nome) VALUES (:nome)";

try {
    // Prepare the statement
    $stmt = $conecta->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':nome', $_POST['txtNome']);

    // Execute the statement
    $stmt->execute();

    echo '<a href="index.php"><h1 class="w3-button w3-blue">Produto Salvo com sucesso!</h1></a>';
} catch(PDOException $e) {
    // Display meaningful error message
    echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
}
?>
