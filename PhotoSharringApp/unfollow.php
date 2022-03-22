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
    // unfollow function for individual page
    try {
        require('conn.php');
        $UserID = $_SESSION['UserID'];
        $sql = "DELETE FROM `followers` WHERE `followerID` = ? and `followedID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $UserID);
        $stmt->bindParam(2, $fUserID);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    ?>

</body>
</html>