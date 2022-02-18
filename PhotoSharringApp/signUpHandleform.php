<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url = login.html" />
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
</head>
<body>
<?php

// Get variable
$Username = addslashes($_POST['Username']);
$Email = addslashes($_POST['Email']);
$Password = addslashes($_POST['Password']);
$Password = password_hash($Password, PASSWORD_BCRYPT);

// CONNECT TO DATABASE
try {
    $conn = new PDO("mysql:host=localhost;dbname=photosharigapp", 'root', '');
    echo "Connected successfully<br>";
    $sql = "INSERT INTO `users`(`Name`, `Password`, `Email`) VALUES ('$Username', '$Password', '$Email')";
    $conn->query($sql);
    echo "Inserted successfully"."<br>";

} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn = null;
?>
</body>
</html>