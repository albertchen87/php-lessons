<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "project7css.css">
</head>
<body>
    <?php
    session_start();
    $_SESSION['Username'] = $_POST['Username'];
    $_SESSION['Password'] = $_POST['Password'];
    $_SESSION['Age'] = $_POST['Age'];
    echo 'success';
    ?>
</body>
</html>