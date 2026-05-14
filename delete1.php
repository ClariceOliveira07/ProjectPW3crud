<?php

require_once ('../conexao.php');

if(isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM setores WHERE id = :id");
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: index1.php');
    exit();
}

?>