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
            // set the PDO error mode to exception      
            $UserID = $_SESSION['UserID'];

            // get all the post you liked
            $sql = "SELECT * FROM `posts` Inner Join `users` on posts.UserID = users.UserID ORDER by `PostID` DESC"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();
     
            // print all the liked
            while(($rows = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
                $PostID = $rows['PostID'];
                $sql = "SELECT * FROM  `likes` where `likedUserID` = '$UserID' and `PostID` = '$PostID'";
                $state = $conn->prepare($sql);
                $state->execute();
                if (($likes = $state->fetch(PDO::FETCH_ASSOC)) == false) {
                }
                else {
                    $Username = $rows['Username'];
                    $pic = $rows['pic'];
                    $description = $rows['description'];
                    $time = $rows['time'];
                    echo $Username . '<br>';
                    echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
                    echo $description . '<br>';
                    echo $time . '  ';
                    echo "<a href = 'removelike.php?PostID=" . $PostID . "'>unlike</a>" . '<br>' . '<br>' . '<br>';;
                }
            }
          
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
        $conn = null;
    ?>
</body>
</html>