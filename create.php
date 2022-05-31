<?php
    require_once 'pdo.php';

    //check sign_in statement
    $isSignIn = $_COOKIE['sign_in'] ?? false;

    //Connect to MySQL
    $pdo = getPDO();

    //Get data
    $statement = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Create Blogs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- Header -->
<body>
<section class="head">
    <a href="index.php">Home Page</a>
    <a href="blog.php">Blog</a>
    <a style="display: <?php echo $isSignIn ? 'none':'inline-block'; ?>" href="create.php">Blog Manager</a>
    <a style="display: <?php echo $isSignIn ? 'none':'inline-block'; ?>" href="sign_in.php">Sign In</a>
    <a style="display: <?php echo $isSignIn ? 'inline-block':'none'; ?>" href="sign_out.php?id=1">Sign Out</a>
</section>
<section style="padding-top: 50px">
    <h1 class="info h1">
        Blog Manager
    </h1>
    <h2 style="padding: 15px">
        1. Edit, Delete posts
    </h2>
    <table style="table-layout:fixed;padding:10pt;color:#fff!important;background-color:#009688!important; width: 100%">
        <thead>
        <tr>
            <th scope="col" style="width: 2.5%">#</th>
            <th scope="col" style="width: 7.5%">Image</th>
            <th scope="col" style="width: 20%">Title</th>
            <th scope="col" style="width: 35%">Body</th>
            <th scope="col" style="width: 5%">Author</th>
            <th scope="col" style="width: 15%">Created At</th>
            <th scope="col" style="width: 15%">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $i => $post) { ?>
            <tr>
                <th scope="row" style="text-align: left"><?php echo $i + 1 ?></th>
                <th scope="row"><img style="width: 100px;height: 100px" src="uploads/".<?php echo $post['file_name'];?>></th>
                <td style="text-align: justify; padding: 10px"><?php echo $post['title'] ?></td>
                <td style="text-align: justify; padding: 10px"><?php echo substr($post['body'],0,strpos($post['body'],'.')+1).'..' ?></td>
                <td style="text-align: center"><?php echo $post['author'] ?></td>
                <td style="text-align: center"><?php echo $post['created_at'] ?></td>
                <td style="text-align: center">
                    <form method="post" action="edit.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $post['created_at'] ?>"/>
                        <input  type="hidden" name="title" value="<?php echo $post['title'] ?>"/>
                        <input  type="hidden" name="body" value="<?php echo $post['body'] ?>"/>
                        <input  type="hidden" name="author" value="<?php echo $post['author'] ?>"/>
                        <button style="width: 50px;height: 30px" type="submit">Edit</button>
                    </form>
                    <form method="post" action="delete.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $post['created_at'] ?>"/>
                        <button style="width: 50px;height: 30px" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <h2 style="padding: 10px">
        2. Add new post
    </h2>
    <form action="add.php" method='post' id="inp" style="padding: 15px" enctype="multipart/form-data">
        <div>
            <table style="width: 100%; table-layout: fixed">
                <thead>
                <td style="width: 10%"></td>
                <td style="width: 90%"></td>
                </thead>
                <tbody>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="" style="width: 90%"></td>
                </tr>
                <tr>
                    <td>Body</td>
                    <td><textarea style="width: 90%;height: 200px" form="inp" name="body"></textarea></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input type="text" name="author" value="" ></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="fileToUpload"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <input type="submit" style="width: 50pt;margin-left: 45%" value="Add">
    </form>
</section>

</body>
</html>