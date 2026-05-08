<?php

include('protege.php'); 
include_once ('conexao.php');

$stmt = $conn->prepare("SELECT * FROM categorias");
$stmt->execute();   
$inicio = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Funcionários</title>
</head>
<body>
    <h1>Funcionários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ação</th>
        </tr>
        <?php foreach($inicio as $ini): ?>
        <tr>
            <td><?php echo $ini['id']; ?></td>
            <td><?php echo $ini['nome']; ?></td>
            <td><a href="create2.php?id=<?php echo $ini['id']; ?>">Deletar</a></td>
            <td><a href="story2.php?id=<?php echo $ini['id']; ?>">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="create2.php">Adicionar</a>
</body>
</html>