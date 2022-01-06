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

// Get variable
$id = $_GET['ID'];
$name = addslashes($_POST['name']);
$message = addslashes($_POST['message']);

// CONNECT TO DATABASE
try {
    $conn = new PDO("mysql:host=localhost;dbname=message_board_app", 'root', '');
    echo "Connected successfully<br>";
    $sql = "UPDATE message_board SET username = ? , message = ? WHERE ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $message);
    $stmt->bindParam(3, $id);
    $stmt->execute();
    echo "Updated successfully<br>";

} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn = null;
?>

</body>
</html>
