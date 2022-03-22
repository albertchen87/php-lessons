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

// Get variable
$Username = addslashes($_POST['Username']);
$Email = addslashes($_POST['Email']);
$Password = addslashes($_POST['Password']);
$Password = password_hash($Password, PASSWORD_BCRYPT);

// CONNECT TO DATABASE
// create a account and upload it to database
try {
    if (require('conn.php')) {
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