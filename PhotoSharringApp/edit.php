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
    $CommentID = $_GET['ID'];
    $_SESSION['CommentID'] = $CommentID;
    ?>
</head>
<body>

<?php
// get the information of the original comment
try {
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
    // set the PDO error mode to exception      
    $UserID = $_SESSION['UserID'];

    $sql = "SELECT * FROM `comment` INNER Join `users` on comment.UserID = users.UserID where `CommentID` = $CommentID"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if(($rows = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
        $Username = $rows['Username'];
        $pic = $rows['pic'];
        $description = $rows['description'];
        $time = $rows['time'];
        $CommentID = $rows['CommentID'];
    }
  
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
$conn = null;
?>
<!-- form for user to update their comment -->
<form action="editHandelform.php" method="post" enctype="multipart/form-data">
    <?php
    echo '<label>Discription</label><br><input type = "textarea" name = "description" value = "' . $description . '"><br>';
    echo '<input type="file" name="pic" accept = "*image/*">';
    echo '<input type="submit">'
    ?>
</form>

</body>
</html>