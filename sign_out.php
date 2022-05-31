<?php
//Sign_out
$id = $_GET['id'] ?? null;
$address = $_GET['address'] ?? 'index.php';

if (!$id) {
    header('Location: index.php');
    exit;
} elseif ($id == 1){
    //when click sign_out button, global variable sign_in=false
    setcookie('sign_in',false);
    header('Location: '.$address);
}