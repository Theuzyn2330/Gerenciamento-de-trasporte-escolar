<?php
require_once "includes/auth.php";
require_once "includes/conexao.php";

$result = $conn->query("SELECT * FROM escolas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Escolas</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Escolas</h2>

<a href="cadastrar_escola.php">+ Nova Escola</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nome</th>
        <th>Responsável</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>

    <?php while($escola = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $escola['nome'] ?></td>
        <td><?= $escola['responsavel'] ?></td>
        <td><?= $escola['telefone'] ?></td>
        <td>
            <a href="editar_escola.php?id=<?= $escola['id'] ?>">Editar</a> |
            <a href="excluir_escola.php?id=<?= $escola['id'] ?>" 
               onclick="return confirm('Tem certeza que deseja excluir?')">
               Excluir
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

<a href="dashboard.php">Voltar</a>

</body>
</html>