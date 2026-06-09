<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Sistema BLUEY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdfaf3; } 
    </style>
</head>
<body class="text-slate-800 font-sans min-h-screen">

    <header class="bg-sky-400 p-8 shadow-md">
        <div class="container mx-auto">
          <div class="container mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="block">
                <h1 class="text-white text-3xl font-bold tracking-tight">Sistema BLUEY</h1>
                <p class="text-sky-50 mt-1 opacity-90">Painel Principal - Projeto PW3</p>
            </div>
            <div class="flex gap-3">
              <a href="logout.php" class="bg-red-500/80 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-lg transition-colors shadow-sm text-sm flex items-center gap-2">
                Sair do Sistema
              </a>
            </div>
          </div>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4 max-w-4xl">
        
        <div class="bg-white rounded-xl shadow-sm border border-orange-100 overflow-hidden mb-8 p-8 text-center sm:text-left">
            <h2 class="text-3xl font-bold text-slate-700">Bem-vindo, <span class="text-sky-500"><?php echo htmlspecialchars($_SESSION['email']); ?></span>!</h2>
            <p class="text-slate-500 mt-2 text-lg">Esta é a sua área restrita de gerenciamento do Sistema BLUEY. Selecione uma das opções abaixo para navegar:</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <a href="../crud_funcionario/index2.php" class="bg-white p-6 rounded-xl shadow-sm border border-orange-100 hover:border-sky-300 hover:shadow-md transition group text-center block">
                <div class="w-12 h-12 bg-sky-100 text-sky-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-sky-500 group-hover:text-white transition">
                    <span class="text-xl font-bold">👤</span>
                </div>
                <h3 class="text-lg font-bold text-slate-700 mb-1">Funcionários</h3>
                <p class="text-sm text-slate-400">Gerenciar o cadastro dos colaboradores.</p>
            </a>

            <a href="../crud_horario/index3.php" class="bg-white p-6 rounded-xl shadow-sm border border-orange-100 hover:border-sky-300 hover:shadow-md transition group text-center block">
                <div class="w-12 h-12 bg-sky-100 text-sky-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-sky-500 group-hover:text-white transition">
                    <span class="text-xl font-bold">⏰</span>
                </div>
                <h3 class="text-lg font-bold text-slate-700 mb-1">Horários</h3>
                <p class="text-sm text-slate-400">Controlar jornadas de trabalho e escalas.</p>
            </a>

            <a href="../crud_setor/index1.php" class="bg-white p-6 rounded-xl shadow-sm border border-orange-100 hover:border-sky-300 hover:shadow-md transition group text-center block">
                <div class="w-12 h-12 bg-sky-100 text-sky-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-sky-500 group-hover:text-white transition">
                    <span class="text-xl font-bold">🏢</span>
                </div>
                <h3 class="text-lg font-bold text-slate-700 mb-1">Setores</h3>
                <p class="text-sm text-slate-400">Organizar os departamentos da empresa.</p>
            </a>

        </div>

        <footer class="mt-16 text-center text-slate-400 text-sm">
            &copy; Clarice Oliveira - 2026 - Projeto CRUD Programação Web
        </footer>
    </main>
</body>
</html>