<?php
include('conexao.php');
include('protege.php'); 
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
    <p>Esta é uma área restrita.</p>
    <a href="logout.php">Sair do sistema</a>
</body>
</html>