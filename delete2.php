<?php

include_once 'conexao.php';

if(isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM funcionarios WHERE id = :id");
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: index2.php');
    exit();
}

?>