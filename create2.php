<?php
require_once ('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
    $stmt = $conn->prepare("INSERT INTO funcionarios (nome, dt_nasc) VALUES (:nome, :dt_nasc)");
    $stmt->bindValue(':nome', $_POST['nome']);
    $stmt->bindValue(':dt_nasc', $_POST['dt_nasc']);
    $stmt->execute();
    header('Location: index2.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Funcionários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdfaf3; } 
    </style>
</head>
<body>
    <header class="bg-sky-400 p-8 shadow-md">
        <div class="container mx-auto">
            <h1 class="text-white text-3xl font-bold tracking-tight">Novo Cadastro</h1>
            <p class="text-sky-50 mt-1 opacity-90">Insira as informações do novo funcionário</p>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4 flex justify-center">
        
        <div class="bg-white rounded-xl shadow-sm border border-orange-100 overflow-hidden w-full max-w-md">
            
            <div class="p-6 border-b border-orange-50 bg-white">
                <h2 class="text-xl font-semibold text-slate-700">Dados Pessoais</h2>
            </div>

            <form method="post" class="p-8 space-y-6">
    <form method="post">
      <div>
        <label for="nome" class="block text-sm font-medium text-slate-600 mb-2">Nome completo:</label>
        <input type="text" name="nome" placeholder="Nome" required class="w-full px-4 py-2 border border-orange-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-300 focus:border-transparent transition">
        <br>
        <label for="dt_nasc">Data de Nascimento:</label>
        <input type="date" name="dt_nasc">
        <br>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index2.php">Voltar</a>
</body>
</html>
