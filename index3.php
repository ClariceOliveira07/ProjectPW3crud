<?php

require_once ('../conexao.php');

$stmt = $conn->prepare("SELECT * FROM horarios");
$stmt->execute();   
$inicio = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Horários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdfaf3; } 
    </style>
</head>
<body class="text-slate-800 font-sans min-h-screen">
    <header class="bg-sky-400 p-8 shadow-md">
        <div class="container mx-auto">
            <h1 class="text-white text-3xl font-bold tracking-tight">Sistema de Horários</h1>
            <p class="text-sky-50 mt-1 opacity-90">Gerenciamento de RH - Projeto PW3</p>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4">

        <div class="bg-white rounded-xl shadow-sm border border-orange-100 overflow-hidden">
            <div class="p-6 border-b border-orange-50 flex justify-between items-center bg-white">
                <h2 class="text-xl font-semibold text-slate-700">Tabela de Horários</h2>
                <a href="create2.php" class="bg-sky-500 hover:bg-sky-600 text-white px-5 py-2 rounded-lg font-bold transition duration-300 shadow-sm flex items-center gap-2">
                    <span class="text-lg">+</span> Adicionar Novo
                </a>
            </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead class="bg-orange-50/50 text-slate-500 text-xs uppercase tracking-wider">
            <tr>
                <th class="px-6 py-4 font-semibold">ID</th>
                <th class="px-6 py-4 font-semibold">Nome</th>
                <th class="px-6 py-4 font-semibold">Entrada</th>
                <th class="px-6 py-4 font-semibold">Saída</th>
                <th class="px-6 py-4 font-semibold">Ação</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-orange-50">
            <?php foreach($inicio as $ini): ?>
            <tr class="hover:bg-sky-50/30 transition-colors">
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