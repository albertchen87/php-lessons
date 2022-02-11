<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "project7css.css">
    <title>Document</title>
    <?php
    session_start();
    if ($_POST['confirmPassword'] == $_SESSION['Password']) {
        echo 'password correct';
        echo '<meta http-equiv="refresh" content="3; url = change.php" />';
    }
    else {
        echo 'password do not match';
        echo '<meta http-equiv="refresh" content="3; url = confirm.php" />';
    }
    ?>
</head>
<body>
    
</body>
</html>