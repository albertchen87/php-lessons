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
    $fUserID = $_GET['ID'];
    echo '<meta http-equiv="refresh" content="0; url = individual.php?ID=' . $fUserID . '">';
    ?>

</head>
<body>
    <?php
    require("likePack.php");
    ?>

</body>
</html>