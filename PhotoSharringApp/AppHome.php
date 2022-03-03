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
            $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
            // set the PDO error mode to exception      
            $UserID = $_SESSION['UserID'];

            $sql = "SELECT * FROM `posts` INNER Join `followers` on posts.UserID = followers.followedID Inner Join `users` on posts.UserID = users.UserID where followers.followerID = $UserID and followers.followedID = posts.UserID ORDER by `PostID` DESC"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();
     
            while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
                $Username = $row['Username'];
                $pic = $row['pic'];
                $description = $row['description'];
                $time = $row['time'];
                echo $Username . '<br>';
                echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
                echo $description . '<br>';
                echo $time . '<br>' . '<br>' . '<br>';
            }
          
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
        $conn = null;
    ?>
</body>
</html>