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
<<<<<<< Updated upstream
        <li><a href = "login.html">login</a></li>
        <li><a href = "signUp.html">Profile</a></li>
    <ul>
=======
        <li><a href = "logIn.html">login</a></li>
        <li><a href = "signUp.html">Sign Up</a></li>
    </ul>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    if ($conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp", 'root', '')) {
        echo "Connected success<br>";
    } else {
        echo "error connecting";
    };

    $sql = 'SELECT * FROM `users` WHERE `Email` = ?';
    echo $Email . "<br>";    
=======
    $conn = new PDO("mysql:host=localhost;dbname=photosharigapp", 'root', '');
    echo "Connected successfully<br>";

    $sql = 'SELECT * FROM `users` WHERE `Email` = ?';
    echo $Email;    
>>>>>>> Stashed changes
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $Email);
    $stmt->execute();
    echo "executed successfully" . "<br>";

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<h1>Email already used</h1>";
        echo "<a href = 'signUp.html'>Sign Up</a>";
<<<<<<< Updated upstream
    }   
    else {
        $sql = "INSERT INTO `users`(`Username`, `Password`, `Email`) VALUES ('$Username', '$Password', '$Email')";
=======
    }
    else {
        $sql = "INSERT INTO `users`(`Name`, `Password`, `Email`) VALUES ('$Username', '$Password', '$Email')";
>>>>>>> Stashed changes
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