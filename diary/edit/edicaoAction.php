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


$sql = "UPDATE cadastro_diario SET registro = '".$_POST['registro']."', lugar = '".$_POST['lugar']."', quantidade = '".$_POST['quantidade']."', unidade_medida = '".$_POST['unidade_medida']."', tp_refeicao = '".$_POST['tp_refeicao']."', dia = '".$_POST['dia']."', horario = '".$_POST['horario']."', nivel_fome = '".$_POST['nivel_fome']."' WHERE id = ".$_GET['id'];

try {

    $conecta->query($sql);

    header("Location: ../index.php");
} catch(PDOException $e) {
    echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
    // header("Location: ../../error");

}
?>
