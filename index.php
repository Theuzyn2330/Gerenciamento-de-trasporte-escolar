<?php
session_start();
require_once "includes/conexao.php";

if (isset($_POST['entrar'])) {
    
    $username = trim($_POST['username']);
    
    if (!empty($username)) {
        
        // Verifica se já existe
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            
            $_SESSION['usuario'] = $username;
            
        } else {
            
            // Cria usuário automaticamente
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
<html>
<head>
    <title>Gerenciamento de Transporte Escolar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Gerenciamento de Transporte Escolar</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Digite seu nome de usuário" required>
    <button type="submit" name="entrar">Entrar</button>
</form>

</body>
</html>