<?php
require_once "includes/auth.php";
require_once "includes/conexao.php";

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM alunos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: dashboard.php?pagina=alunos");
exit();

?>