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
    <!-- form for login information -->
    <form action = "loginHandleform.php" method="post">
        <label>Email</label>
        <input type = "text" name = "Email">
        <br>
        <label>Passsword</label>
        <input type = "password" name = "Password">
        <br>
        <input type = "submit">
    </form>
</body>
</html>