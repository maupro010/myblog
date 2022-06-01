<?php
require_once 'pdo.php';

//get values
$title = $_POST['title'] ?? null;
$body = $_POST['body'] ?? null;
$author = $_POST['author'] ?? null;
$file_name = $_FILES['fileToUpload']['name'] ?? null;

//check values
if (!$title or !$body or !$author or !$file_name) {
    header('Location: create.php');
    exit;
}

//move file
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], './uploads/'.$_FILES['fileToUpload']['name']);

$pdo = new Post();
$pdo->create($title, $body, $author, $file_name);

header('Location: create.php');