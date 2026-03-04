<?php
require_once "includes/auth.php";
require_once "includes/conexao.php";

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerenciamento de Transporte Escolar</title>

<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>

</head>
<body>

<header class="topbar">
    <div class="top-left">
        <span class="logo">🚌 Transporte Escolar</span>
    </div>
    <div class="top-right">
        Seja bem-vindo, <?php echo $_SESSION['usuario']; ?>
    </div>
</header>

<ul class="menu">

    <li title="menu">
        <a href="#" class="menu-button home">Menu</a>
    </li>

    <li title="Dashboard">
        <a href="dashboard.php" class="search">Dashboard</a>
    </li>

    <li title="Escolas">
        <a href="dashboard.php?pagina=escolas" class="pencil">Escolas</a>
    </li>

    <li title="Alunos">
        <a href="dashboard.php?pagina=alunos" class="about">Alunos</a>
    </li>

    <li title="Calendário">
        <a href="dashboard.php?pagina=calendario" class="archive">Calendário</a>
    </li>

    <li title="Sair">
        <a href="logout.php" class="contact">Sair</a>
    </li>

</ul>

<ul class="menu-bar">
    <li><a href="#" class="menu-button">Fechar</a></li>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="dashboard.php?pagina=escolas">Escolas</a></li>
    <li><a href="dashboard.php?pagina=alunos">Alunos</a></li>
    <li><a href="dashboard.php?pagina=calendario">Calendário</a></li>
</ul>

<div class="container">

<?php

if ($pagina == 'escolas') {
    include "includes/paginas/escolas.php";

} elseif ($pagina == 'alunos') {
    echo "<h2>Área de Alunos (em construção)</h2>";

} elseif ($pagina == 'calendario') {
    echo "<h2>Calendário (em construção)</h2>";

} else {
    echo "<h2>Painel Principal</h2>";
    echo "<p>Selecione uma opção no menu lateral.</p>";
}

?>

</div>

</body>
</html>