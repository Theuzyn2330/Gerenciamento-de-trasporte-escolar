<?php
session_start();
require_once "includes/conexao.php";

$erro = "";

if (isset($_POST['entrar'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {

        $stmt = $pdo->prepare("SELECT id, username, senha FROM usuarios WHERE username = :username");       
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch (PDO::FETCH_ASSOC);

        // Se o usuário existir
        if ($user) {
            //Verificação de senha por criptografia
            if (password_verify($password, $user['senha'])) {
                $_SESSION['usuario'] = $username;
                $_SESSION['usuario_id'] = $user['id'];
                header("Location: dashboard.php");
                exit();
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Usuário não encontrado. Por favor, registre-se.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerenciamento de Transporte Escolar</title>

<link rel="stylesheet" href="css/style.css">
</head>

<body class="login-body">

<div class="login-container">

    <div class="login-card">

        <h1>🚌 Transporte Escolar</h1>
        <p>Gerenciamento de Transporte Escolar</p>

        <form method="POST">
            <input type="text" name="username" placeholder="Digite seu nome de usuário" required>
            <input type="password" name="password" placeholder="Digite sua senha" required>
            <button type="submit" name="entrar">Entrar</button>
            <p>Não tem uma conta? <a href="registro.php">Registrar-se</a></p>
            <?php if($erro): ?> <p style="color:red;"><?= $erro ?></p> <?php endif; ?>
        </form>

    </div>

</div>

</body>
</html>