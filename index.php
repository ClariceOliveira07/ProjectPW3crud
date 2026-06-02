<?php
session_start();
 
require_once('conexao.php');

$stmt = $conn->prepare("SELECT * FROM categorias");
$stmt->execute();   
$inicio = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['email']; ?>!</h1>
    <p>Esta é uma área restrita.</p>
    <a href="logout.php">Sair do sistema</a>
</body>
</html>