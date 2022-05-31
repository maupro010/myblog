<?php
require_once 'pdo.php';

//Get data from edit form of edit.php
$id = $_POST['id'] ?? null;
$title = $_POST['title'] ?? null;
$body = $_POST['body'] ?? null;
$author= $_POST['author'] ?? null;


//check data edited
if (!$id or !$title or !$body or !$author) {
    header('Location: create.php');
    exit;
}

//Create pdo
$pdo = getPDO();

//Correct font
$statement = $pdo->prepare('SET CHARACTER SET utf8');
$statement->execute();
$pdo->exec('set names utf8');

//Get data from DB
$statement = $pdo->prepare('SELECT * FROM posts where created_at = :id');
$statement->execute(['id'=>$id]);
$post = $statement->fetch();

//get name of file Image
$file_name = $_FILES['fileToUpload']['name'] ?? null;
//update image on sever
if ($file_name){
    //delete old image from sever
    unlink('./uploads/'.$post->file_name);
    //save new image on sever
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], './uploads/'.$_FILES['fileToUpload']['name']);
} else{
    //if don't upload image, file_name will not change
    $file_name = $post->file_name;
}

//Query update
$statement = $pdo->prepare("UPDATE posts SET title = :title, body = :body, author = :author, file_name = :file_name WHERE created_at = :created_at");
$statement->bindValue(':created_at', $id);
$statement->bindValue(':title', $title);
$statement->bindValue(':body', $body);
$statement->bindValue(':author', $author);
$statement->bindValue(':file_name', $file_name);
$statement->execute();

header('Location: create.php');
