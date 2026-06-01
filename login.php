<?php
session_start();
require_once('conexao.php');

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["senha"], $_POST["email"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $email = strtolower(trim($_POST['email'])); 
        $senha = trim($_POST["senha"]);

        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":email" => $email
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_OBJ);

        if (!$usuario || !password_verify($senha, $usuario->senha)) {
            throw new Exception("Email ou senha inválidos");
        }

        $_SESSION['idUser'] = $usuario->id;
        $_SESSION['email'] = $usuario->email;

        header("Location: index.php?status=sucesso_login");
        exit;

    } catch (Exception $e) {
        $erro = $e->getMessage();
        echo $erro; 
    } catch (PDOException $e) {
        $erro = "Erro interno, pedimos desculpa";
    };
};
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