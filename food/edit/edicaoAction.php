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


$sql = "UPDATE cadastro_alimento SET nome = '".$_POST['txtNome']."', qualidade = '".$_POST['qualidade']."' WHERE id_alimento = ".$_GET['id'];

try {

    $conecta->query($sql);

    header("Location: ../index.php");
} catch(PDOException $e) {
    // echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
    header("Location: ../../error");

}
?>
