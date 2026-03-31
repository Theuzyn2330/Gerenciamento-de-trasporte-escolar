<?php
require_once "includes/auth.php";
require_once "includes/conexao.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM escolas WHERE id = ?");
$stmt->execute([$id]);

header("Location: dashboard.php?pagina=escolas");
exit();

?>