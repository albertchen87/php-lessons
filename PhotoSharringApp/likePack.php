<!-- submitting likes into database -->
<?php
    try {
        require('conn.php');
        $UserID = $_SESSION['UserID'];
        echo $UserID;
        $sql = "INSERT INTO `likes`(`likedUserID`, `PostID`) VALUES ('$UserID','$PostID')";
        $conn->query($sql);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
?>