<?php
require_once "includes/conexao.php";

$data = isset($_GET['data']) ? $_GET['data'] : date("Y-m-d");

$sql = "
SELECT alunos.*, escolas.nome AS escola_nome
FROM alunos
JOIN escolas ON alunos.escola_id = escolas.id
WHERE alunos.ativo = 1
ORDER BY escolas.nome
";

$alunos = $conn->query($sql);
?>

<h2>Registro Diário</h2>

<form method="GET">

<label>Selecionar data:</label>

<input type="date" name="data" value="<?php echo $data; ?>">

<button type="submit">Ver</button>

</form>

<form method="POST" action="includes/paginas/salvar_registro.php">

<input type="hidden" name="data" value="<?php echo $data; ?>">

<table>

<tr>
<th>Aluno</th>
<th>Escola</th>
<th>Foi para escola</th>
<th>Voltou para casa</th>
<th>Parcial</th>
</tr>

<?php while($aluno = $alunos->fetch_assoc()) { ?>

<tr>

<td><?php echo $aluno['nome']; ?></td>

<td><?php echo $aluno['escola_nome']; ?></td>

<td>
<input type="checkbox"
name="foi_escola[<?php echo $aluno['id']; ?>]"
value="1">
</td>

<td>
<input type="checkbox"
name="voltou_casa[<?php echo $aluno['id']; ?>]"
value="1">
</td>

<td>
<input type="checkbox"
name="parcial[<?php echo $aluno['id']; ?>]"
value="1">
</td>

</tr>

<?php } ?>

</table>

<button type="submit">Salvar registros</button>

</form>