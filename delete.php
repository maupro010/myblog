<?php
require_once 'pdo.php';
$pdo = getPDO();
//Delete data
$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: create.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM posts WHERE created_at= :created_at');
$statement->bindValue(':created_at', $id);
$statement->execute();

header('Location: create.php');