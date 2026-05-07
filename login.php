<?php
include('conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: index.php");
                exit();
            } else {
                $erro = "E-mail ou senha inválidos.";
            }
        } catch (PDOException $e) {
            $erro = "Erro no banco de dados: " . $e->getMessage();
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