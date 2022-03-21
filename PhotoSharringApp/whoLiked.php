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

$PostID = $_GET['ID'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
    // set the PDO error mode to exception      
    $sql = "SELECT * FROM `likes` Inner Join `users` on likes.likedUserID = users.UserID WHERE `PostID` = '$PostID' order by `time` DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
        $User = $row['Username'];
        $description = $row['Description'];
        $UserID = $row['UserID'];
        $pic = $row['profilePic'];
        echo "<a href = 'individual.php?ID=$UserID'>" . $UserID . "</a>" . '<img style="width: 50px; height: auto" src="data:image/jpg;base64,' . base64_encode($pic) .' "/>' . "\t" . "<label>" . $User . "</label>";
        echo '<br>' . '<br>' . '<br>';
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
$conn = null;
  
?>
    
</body>
</html>