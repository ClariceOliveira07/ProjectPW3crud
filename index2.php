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
    <header class="bg-sky-400 p-8 shadow-md">
        <div class="container mx-auto">
            <h1 class="text-white text-3xl font-bold tracking-tight">Sistema de Funcionários</h1>
            <p class="text-sky-50 mt-1 opacity-90">Gerenciamento de RH - Projeto PW3</p>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4">
        
        <div class="bg-white rounded-xl shadow-sm border border-orange-100 overflow-hidden">
            
            <div class="p-6 border-b border-orange-50 flex justify-between items-center bg-white">
                <h2 class="text-xl font-semibold text-slate-700">Tabela de Funcionários</h2>
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
                    <div class="flex justify-center gap-3">
                        <a href="delete2.php?id=<?php echo $ini['id']; ?>" class="text-red-400 hover:text-red-600 font-bold text-sm transition" onclick="return confirm('Tem certeza que deseja deletar?')"><button>Deletar</button></a>
                        <a href="story2.php?id=<?php echo $ini['id']; ?>" class="text-sky-500 hover:text-sky-700 font-bold text-sm transition"><button>Editar</button></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    </div>
    <footer class="mt-8 text-center text-slate-400 text-sm">
        &copy; Clarice Oliveira - 2026 - Projeto CRUD Programação Web
    </footer>
    </main>
</body>
</html>