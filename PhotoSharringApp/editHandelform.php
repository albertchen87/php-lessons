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
    $CommentID = $_SESSION['CommentID'];
    echo '<meta http-equiv="refresh" content="0; url = Comment.php?ID=' . $PostID . '">';
    ?>
</head>
<body>
    <?php

    $description = addslashes($_POST['description']);
    require('conn.php');
    // check if the picture is updated, if not, use the old picture or else update the picture
    if ($_FILES['pic']['name'] == ""){
        try {
            // set the PDO error mode to exception      
            $sql = "SELECT * FROM `comment` WHERE `CommentID` = '$CommentID'"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();
     
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $imgContent = addslashes($row['pic']);
          
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
    }
    else {
        $image = $_FILES['pic']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
// upload the new comment into the database
    try {
        // set the PDO error mode to exception      
        $sql = "UPDATE `comment` SET `description`='$description', `pic`='$imgContent' WHERE `CommentID` = '$CommentID'";
        $conn->exec($sql);
        echo "executed successfully" . "<br>";
      
    } catch(PDOException $e) {
        echo "Connection failed " . $e->getMessage() . "<br>";
    }
    $conn = null;

    ?>
</body>
</html>