<?php
require_once ('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
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
    <h1>Adicionar Funcionário</h1>
    <form method="post">
        <label for="nome">Nome completo:</label>
        <input type="text" name="nome" placeholder="Nome" required>
        <br>
        <label for="dt_nasc">Data de Nascimento:</label>
        <input type="date" name="dt_nasc">
        <br>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index2.php">Voltar</a>
</body>
</html>
