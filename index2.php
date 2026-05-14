<?php

require_once ('../conexao.php');

$stmt = $conn->prepare("SELECT * FROM funcionarios");
$stmt->execute();   
$inicio = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Funcionários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdfaf3; } 
    </style>
</head>
<body class="text-slate-800 font-sans min-h-screen">
    <h1>Funcionários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inicio as $ini): ?>
            <tr>
                <td><?php echo $ini['id']; ?></td>
                <td><?php echo $ini['nome']; ?></td>
                <td><?php echo $ini['dt_nasc']; ?></td>
                <td class="px-6 py-4 text-center">
                    <a href="delete2.php?id=<?php echo $ini['id']; ?>" class="text-red-400 hover:text-red-600 font-bold text-sm transition" onclick="return confirm('Tem certeza que deseja deletar?')"><button>Deletar</button></a>
                    <a href="story2.php?id=<?php echo $ini['id']; ?>" class="text-sky-500 hover:text-sky-700 font-bold text-sm transition"><button>Editar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="create2.php">Adicionar</a>
</body>
</html>