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
<div class="cards-container">

<?php while($aluno = $alunos->fetch_assoc()) { ?>

<div class="card-aluno">

    <div class="card-header">
        <strong><?php echo $aluno['nome']; ?></strong>
        <span><?php echo $aluno['escola_nome']; ?></span>
    </div>

    <div class="card-body">

        <label class="checkbox-group">
            <input type="checkbox" name="foi_escola[<?php echo $aluno['id']; ?>]" value="1">
            <span class="checkmark"></span>
            Foi para escola
        </label>

        <label class="checkbox-group">
            <input type="checkbox" name="voltou_casa[<?php echo $aluno['id']; ?>]" value="1">
            <span class="checkmark"></span>
            Voltou para casa
        </label>

        <label class="checkbox-group">
            <input type="checkbox" name="parcial[<?php echo $aluno['id']; ?>]" value="1">
            <span class="checkmark"></span>
            Parcial
        </label>

    </div>

</div>

<?php } ?>

</div>