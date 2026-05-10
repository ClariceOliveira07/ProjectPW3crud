<?php

require_once ('../conexao.php');

$stmt = $conn->prepare("SELECT * FROM funcionarios");
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
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inicio as $ini): ?>
            <tr>
                <td><?php echo $ini['id']; ?></td>
                <td><?php echo $ini['nome']; ?></td>
                <td>
                    <a href="delete2.php?id=<?php echo $ini['id']; ?>"><button>Deletar</button></a>
                    <a href="story2.php?id=<?php echo $ini['id']; ?>"><button>Editar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="create2.php">Adicionar</a>
</body>
</html>