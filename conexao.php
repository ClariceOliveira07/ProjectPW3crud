<?php
$host = getenv('DB_HOST') ?: 'banco'; 
$dbname = getenv('DB_NAME') ?: 'meu_crud_db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: ' ';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

?>