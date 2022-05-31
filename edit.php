<?php
//get data from last page
$id = $_POST['id'] ?? null;
$title = $_POST['title'] ?? null;
$body = $_POST['body'] ?? null;
$author= $_POST['author'] ?? null;

//check data
if (!$id or !$title or !$body) {
    header('Location: create.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Create Blogs</title>
</head>

<body style="font-size: 14pt">

<!-- Form Edit content -->
<form method='post' id="inp" action="update.php" enctype="multipart/form-data">
    <div>
        <table style="width: 100%; table-layout: fixed">
            <thead>
            <td style="width: 5%"></td>
            <td style="width: 90%"></td>
            </thead>
            <tbody>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo $title ?>" style="width: 90%"></td>
            </tr>
            <tr>
                <td>Body</td>
                <td><textarea style="width: 90%;height: 200px" form="inp" name="body"><?php echo $body ?></textarea></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author" value="<?php echo $author ?>" ></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="fileToUpload"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- send hidden value to update.php -->
    <input  type="hidden" name="id" value="<?php echo $id ?>"/>
    <input type="submit" style="width: 50pt" value="Edit">
</form>
</body>
