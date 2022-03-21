<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require('nav.php');
    $CommentID = $_GET['ID'];
    $PostID = $_SESSION['PostID'];
    echo '<meta http-equiv="refresh" content="0; url = Comment.php?ID=' . $PostID . '">';
    ?>

</head>
<body>
    <?php
    // delete a comment
    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        $sql = "DELETE FROM `comment` WHERE `CommentID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $CommentID);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    ?>

</body>
</html>