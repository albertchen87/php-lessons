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

// print out who followed you and can delete them
try {
  require('conn.php');
  // set the PDO error mode to exception
  echo "Connected successfully"."<br>";

  $sql = "SELECT * FROM `followers` INNER Join `users` on users.UserID = followers.followerID WHERE followers.followedID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $UserID);
  $stmt->execute();

  while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
    $ID = $row['UserID'];
    $pic = $row['profilePic'];
    echo "<label>".$row['Username']."</label>". '<img style="width: 100px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . "<a href ='followerRemove.php?ID=$ID'>remove</a>" . '<br>' . '<br>' . '<br>';
}

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage() . "<br>";
}
$conn = null;
?>
</body>
</html>