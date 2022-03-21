<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php'); ?>
    <?php 
    $fUserID = $_GET['ID'];
    echo '<meta http-equiv="refresh" content="1; url = Mfollowers.php">';
    ?>

</head>
<body>
    <?php
    // remove people who followed you
    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        $UserID = $_SESSION['UserID'];
        $fUserID = $_GET['ID'];
        $sql = "DELETE FROM `followers` WHERE `followerID` = ? and `followedID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $fUserID);
        $stmt->bindParam(2, $UserID);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    ?>

</body>
</html>