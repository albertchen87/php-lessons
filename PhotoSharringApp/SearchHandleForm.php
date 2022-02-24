<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
    <ul>
        <li><a href = "AppHome.php">Home</a></li>
        <li><a href = "logout.php">Logout</a></li>
        <li><a href = "profile.php">Profile</a></li>
        <li><a href = "post.php">post</a></li>
        <li><a href = "MyPage.php">My Page</a></li>
        <li><a href = "Search.html">Search</a></li>
    <ul>
</head>
<body>
<?php

$Username = $_POST['Username'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
    // set the PDO error mode to exception      
    $sql = "SELECT * FROM `users` WHERE `Username` LIKE ?";
    $Username = "%$Username%";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $Username);
    $stmt->execute();


    while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
        $User = $row['Username'];
        $description = $row['Description'];
        $UserID = $row['UserID'];
        echo "<a href = 'individual.php?ID=$UserID'>" . $UserID . "</a>" . "\t" . "<label>" . $User . "</label>";
        echo '<br>' . '<br>' . '<br>';
    }
  
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
$conn = null;
  
  ?>
</body>
</html>