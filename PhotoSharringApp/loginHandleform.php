<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
</head>
<body>
    <?php

    $Email = addslashes($_POST['Email']);
    $Password = addslashes($_POST['Password']);
    echo $Email . '<br>';
    try {
        $conn = new PDO("mysql:host=localhost;dbname=photosharigapp","root", "");
        // set the PDO error mode to exception      
        $sql = 'SELECT * FROM `users` WHERE `Email` = ?';
        echo $Email;    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $Email);
        $stmt->execute();
        echo "executed successfully" . "<br>";
 
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $testPassword = $row['Password'];
            if(password_verify($Password, $testPassword)){
                echo "Welcome, user" .  "<br>";
                session_start();
                $_SESSION['Username'] = $row['Name'];
                $_SESSION['Password'] = $_POST['Password'];
                $_SESSION['Email'] = $row['Email'];
                echo "<a href = 'profile.php'>Profile</a>";
            }
            else {
                echo "<h1>Email or password is incorrect2</h1>";
                echo "<a href = 'login.html'>Login</a>";
            }
        }
        else {
            echo "<h1>Email or password is incorrect1 could not find email</h1>";
            echo "<a href = 'login.html'>Login</a>";
        }
      
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
      }
      $conn = null;
    ?>
</body>
</html>