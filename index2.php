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
    <table class="w-full text-left border-collapse">
        <thead class="bg-orange-50/50 text-slate-500 text-xs uppercase tracking-wider">
            <tr>
                <th class="px-6 py-4 font-semibold">ID</th>
                <th class="px-6 py-4 font-semibold">Nome</th>
                <th class="px-6 py-4 font-semibold">Data de nascimento</th>
                <th class="px-6 py-4 font-semibold">Ação</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-orange-50">
            <?php foreach($inicio as $ini): ?>
            <tr class="hover:bg-sky-50/30 transition-colors">
                <td class="px-6 py-4 text-sm text-slate-500"><?php echo $ini['id']; ?></td>
                <td class="px-6 py-4 font-medium text-slate-700"><?php echo $ini['nome']; ?></td>
                <td class="px-6 py-4 text-center text-slate-600"><?php echo $ini['dt_nasc']; ?></td>
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