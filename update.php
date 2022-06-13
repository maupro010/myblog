<?php
require_once 'Post.php';

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

//find post
$pdo = new Post();
$post = $pdo->findOne($id);

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

//update
$pdo->update($id, $title, $body, $author, $file_name);

header('Location: create.php');
