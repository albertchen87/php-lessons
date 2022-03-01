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

    var_dump($_POST);
    $Username = addslashes($_POST['Username']);
    $Password = addslashes($_POST['Password']);
    $Password = password_hash($Password, PASSWORD_BCRYPT);
    $birthday = $_POST['birthday'];
    $Description = addslashes($_POST['Description']);
    $image = $_FILES['pic']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $_SESSION['Username'] = $Username;
    $_SESSION['Password'] = $_POST['Password'];
    $_SESSION['birthday'] = $birthday;
    $_SESSION['Description'] = $Description;
    $_SESSION['profilePic'] = $imgContent;

    try {
        $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
        // set the PDO error mode to exception      
        $sql = "UPDATE `users` SET `Username`='$Username',`Password`='$Password',
        `Description`='$Description',`birthday`='$birthday',`profilePic`='$imgContent' WHERE `UserID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_SESSION['UserID']);
        $stmt->execute();
        echo "executed successfully" . "<br>";
      
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
      }
      $conn = null;

    ?>
    
</body>
</html>