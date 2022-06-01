<?php
//Sign_out
$address = $_GET['address'] ?? 'index.php';
setcookie('sign_in',false);
header('Location: '.$address);
