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
        <a href="messages.php">Go to message list</a>
  </ul>
</head>
<body>

  <?php

    $username = $_POST['username'];
    $message  = $_POST['message'];
  
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_CASE => PDO::CASE_NATURAL,
      PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];
  
  
  try {
      $conn = new PDO("mysql:host=localhost;dbname=message_board_app","root", "", $options);
      // set the PDO error mode to exception
      echo "Connected successfully"."<br>";
  
      $sql = "INSERT INTO `message_board`(username, message) VALUES ('$username', '$message')";
      $conn->query($sql);
      echo "Inserted successfully"."<br>";
  
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage() . "<br>";
    }
    $conn = null;
  
    ?>
</body>
</html>
