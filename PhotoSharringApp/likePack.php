<!-- submitting likes into database -->
<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
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