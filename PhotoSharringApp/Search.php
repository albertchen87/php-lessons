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
    <!-- input the information for searching a user -->
    <form action = "SearchHandleForm.php" method = "post">
        <label>Username</label>
        <input type = "text" name = "Username">
        <input type = "submit">
    </form>
</body>
</html>