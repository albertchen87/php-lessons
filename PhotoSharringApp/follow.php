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
    echo '<meta http-equiv="refresh" content="1; url = individual.php?ID=' . $fUserID . '">';
    ?>

</head>
<body>
    <?php
    // let people can follow each other
    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        $UserID = $_SESSION['UserID'];
        $sql = "INSERT INTO `followers`(`followerID`, `followedID`) VALUES ('$UserID','$fUserID')";
        $conn->query($sql);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    ?>

</body>
</html>