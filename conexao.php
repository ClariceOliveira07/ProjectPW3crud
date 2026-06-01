<?php
$host = getenv('DB_HOST') ?: '127.0.0.1'; 
$dbname = getenv('DB_NAME') ?: 'project_pw3crud';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

?>