<?php
require_once "includes/auth.php";
require_once "includes/conexao.php";

$id = $_GET['id'];

$busca = $conn->prepare("SELECT * FROM escolas WHERE id = ?");
$busca->bind_param("i", $id);
$busca->execute();
$resultado = $busca->get_result();
$escola = $resultado->fetch_assoc();

if (isset($_POST['atualizar'])) {

    $nome = $_POST['nome'];
    $responsavel = $_POST['responsavel'];
    $telefone = $_POST['telefone'];

    $stmt = $conn->prepare("UPDATE escolas SET nome=?, responsavel=?, telefone=? WHERE id=?");
    $stmt->bind_param("sssi", $nome, $responsavel, $telefone, $id);
    $stmt->execute();

    header("Location: dashboard.php?pagina=escolas");
    exit();
}
?>


<div class="table-container">

<h2>Editar Escola</h2>

<form method="POST">

<input type="text" name="nome" value="<?= $escola['nome'] ?>" required>

<input type="text" name="responsavel" value="<?= $escola['responsavel'] ?>">

<input type="text" name="telefone" value="<?= $escola['telefone'] ?>">

<br>

<button class="btn-primary" type="submit" name="atualizar">
Atualizar
</button>

<a class="btn-delete" href="dashboard.php?pagina=escolas">
Cancelar
</a>

</form>

</div>

<a href="dashboard.php?pagina=escolas">Cancelar</a>