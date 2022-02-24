<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">

    <ul>
        <li><a href = "AppHome.php">Home</a></li>
        <li><a href = "logout.php">Logout</a></li>
        <li><a href = "profile.php">Profile</a></li>
        <li><a href = "post.php">post</a></li>
        <li><a href = "MyPage.php">My Page</a></li>
        <li><a href = "Search.html">Search</a></li>
    <ul>
</head>
<body>
<?php    
    session_start();

    $UserID = $_SESSION['UserID'];
    $description = addslashes($_POST['description']);


    $image = $_FILES['uploadedFile']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

try {
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
    // set the PDO error mode to exception      
    $sql = "INSERT INTO `Posts` (`UserID`, `pic`, `description`)
                    VALUES ('$UserID', '$imgContent', '$description')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "executed successfully" . "<br>";
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
  }
  $conn = null;
?>
</body>
</html>