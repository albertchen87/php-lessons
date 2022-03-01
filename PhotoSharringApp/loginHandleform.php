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

    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        // set the PDO error mode to exception      
        $sql = 'SELECT * FROM `users` WHERE `Email` = ?'; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $Email);
        $stmt->execute();
        echo "executed successfully" . "<br>";
        session_start();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $testPassword = $row['Password'];
            if(password_verify($Password, $testPassword)){
                echo "Welcome, user" .  "<br>";
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Password'] = $_POST['Password'];
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['UserID'] = $row['UserID'];
                $_SESSION['Description'] = $row['Description'];
                $_SESSION['birthday'] = $row['birthday'];
                $_SESSION['profilePic'] = $row['profilePic'];
                echo "<a href = 'AppHome.php'>Home</a>";
                echo "<a href = 'profile.php'>profile</a>";
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