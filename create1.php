<?php

require_once ('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['setor'])) {
    $stmt = $conn->prepare("INSERT INTO setores (setor) VALUES (:setor)");
    $stmt->bindValue(':setor', $_POST['setor']);
    $stmt->execute();
    header('Location: index1.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Setores</title>
</head>
<body>
    <h1>Adicionar Setor</h1>
    <form method="post">
        <label for="nome">Setor:</label>
        <input type="text" name="setor" placeholder="Setor" required>
        <br>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index1.php">Voltar</a>
</body>
</html>
