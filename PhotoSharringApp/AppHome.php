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
        try {
            require('conn.php');
   
            $UserID = $_SESSION['UserID'];
            
            // join three table for the information needed for a post
            $sql = "SELECT * FROM `posts` INNER Join `followers` on posts.UserID = followers.followedID Inner Join `users` on posts.UserID = users.UserID where followers.followerID = $UserID and followers.followedID = posts.UserID ORDER by `PostID` DESC"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // print all the posts
            while(($rows = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){

                // organize the variables
                $Username = $rows['Username'];
                $pic = $rows['pic'];
                $profilePic = $rows['profilePic'];
                $description = $rows['description'];
                $time = $rows['time'];
                $PostID = $rows['PostID'];

                // show the name, image, description, and time
                echo $Username . '  ';
                echo '<img style="width: 50px; height: auto" src="data:image/jpg;base64,'.base64_encode($profilePic).' "/>' . '<br>'; 
                echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
                echo $description . '<br>';
                echo $time . '  ';

                // print the like or unlike button
                $sql = "SELECT * FROM  `likes` where `likedUserID` = '$UserID' and `PostID` = '$PostID'";
                $state = $conn->prepare($sql);
                $state->execute();
                if (($likes = $state->fetch(PDO::FETCH_ASSOC)) == false) {
                    echo "<a href = 'like.php?ID=" . $PostID . "'>Like</a>" . '<br>';
                }
                else {
                    echo "<a href = 'unlike.php?ID=" . $PostID . "'>unlike</a>" . '<br>';
                }

                // show the comment count and like to show all comment page
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