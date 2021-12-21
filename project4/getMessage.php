<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "project4css.css">
    <ul>
        <a href="project4.html">Enter Message</a>
    </ul>
</head>
<body>
<?php

$message = $_POST['message'];

try {
  $conn = new PDO("mysql:host=localhost;dbname=message_board_app","root", "");
  // set the PDO error mode to exception
  echo "Connected successfully"."<br>";

  $sql = "SELECT * FROM `message_board` WHERE `message` LIKE ?";
  $message = "%$message%";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $message);
  $stmt->execute();
  echo "executed sudcessfully";

  while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
    echo "<div>"."<label>".$row['username'].": \t".$row['message']."</label>"."</div>";
}

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage() . "<br>";
}
$conn = null;
?>

</body>
</html>