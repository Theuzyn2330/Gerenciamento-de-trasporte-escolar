<?php
session_start();
require_once "includes/conexao.php";

if (isset($_POST['entrar'])) {

    $username = trim($_POST['username']);

    if (!empty($username)) {

        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {

            $_SESSION['usuario'] = $username;

        } else {

            $insert = $conn->prepare("INSERT INTO usuarios (username) VALUES (?)");
            $insert->bind_param("s", $username);
            $insert->execute();

            $_SESSION['usuario'] = $username;
        }

        header("Location: dashboard.php");
        exit();
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
            <button type="submit" name="entrar">Entrar</button>
        </form>

    </div>

</div>

</body>
</html>