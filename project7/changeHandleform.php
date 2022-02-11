<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "project7css.css">
    <meta http-equiv="refresh" content="1; url = confirm.php" />
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION['Username'] = $_POST['Username'];
        $_SESSION['Password'] = $_POST['Password'];
    ?>
</body>
</html>