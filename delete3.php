<?php

require_once ('../conexao.php');

if(isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM horarios WHERE id = :id");
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: index3.php');
    exit();
}

?>