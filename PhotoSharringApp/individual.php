<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('nav.php'); ?>
    <ul>
</head>
<body>
    <?php
        $UserID = $_GET['ID'];
        try {
            $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
            // set the PDO error mode to exception      
            // show the information of a person searched
            $sql = 'SELECT * FROM `users` WHERE `UserID` = ?'; 
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $UserID);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $row['Username'] . "<br>";
            echo $row['Email'] . "<br>";
            echo $row['UserID'] . "<br>";
            echo $row['Description'] . "<br>";
            $pic = $row['profilePic'];
            echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
            if ($UserID != $_SESSION['UserID']) {
                $sql = 'SELECT * FROM  `followers` where `followerID` = ? and `followedID` = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $_SESSION['UserID']);
                $stmt->bindParam(2, $UserID);
                $stmt->execute();
                if (($row = $stmt->fetch(PDO::FETCH_ASSOC)) == false) {
                    echo "<a href = 'follow.php?ID=$UserID'>follow</a><br><br><br><br><br>";
                }
                else {
                    echo "<a href = 'unfollow.php?ID=$UserID'>unfollow</a><br><br><br><br><br>";
                }
            }

            

            // get all the post of that person
            $sql = 'SELECT * FROM `posts` WHERE `UserID` = ?'; 
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $UserID);
            $stmt->execute();
     
            // print all the post the person have
            while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
                $pic = $row['pic'];
                $description = $row['description'];
                $time = $row['time'];
                $PostID = $row['PostID'];                
                echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
                echo $description . '<br>';
                echo $time . '  ';

                $User = $_SESSION['UserID'];

                // show like or unlike button
                $sql = "SELECT * FROM  `likes` where `likedUserID` = '$User' and `PostID` = '$PostID'";
                $state = $conn->prepare($sql);
                $state->execute();
                if (($likes = $state->fetch(PDO::FETCH_ASSOC)) == false) {
                    echo "<a href = 'ilike.php?ID=" . $UserID . "&PostID=" . $PostID . "'>Like</a>" . '<br>' . '<br>' . '<br>';;
                }
                else {
                    echo "<a href = 'iunlike.php?ID=" . $UserID . "&PostID=" . $PostID . "'>unlike</a>" . '<br>' . '<br>' . '<br>';;
                }
            }
          
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
        $conn = null;
    ?>
</body>
</html>