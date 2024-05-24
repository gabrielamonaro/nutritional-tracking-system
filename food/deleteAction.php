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
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_alimento = $_GET['id'];
    
    try {
        $check_sql = "SELECT COUNT(*) FROM cadastro_diario WHERE id_alimento = :id_alimento";
        $stmt = $conecta->prepare($check_sql);
        $stmt->bindParam(':id_alimento', $id_alimento, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            header("Location: ../error/index.php?value=Não é possível excluir este alimento, pois está sendo utilizado em registros diários.");
            exit(); 
        }
        
        $sql = "DELETE FROM cadastro_alimento WHERE id_alimento = :id_alimento";
        $stmt = $conecta->prepare($sql);
        $stmt->bindParam(':id_alimento', $id_alimento, PDO::PARAM_INT);
        $stmt->execute();
        
        header("Location: ../index.php");
        exit(); 
    } catch(PDOException $e) {
        echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ' . $e->getMessage() . '</h1></a>';
    }
} else {
    echo '<a href="index.php"><h1 class="w3-button w3-blue">ERRO: ID do alimento inválido.</h1></a>';
}
?>
