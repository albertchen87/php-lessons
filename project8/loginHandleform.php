<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        $stmt->bindParam(1, $email);
        $stmt->execute();
        echo "executed sudcessfully";
      
        if(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            $hashedPassword = password_hash($Password, PASSWORD_BCRYPT);
            $varifyPassword = $row['password'];
            if(password_verify($loginPass, $hashedPass)){
                echo "Welcome, user";
            }
            else {
                echo "<h1>Email or password invalid</h1>";
                echo "<a href = 'login.html'>Login</a>";
            }
        }
        else {
            echo "<h1>Email or password invalid</h1>";
            echo "<a href = 'login.html'>Login</a>";
        }
      
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
      }
      $conn = null;
    ?>
</body>
</html>