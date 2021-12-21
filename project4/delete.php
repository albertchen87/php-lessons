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
        <a href="messages.php">Message List</a>
    </ul>
</head>
<body>
<?php

$ID = $_GET['ID'];

echo "ID is " . $ID;


// CONNECT TO DATABASE
try {
    $conn = new PDO("mysql:host=localhost;dbname=message_board_app", 'root', '');
    echo "Connected successfully<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$sql = "DELETE FROM message_board WHERE ID=$ID";

if ($conn->exec($sql)) {
    echo "Message was deleted";
} else {
    echo "Error deleting message";
}
?>
</body>
</html>
