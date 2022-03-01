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
    <?php
    echo $_SESSION['Username'] . "<br>";
    echo $_SESSION['Password'] . "<br>";
    echo $_SESSION['Email'] . "<br>";
    echo $_SESSION['UserID'] . "<br>";
    echo $_SESSION['Description'] . "<br>";
    echo $_SESSION['birthday'] . "<br>";
    echo $_SESSION['porfilePic'] . "<br>";
    ?>

    <form action = "changeProfile.php">
        <input type = "submit" value = "Change Profile">
    </form>

    <br>
    <br>

    <form action = "logout.php">
        <input type = "submit" value = "logout">
    </form>
</body>
</html>