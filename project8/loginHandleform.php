<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "project8css.css">
</head>
<body>
    <?php

    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    try {
        $conn = new PDO("mysql:host=localhost;dbname=user","root", "");
        // set the PDO error mode to exception
        echo "Connected successfully"."<br>";
      
        $sql = "SELECT * FROM `user` WHERE `email` LIKE ?";
        $Email = "%$Email%";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $Email);
        $stmt->execute();
        echo "executed successfully" . "<br>";

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $testPassword = $row['password'];
        if(password_verify($Password, $testPassword)){
            echo "Welcome, user" . "<br>";
            session_start();
            $_SESSION['Username'] = $row['user'];
            $_SESSION['Password'] = $_POST['Password'];
            $_SESSION['Email'] = $_POST['Email'];
            echo "<a href = 'profile.php'>Profile</a>";
        }
        else {
            echo "<h1>username or password is incorrect</h1>";
            echo "<a href = 'login.html'>Login</a>";
        }

      
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
      }
      $conn = null;
    ?>
</body>
</html>