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
    $_SESSION['Username'] = $_POST['Username'];
    if ($_POST['Password'] == $_POST['confirmPassword']) {
        $_SESSION['Password'] = $_POST['Password'];
        echo 'update successfully';
    }
    else {
        echo 'password do not match';
    }
    ?>
</body>
</html>