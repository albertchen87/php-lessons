<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
    <ul>
        <li><a href = "WelcomePage.html">Home</a></li>
        <li><a href = "login.html">login</a></li>
        <li><a href = "signUp.html">Profile</a></li>
    <ul>
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
    if ($conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp", 'root', '')) {
        echo "Connected success<br>";
    } else {
        echo "error connecting";
    };

    $sql = 'SELECT * FROM `users` WHERE `Email` = ?';
    echo $Email . "<br>";    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $Email);
    $stmt->execute();
    echo "executed successfully" . "<br>";

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<h1>Email already used</h1>";
        echo "<a href = 'signUp.html'>Sign Up</a>";
    }   
    else {
        $sql = "INSERT INTO `users`(`Username`, `Password`, `Email`) VALUES ('$Username', '$Password', '$Email')";
        $conn->query($sql);
        echo "Inserted successfully"."<br>";
        echo "<a href = 'login.html'>Login</a>";
    }



} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn = null;
?>
</body>
</html>