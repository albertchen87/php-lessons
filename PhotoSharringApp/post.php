<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
    <ul>
        <li><a href = "AppHome.php">Home</a></li>
        <li><a href = "logout.php">Logout</a></li>
        <li><a href = "profile.php">Profile</a></li>
        <li><a href = "post.php">post</a></li>
    <ul>
</head>
<body>
<form action="fileUpload.php" method="post" enctype="multipart/form-data">
    <label>Discription</label>
    <br>
    <input type = "textarea" name = "description">
    <br>
    <input type="file" name="uploadedFile" accept = "*image/*">
    <input type="submit">
</form>
</body>
</html>