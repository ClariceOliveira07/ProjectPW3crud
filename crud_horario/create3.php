<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

require_once('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
    $stmt = $conn->prepare("INSERT INTO horarios (nome, hr_chegada, hr_saida) VALUES (:nome, :hr_chegada, :hr_saida)");
    $stmt->bindValue(':nome', $_POST['nome']);
    $stmt->bindValue(':hr_chegada', $_POST['hr_chegada']);
    $stmt->bindValue(':hr_saida', $_POST['hr_saida']);
    $stmt->execute();
    header('Location: index3.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Horários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdfaf3; } 
    </style>
</head>
<body>
    <header class="bg-sky-400 p-8 shadow-md">
        <div class="container mx-auto">
            <h1 class="text-white text-3xl font-bold tracking-tight">Horário</h1>
            <p class="text-sky-50 mt-1 opacity-90">Insira as informações do novo horário</p>
        </div>
    </header>
      <main class="container mx-auto py-10 px-4 flex justify-center">        
        <div class="bg-white rounded-xl shadow-sm border border-orange-100 overflow-hidden w-full max-w-md">            
            <div class="p-6 border-b border-orange-50 bg-white">
                <h2 class="text-xl font-semibold text-slate-700">Dados</h2>
            </div>
    <form method="post" class="p-8 space-y-6">
      <div>
        <label for="nome" class="block text-sm font-medium text-slate-600 mb-2">Nome completo:</label>
        <input type="text" name="nome" placeholder="Nome" required class="w-full px-4 py-2 border border-orange-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-300 focus:border-transparent transition">
      </div>
        <br>
      <div>
        <label for="dt_nasc" class="block text-sm font-medium text-slate-600 mb-2">Horário de entrada:</label>
        <input type="time" name="hr_chegada" class="w-full px-4 py-2 border border-orange-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-300 focus:border-transparent transition">
      </div>
        <br>
      <div>
        <label for="dt_nasc" class="block text-sm font-medium text-slate-600 mb-2">Horário de saída:</label>
        <input type="time" name="hr_saida" class="w-full px-4 py-2 border border-orange-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-300 focus:border-transparent transition">
      </div>
        <br>
      <div class="pt-4 flex flex-col gap-3">
        <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 rounded-lg shadow-sm transition duration-300">Adicionar</button>
        <a href="index3.php" class="w-full text-center text-slate-400 hover:text-slate-600 font-medium py-2 transition">Voltar</a>
      </div>
    </form>
   </div>
  </main>
    <footer class="mt-8 text-center text-slate-400 text-sm">
        &copy; Clarice Oliveira - 2026 - Projeto CRUD Programação Web
    </footer>
</body>
</html>
