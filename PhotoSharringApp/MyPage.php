<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php'); ?>
</head>
<body>
<?php
    $UserID = $_SESSION['UserID'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        // set the PDO error mode to exception      
        $sql = 'SELECT * FROM `posts` WHERE `UserID` = ?'; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $UserID);
        $stmt->execute();
 
        while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
            $pic = $row['pic'];
            $description = $row['description'];
            $time = $row['time'];
            $PostID = $row['PostID'];
            echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
            echo $description . '<br>';
            echo $time . '  ';
            
            $sql = "SELECT * FROM  `likes` where `likedUserID` = '$UserID' and `PostID` = '$PostID'";
            $state = $conn->prepare($sql);
            $state->execute();
            if (($likes = $state->fetch(PDO::FETCH_ASSOC)) == false) {
                echo "<a href = 'mlike.php?ID=" . $PostID . "'>Like</a>" . "<a href = 'whoLiked.php?ID=" . $PostID . "'>Who Liked</a>" . '<br>';
            }
            else {
                echo "<a href = 'munlike.php?ID=" . $PostID . "'>unlike</a>" . "<a href = 'whoLiked.php?ID=" . $PostID . "'>Who Liked</a>" . '<br>';
            }

            $sql = "SELECT Count(CommentID) FROM  `comment` where `PostID` = $PostID";
            $state = $conn->prepare($sql);
            $state->execute();
            $num = $state->fetch();
            echo "<br><a href = 'Comment.php?ID=" . $PostID . "'>#" . $num[0] . " Comment</a>" . '<br>' . '<br>' . '<br>';
        }
      
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }
    $conn = null;
?>
</body>
</html>