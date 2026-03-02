<?php
require_once "includes/auth.php";
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

<!-- FAIXA SUPERIOR -->
<header class="topbar">
    <div class="top-left">
        <span class="logo">🚌 Transporte Escolar</span>
    </div>
    <div class="top-right">
        Seja bem-vindo, <?php echo $_SESSION['usuario']; ?>
    </div>
</header>

<!-- MENU LATERAL -->
<ul class="menu">

    <li title="menu">
        <a href="#" class="menu-button home">Menu</a>
    </li>

    <li title="Dashboard">
        <a href="#" class="search">Dashboard</a>
    </li>

    <li title="Escolas">
        <a href="#" class="pencil">Escolas</a>
    </li>

    <li title="Crianças">
        <a href="#" class="about">Crianças</a>
    </li>

    <li title="Calendário">
        <a href="#" class="archive">Calendário</a>
    </li>

    <li title="Sair">
        <a href="logout.php" class="contact">Sair</a>
    </li>

</ul>

<ul class="menu-bar">
    <li><a href="#" class="menu-button">Fechar</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Escolas</a></li>
    <li><a href="#">Crianças</a></li>
    <li><a href="#">Calendário</a></li>
</ul>

<!-- CONTEÚDO CENTRAL -->
<div class="container">
    <!-- Por enquanto vazio -->
</div>

</body>
</html>