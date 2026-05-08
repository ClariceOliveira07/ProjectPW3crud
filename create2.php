<?php
include_once 'conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'] && isset($_POST['dt_nasc'])) {
    $stmt = $conn->prepare("INSERT INTO funcionarios (nome, dt_nasc) VALUES (:nome, :dt_nasc)");
    $stmt->bindValue(':nome', $_POST['nome']);
    $stmt->bindValue(':dt_nasc', $_POST['dt_nasc']);
    $stmt->execute();
    header('Location: index2.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Funcionários</title>
</head>
<body>
    <h1>Adicionar Funcionários</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="date" name="data" placeholder="00/00/0000" required>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index2.php">Voltar</a>
</body>
</html>
