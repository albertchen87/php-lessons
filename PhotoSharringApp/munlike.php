<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php');
    $PostID = $_GET['ID'];
    echo '<meta http-equiv="refresh" content="0; url = MyPage.php">';
    ?>

</head>
<body>
    <!-- unlike button for mypage -->
    <?php
    require("unlikePack.php");
    ?>
</body>
</html>