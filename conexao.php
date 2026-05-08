<?php
$host = 'localhost';
$db = 'project_pw3crud';
$user = 'root';
$pass = ''; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

?>