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