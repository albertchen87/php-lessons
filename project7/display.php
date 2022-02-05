<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "project7css.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    echo $_SESSION['Username'] . "<br>";
    echo $_SESSION['Password'] . "<br>";
    echo $_SESSION['Age'] . "<br>";
    ?>
</body>
</html>