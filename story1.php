<?php
require_once ('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['setor'])) {
    $stmt = $conn->prepare("UPDATE setores SET setor = :setor WHERE id = :id");
    $stmt->bindValue(':setor', $_POST['setor']);
    $stmt->execute();
    header('Location: index1.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Setores</title>
</head>
<body>
    <h1>Atualizar Setor</h1>
    <form method="post">
        <label for="nome">Setor:</label>
        <input type="text" name="setor" placeholder="Setor" required>
        <br>
        <button type="submit">Atualizar</button>
    </form>
    <a href="index1.php">Voltar</a>
</body>
</html>