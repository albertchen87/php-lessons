<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$Username = $_POST['Username'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
    // set the PDO error mode to exception      
    $sql = "SELECT * FROM `Posts` WHERE `users` LIKE ?";
    $Username = "%$Username%";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $Username);
    $stmt->execute();
    echo "executed sudcessfully";

    while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
        $pic = $row['pic'];
        $description = $row['description'];
        $time = $row['time'];
        echo '<img src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
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