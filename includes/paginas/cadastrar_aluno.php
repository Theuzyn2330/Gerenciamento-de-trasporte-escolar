<?php
require_once "includes/conexao.php";

$escolas = $pdo->query("SELECT * FROM escolas");

if(isset($_POST['salvar'])){

$nome = $_POST['nome'];
$escola_id = $_POST['escola_id'];
$turno = $_POST['turno'];
$telefone = $_POST['telefone'];

$stmt = $pdo->prepare("
INSERT INTO alunos
(nome, escola_id, turno, telefone_responsavel)
VALUES (?, ?, ?, ?)
");

$stmt->execute([$nome, $escola_id, $turno, $telefone]);

header("Location: dashboard.php?pagina=alunos");
exit();

}
?>

<h2>Novo Aluno</h2>

<form method="POST">

<input type="text" name="nome" placeholder="Nome do aluno" required>

<select name="escola_id">

<?php while($e = $escolas->fetch(PDO::FETCH_ASSOC)) { ?>

<option value="<?php echo $e['id']; ?>">
<?php echo $e['nome']; ?>
</option>

<?php } ?>

</select>

<select name="turno">

<option value="manha">Manhã</option>
<option value="tarde">Tarde</option>

</select>

<input type="text" name="telefone" placeholder="Telefone responsável">

<button name="salvar">Salvar</button>

</form>