<!-- the handel form for unlike button -->
<?php
    try {
        require('conn.php');
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