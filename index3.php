<?php

require_once ('../conexao.php');

$stmt = $conn->prepare("SELECT * FROM horarios");
$stmt->execute();   
$inicio = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Horários</title>
</head>
<body>
    <h1>Horários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Chegada</th>
                <th>Saída</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inicio as $ini): ?>
            <tr>
                <td><?php echo $ini['id']; ?></td>
                <td><?php echo $ini['nome']; ?></td>
                <td><?php echo $ini['hr_chegada']; ?></td>
                <td><?php echo $ini['hr_saida']; ?></td>
                <td>
                    <a href="delete3.php?id=<?php echo $ini['id']; ?>"><button>Deletar</button></a>
                    <a href="story3.php?id=<?php echo $ini['id']; ?>"><button>Editar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="create3.php">Adicionar</a>
</body>
</html>