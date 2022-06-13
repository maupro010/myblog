<?php
require_once 'Post.php';
//Delete data
$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: create.php');
    exit;
}

$pdo = new Post();
$pdo->delete($id);

header('Location: create.php');