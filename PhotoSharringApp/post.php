<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php'); ?>
</head>
<body>
    <!-- form for user to input information for the post -->
<form action="picUpload.php" method="post" enctype="multipart/form-data">
    <label>Discription</label>
    <br>
    <input type = "textarea" name = "description">
    <br>
    <input type="file" name="uploadedFile" accept = "*image/*">
    <input type="submit">
</form>
</body>
</html>