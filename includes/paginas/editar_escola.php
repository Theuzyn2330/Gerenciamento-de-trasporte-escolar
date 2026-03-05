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

    header("Location: escolas.php");
    exit();
}
?>

<h2>Editar Escola</h2>

<form method="POST">
    <input type="text" name="nome" value="<?= $escola['nome'] ?>" required><br><br>
    <input type="text" name="responsavel" value="<?= $escola['responsavel'] ?>"><br><br>
    <input type="text" name="telefone" value="<?= $escola['telefone'] ?>"><br><br>
    <button type="submit" name="atualizar">Atualizar</button>
</form>

<a href="escolas.php">Cancelar</a>