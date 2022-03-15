<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php'); ?>
    <?php 
    $PostID = $_GET['ID'];
    echo '<meta http-equiv="refresh" content="0; url = AppHome.php">';
    ?>

</head>
<body>
    <?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        $UserID = $_SESSION['UserID'];
        $sql = "DELETE FROM `likes` WHERE `likedUserID` = ? and `PostID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $UserID);
        $stmt->bindParam(2, $PostID);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    ?>

</body>
</html>