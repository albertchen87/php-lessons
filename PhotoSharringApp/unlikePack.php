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