<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php'); ?>
    <?php 
    $PostID = $_GET['PostID'];
    echo '<meta http-equiv="refresh" content="0; url = liked.php">';
    ?>

</head>
<body>
    <?php require("unlikePack.php"); ?>
</body>
</html>