<?php
$host = "localhost";
$db = "transporte_escolar";
$user = "root";
$pass = "";
$chaeset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$chaeset";


$opitions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Habilita o modo de erro para exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // Define o modo de busca padrão para associativo
    PDO::ATTR_EMULATE_PREPARES => false,                // Desativa a emulação de prepared statements para usar os nativos do MySQL     
];



try {
    $pdo = new PDO($dsn, $user, $pass, $opitions);
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    die("Erro de conexão: " . $e->getMessage());

}

?>