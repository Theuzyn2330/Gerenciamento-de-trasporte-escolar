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

    header("Location: dashboard.php?pagina=escolas");
    exit();
}
?>

<div class="table-container">

<h2>Nova Escola</h2>

<form method="POST">

<input type="text" name="nome" placeholder="Nome da escola" required>

<input type="text" name="responsavel" placeholder="Nome do responsável">

<input type="text" name="telefone" placeholder="Telefone">

<br>

<button class="btn-primary" type="submit" name="salvar">
Salvar
</button>

<a class="btn-delete" href="dashboard.php?pagina=escolas">
Cancelar
</a>

</form>

</div>

<a href="dashboard.php?pagina=escolas">Cancelar</a>