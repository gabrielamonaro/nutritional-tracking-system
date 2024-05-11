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

$sql = "UPDATE alimentos SET nome = :nome WHERE id = :id";

try {
    $stmt = $conecta->prepare($sql);

    $stmt->bindParam(':nome', $_POST['txtNome']);
    $stmt->bindParam(':id', $_POST['id']); // Supondo que você esteja passando o ID do registro a ser editado através de um campo oculto no formulário HTML.

    $stmt->execute();

    header("Location: ../index.php");
    // echo '<a href="index.php"><h1 class="w3-button w3-blue">Produto editado com sucesso!</h1></a>';
} catch(PDOException $e) {
    echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
}
?>
