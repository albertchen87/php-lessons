<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="1; url = index.php">
    <link rel = "stylesheet" href = "css.css">
</head>
<body>
    <?php
    // clear the information of login
    session_start();
    session_destroy();
    echo "you have been logout";
    ?>
    
</body>
</html>