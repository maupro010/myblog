<?php
require_once 'controller/Post.php';

//check sign_in statement
$isSignIn = $_COOKIE['sign_in'] ?? false;

//get id
$id = $_GET['id'] ?? null;

//Creat PDO
$pdo = new Post();
$post = $pdo->findOne($id);
$array = explode('<br>',$post->body);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- header -->
<section class="head">
    <a href="index.php">Home Page</a>
    <a href="blog.php">Blog</a>
    <a style="display: <?php echo $isSignIn ? 'inline-block':'none'; ?>" href="create.php">Blog Manager</a>
    <a style="display: <?php echo $isSignIn ? 'none':'inline-block' ?>" href="sign_in.php?address=blog.php">Sign In</a>
    <a style="display: <?php echo $isSignIn ? 'inline-block':'none' ?>" href="sign_out.php?address=blog.php">Sign Out</a>
</section>
<!-- Show full content of blog -->
<section class="blog-show">
    <div class="row">
        <!-- left image bar -->
        <div class="col">
            <img src="images/bo-suu-tap-hinh-nen-1.jpg">
            <img src="images/bo-suu-tap-hinh-nen-2.jpg">
            <img src="images/bo-suu-tap-hinh-nen-3.jpg">
            <img src="images/bo-suu-tap-hinh-nen-4.jpg">
        </div>
        <!-- Main content -->
        <div class="col">
            <!-- title -->
            <h2 class="info h2"><?php echo $post->title; ?></h2>
            <!-- 1/2 paragraph -->
            <?php foreach (array_slice($array,0,count($array)/2) as $line){ ?>
                <p style="text-align: justify; text-indent: 30px; padding: 10px"><?php echo $line; ?></p>
            <?php
            }
            ?>
            <!-- Image -->
            <img style="width: 50%;text-align: center" src="uploads/<?php echo $post->file_name; ?>">
            <!-- 1/2 paragraph -->
            <?php foreach (array_slice($array,count($array)/2,count($array)/2) as $line){ ?>
                <p style="text-align: justify; text-indent: 30px; padding: 20px"><?php echo $line; ?></p>
                <?php } ?>
            <!-- Date time, author -->
            <p style="text-align: right;padding-right: 20px"><em><?php echo $post->created_at; ?> - Author <?php echo $post->author; ?></em></p>
        </div>
        <!-- right image bar -->
        <div class="col">
            <img src="images/bo-suu-tap-hinh-nen-5.jpg">
            <img src="images/bo-suu-tap-hinh-nen-6.jpg">
            <img src="images/bo-suu-tap-hinh-nen-7.jpg">
            <img src="images/bo-suu-tap-hinh-nen-8.jpg">
        </div>
    </div>
</section>
</body>
</html>
