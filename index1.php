<?php

require_once ('../conexao.php');

$stmt = $conn->prepare("SELECT * FROM setores");
$stmt->execute();   
$inicio = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Setores</title>
</head>
<body>
    <h1>Setores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Setor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inicio as $ini): ?>
            <tr>
                <td><?php echo $ini['id']; ?></td>
                <td><?php echo $ini['setor']; ?></td>
                <td>
                    <a href="delete1.php?id=<?php echo $ini['id']; ?>"><button>Deletar</button></a>
                    <a href="story1.php?id=<?php echo $ini['id']; ?>"><button>Editar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="create1.php">Adicionar</a>
</body>
</html>