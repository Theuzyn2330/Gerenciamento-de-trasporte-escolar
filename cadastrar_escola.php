<?php
require_once "includes/auth.php";
require_once "includes/conexao.php";

if (isset($_POST['salvar'])) {

    $nome = $_POST['nome'];
    $responsavel = $_POST['responsavel'];
    $telefone = $_POST['telefone'];

    $stmt = $conn->prepare("INSERT INTO escolas (nome, responsavel, telefone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $responsavel, $telefone);
    $stmt->execute();

    header("Location: escolas.php");
    exit();
}
?>

<h2>Nova Escola</h2>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome da escola" required><br><br>
    <input type="text" name="responsavel" placeholder="Nome do responsável"><br><br>
    <input type="text" name="telefone" placeholder="Telefone"><br><br>
    <button type="submit" name="salvar">Salvar</button>
</form>

<a href="escolas.php">Cancelar</a>