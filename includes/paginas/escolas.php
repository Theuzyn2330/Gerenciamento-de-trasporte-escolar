<?php
$result = $conn->query("SELECT * FROM escolas ORDER BY id DESC");
?>

<h2>Escolas</h2>

<a href="dashboard.php?pagina=cadastrar_escola">+ Nova Escola</a>

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
        <a href="dashboard.php?pagina=editar_escola&id=<?= $escola['id'] ?>">Editar</a> |
        <a href="excluir_escola.php?id=<?= $escola['id'] ?>">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>

</table>