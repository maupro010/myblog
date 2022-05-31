<?php
require_once 'pdo.php';

//check sign_in statement
$isSignIn = $_COOKIE['sign_in'] ?? false;

//Creat PDO
$pdo = getPDO();

//Get all data from database to display
$statement = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
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
<section class="head">
    <a href="index.php">Home Page</a>
    <a style="display: <?php echo $isSignIn ? 'inline-block':'none'; ?>" href="create.php">Blog Manager</a>
    <a style="display: <?php echo $isSignIn ? 'none':'inline-block' ?>" href="sign_in.php?address=blog.php">Sign In</a>
    <a style="display: <?php echo $isSignIn ? 'inline-block':'none' ?>" href="sign_out.php?id=1&address=blog.php">Sign Out</a>
</section>
<!-- Show lists of blog -->
<section class="blog-show">
    <div class="row">
        <!-- left image bar -->
        <div class="col">
            <img src="images/bo-suu-tap-hinh-nen-1.jpg">
            <img src="images/bo-suu-tap-hinh-nen-2.jpg">
            <img src="images/bo-suu-tap-hinh-nen-3.jpg">
            <img src="images/bo-suu-tap-hinh-nen-4.jpg">
        </div>
        <!-- Lists blog -->
        <div class="col">
                <?php
                foreach ($posts as $post) { ?>
                    <div class="blog-card">
                        <div class="col">
                            <a href="show_blog.php?id=<?php echo $post['created_at']; ?>"><img style="width: 150px;height: 150px" src="uploads/<?php echo $post['file_name']; ?>"></a>
                        </div>
                        <div class="col">
                            <h1>
                                <?php echo $post['title']; ?>
                            </h1>
                            <h3>
                                <?php echo substr($post['body'],0,strpos($post['body'],'<br>')-2).'..'; ?>
                            </h3>
                        </div>
                    </div>
                <?php } ?>
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