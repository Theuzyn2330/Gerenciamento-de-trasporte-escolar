<?php
require_once "includes/auth.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?> 👋</h2>

<a href="logout.php">Sair</a>

</body>
</html>