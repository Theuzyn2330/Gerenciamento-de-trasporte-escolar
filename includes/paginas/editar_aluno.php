<?php
require_once "includes/conexao.php";

$id = $_GET['id'];

$busca = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
$busca->execute([$id]);
$aluno = $busca->fetch(PDO::FETCH_ASSOC);

$escolas = $pdo->query("SELECT * FROM escolas");

if(isset($_POST['atualizar'])){

$nome = $_POST['nome'];
$escola_id = $_POST['escola_id'];
$turno = $_POST['turno'];
$telefone = $_POST['telefone'];

$stmt = $pdo->prepare("
UPDATE alunos 
SET nome=?, escola_id=?, turno=?, telefone_responsavel=? 
WHERE id=?
");

$stmt->execute([$nome, $escola_id, $turno, $telefone, $id]);

header("Location: dashboard.php?pagina=alunos");
exit();

}
?>

<h2>Editar Aluno</h2>

<form method="POST">

<input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required>

<select name="escola_id">

<?php while($e = $escolas->fetch(PDO::FETCH_ASSOC)) { ?>

<option value="<?php echo $e['id']; ?>"
<?php if($aluno['escola_id'] == $e['id']) echo "selected"; ?>>

<?php echo $e['nome']; ?>

</option>

<?php } ?>

</select>

<select name="turno">

<option value="manha" <?php if($aluno['turno']=="manha") echo "selected"; ?>>
Manhã
</option>

<option value="tarde" <?php if($aluno['turno']=="tarde") echo "selected"; ?>>
Tarde
</option>

</select>

<input type="text" name="telefone"
value="<?php echo $aluno['telefone_responsavel']; ?>">

<button name="atualizar">Atualizar</button>

</form>

<a href="dashboard.php?pagina=alunos">Cancelar</a>