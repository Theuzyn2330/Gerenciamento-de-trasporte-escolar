<?php

require_once "../conexao.php";

$data = $_POST['data'];

$foi_escola = $_POST['foi_escola'] ?? [];
$voltou_casa = $_POST['voltou_casa'] ?? [];
$parcial = $_POST['parcial'] ?? [];

$alunos = $conn->query("SELECT id FROM alunos WHERE ativo = 1");

while($a = $alunos->fetch_assoc()){

$id = $a['id'];

$foi = isset($foi_escola[$id]) ? 1 : 0;
$voltou = isset($voltou_casa[$id]) ? 1 : 0;
$parc = isset($parcial[$id]) ? 1 : 0;

$stmt = $conn->prepare("
INSERT INTO registros_diarios
(aluno_id,data,foi_escola,voltou_casa,parcial)
VALUES (?,?,?,?,?)
ON DUPLICATE KEY UPDATE
foi_escola=?, voltou_casa=?, parcial=?
");

$stmt->bind_param(
"isiiiiii",
$id,$data,$foi,$voltou,$parc,
$foi,$voltou,$parc
);

$stmt->execute();

}

header("Location: ../../dashboard.php?pagina=calendario&data=".$data);
exit();