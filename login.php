<?php
session_start();
require_once('conexao.php');

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema BLUEY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fdfaf3; } 
    </style>
</head>
<body class="text-slate-800 font-sans min-h-screen flex flex-col justify-between">
    <div class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md border border-orange-100 overflow-hidden">
            <div class="bg-sky-400 p-6 text-center text-white">
                <h1 class="text-3xl font-bold tracking-tight">Sistema BLUEY</h1>
                <p class="text-sky-50 mt-1 opacity-90 text-sm">Gerenciamento de RH - Projeto PW3</p>
            </div>
            <div class="p-8">
                <h2 class="text-xl font-semibold text-slate-700 text-center mb-6">Acesse sua Conta</h2>
                <?php if (!empty($erro)): ?>
                    <div class="bg-red-50 border border-red-200 text-red-600 text-sm p-3 rounded-lg mb-5 text-center font-medium">
                        <?php echo htmlspecialchars($erro); ?>
                    </div>
                <?php endif; ?>
                <form action="login.php" method="POST" class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-600 mb-1">E-mail corporativo</label>
                        <input type="email" name="email" id="email" required placeholder="exemplo@email.com" class="w-full px-4 py-2.5 border border-orange-100 rounded-lg focus:outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100 transition text-slate-700 bg-slate-50/50">
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="senha" class="text-sm font-semibold text-slate-600">Senha</label>
                            <a href="#" class="text-xs text-sky-500 hover:underline">Esqueceu a senha?</a>
                        </div>
                        <input type="password" name="senha" id="senha" required placeholder="••••••••" class="w-full px-4 py-2.5 border border-orange-100 rounded-lg focus:outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100 transition text-slate-700 bg-slate-50/50">
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 shadow-sm flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Entrar no Sistema
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="pb-6 text-center text-slate-400 text-sm">
        &copy; Clarice Oliveira - 2026 - Projeto CRUD Programação Web
    </footer>
</body>
</html>