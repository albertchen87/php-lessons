<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require('nav.php'); 
    $PostID = $_SESSION['PostID'];
    echo '<meta http-equiv="refresh" content="0; url = Comment.php?ID=' . $PostID . '">';
    ?>
</head>
<body>
<?php    

// prepare the comment
    $UserID = $_SESSION['UserID'];
    $description = addslashes($_POST['description']);
    $image = $_FILES['uploadedFile']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
// upload the comment into the database
try {
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
    // set the PDO error mode to exception      
    $sql = "INSERT INTO `comment` (`UserID`, `PostID`, `description`, `pic`) VALUES ('$UserID', '$PostID', '$description', '$imgContent')";
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