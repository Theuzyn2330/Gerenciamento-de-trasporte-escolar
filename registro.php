<?php
session_start();
require_once "includes/conexao.php";

$erro = "";
$sucesso = "";

if (isset($_POST['registrar'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

if (!empty($username) && !empty($password)) {
    //verefica se o usuário já existe
    $check = $pdo->prepare("SELECT id FROM usuarios WHERE username = ?");
    $check->execute([$username]);

    if ($check->rowCount() > 0){
        $erro = "Usuário já existe. Por favor, escolha outro nome de usuário.";
    } else {
        //Criptografa a senha antes de salvar(SEGURANÇA)
        $senhaHash = password_hash($password, PASSWORD_DEFAULT);

        //insere no banco
        $sql = "INSERT INTO usuarios (username, senha) VALUES (:user, :pass)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':user' => $username,
                ':pass' => $senhaHash
            ]);
            $sucesso = "Registro bem-sucedido! Você já pode fazer login.";
        } catch (PDOException $e) {
            $erro = "Erro ao registrar: " . $e->getMessage();
             }

        }   
    }
    
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro - Transporte Escolar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">
    <div class="login-container">
        <div class="login-card">
            <h1>📝 Criar Conta</h1>
            <?php if($erro): ?> <p style="color:red;"><?= $erro ?></p> <?php endif; ?>
            <?php if($sucesso): ?> <p style="color:green;"><?= $sucesso ?></p> <?php endif; ?>

            <form method="POST">
                <input type="text" name="username" placeholder="Escolha um usuário" required>
                <input type="password" name="password" placeholder="Escolha uma senha" required>
                <button type="submit" name="registrar">Cadastrar</button>
            </form>
            <p><a href="index.php">Voltar para o Login</a></p>
        </div>
    </div>
</body>
</html>

