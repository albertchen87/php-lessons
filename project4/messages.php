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

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_NATURAL,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
];


try {
    $conn = new PDO("mysql:host=localhost;dbname=message_board_app","root", "", $options);
    // set the PDO error mode to exception

    $sql = "SELECT * FROM message_board ORDER BY ID";
    $result = $conn->query($sql);

    while (($row = $result->fetch(PDO::FETCH_ASSOC)) !== false) {
        $ID = $row['ID'];
        echo "<div>".$ID."<label>".$row['username'].": \t".$row['message']."</label>"."<a href ='delete.php?ID=$ID'>Delete</a>"."<a href = 'edit.php?ID=$ID'>Edit</a>"."</div>";
    }

  } catch(PDOException $e) {
    echo "<h1>"."Connection failed: ".$e->getMessage()."</h1>"."</div>"."<br>"."<br>";
    
  }
  $conn = null;
  
  ?>
  
</body>
</html>