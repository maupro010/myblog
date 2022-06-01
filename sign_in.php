<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    </style>
</head>
<body>
    <h1 style="text-align: center">
        Đăng nhập
    </h1>
    <form style="text-align: center;" method="post" action="">
        <div>
            <br>
            <br>
            Tài khoản <input type="text" value="" name="account">
            <br>
            <br>
            Mật khẩu <input type="password" value="" name="password">
            <br>
            <br>
            <input type="submit" name="btn" value="Đăng nhập">
        </div>

    </form>
</body>
<?php
require_once 'config/config.php';
    $address = $_GET['address'] ?? 'index.php';
    if (!empty($_POST['btn'])) {
        $a=$_POST['account'] ?? '';
        $b=$_POST['password'] ?? '';
        $account = ADMIN_ACCOUNT;
        $password = ADMIN_PASS;
        if ($a!=$account and $b!=$password) {
            echo 'Sai thông tin đăng nhập!';
        } else {
            setcookie('sign_in',true);
            header("Location: ".$address);
        }
    }
?>
</html>