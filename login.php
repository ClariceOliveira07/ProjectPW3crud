<?php
include('conexao.php');

session_start();

if (isset($_SESSION['id'])) {
    header('Location: index.php');
    exit(); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email) || empty($senha)) {
        $erro = 'Por favor, preencha o e-mail e a senha.';

    } else {
        $pdo = $conn;
        $stmt = $pdo->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['id']    = $usuario['id'];
            $_SESSION['senha']  = $usuario['senha'];
            $_SESSION['email'] = $usuario['email'];

            header('Location: index.php');
            exit();

        } else {
            $erro = 'E-mail ou senha inválidos. Tente novamente.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h1>Login</h1>
    <?php if(isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    
    <form action="" method="POST">
        <label>E-mail:</label>
        <input type="email" name="email" required placeholder="E-mail">
        
        <label>Senha:</label>
        <input type="password" name="senha" required placeholder="Senha">
        
        <button type="submit">Enviar</button>
    </form>

</body>
</html>