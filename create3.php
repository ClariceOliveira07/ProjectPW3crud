<?php
require_once ('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
    $stmt = $conn->prepare("INSERT INTO horarios (nome, hr_chegada, hr_saida) VALUES (:nome, :hr_chegada, :hr_saida)");
    $stmt->bindValue(':nome', $_POST['nome']);
    $stmt->bindValue(':hr_chegada', $_POST['hr_chegada']);
    $stmt->bindValue(':hr_saida', $_POST['hr_saida']);
    $stmt->execute();
    header('Location: index3.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Horários</title>
</head>
<body>
    <h1>Adicionar Horários</h1>
    <form method="post">
        <label for="nome">Nome completo:</label>
        <input type="text" name="nome" placeholder="Nome" required>
        <br>
        <label for="hr_chegada">Horário de entrada:</label>
        <input type="time" name="hr_chegada">
        <br>
        <label for="hr_saida">Horário de saída:</label>
        <input type="time" name="hr_saida">
        <br>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index3.php">Voltar</a>
</body>
</html>
