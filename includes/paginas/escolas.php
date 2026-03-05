<?php
$result = $conn->query("SELECT * FROM escolas ORDER BY id DESC");
?>

<div class="table-container">

<h2>Escolas</h2>

<a href="dashboard.php?pagina=cadastrar_escola" class="btn-primary">
+ Nova Escola
</a>

<table>
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
        <a href="dashboard.php?pagina=editar_escola&id=<?= $escola['id'] ?>" class="btn-edit">
            📝
        </a>

        <a href="excluir_escola.php?id=<?= $escola['id'] ?>" 
           class="btn-delete"
           onclick="return confirm('Tem certeza que deseja excluir?')">
            🗑️
        </a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</div>