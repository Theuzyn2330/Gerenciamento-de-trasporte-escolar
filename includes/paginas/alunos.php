<?php
require_once "includes/conexao.php";

$sql = "
SELECT alunos.*, escolas.nome AS escola_nome
FROM alunos
JOIN escolas ON alunos.escola_id = escolas.id
ORDER BY alunos.nome
";

$result = $conn->query($sql);
?>

<div class="table-container">

<h2>Alunos</h2>

<a class="btn-primary" href="dashboard.php?pagina=cadastrar_aluno">
+ Novo Aluno
</a>

<table>

<tr>
<th>Nome</th>
<th>Escola</th>
<th>Turno</th>
<th>Telefone</th>
<th>Ações</th>
</tr>

<?php while($aluno = $result->fetch_assoc()) { ?>

<tr>

<td><?php echo $aluno['nome']; ?></td>

<td><?php echo $aluno['escola_nome']; ?></td>

<td><?php echo $aluno['turno']; ?></td>

<td><?php echo $aluno['telefone_responsavel']; ?></td>

<td>

<a class="btn-edit"
href="dashboard.php?pagina=editar_aluno&id=<?php echo $aluno['id']; ?>">
📝
</a>

<a class="btn-delete"
href="excluir_aluno.php?id=<?php echo $aluno['id']; ?>">
🗑️
</a>

</td>

</tr>

<?php } ?>

</table>

</div>