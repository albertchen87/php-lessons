<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require('nav.php'); 
    $PostID = $_GET['ID'];
    $_SESSION['PostID'] = $PostID;
    ?>
    
</head>
<body>

<form action="CommentHandleform.php" method="post" enctype="multipart/form-data">
    <label>Discription</label>
    <br>
    <input type = "textarea" name = "description">
    <br>
    <input type="file" name="uploadedFile" accept = "*image/*">
    <input type="submit">
</form>

    <?php
        try {
            $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
            // set the PDO error mode to exception      
            $UserID = $_SESSION['UserID'];

            $sql = "SELECT * FROM `comment` INNER Join `users` on comment.UserID = users.UserID ORDER by `PostID` DESC"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();
     
            while(($rows = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
                $Username = $rows['Username'];
                $pic = $rows['pic'];
                $description = $rows['description'];
                $time = $rows['time'];
                $CommentID = $rows['CommentID'];
                echo $Username . '<br>';
                echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';
                echo $description . '<br>';
                echo $time . '<br>';
                if ($rows['UserID'] == $UserID) {
                    echo "<a href = 'edit.php?ID=" . $rows['CommentID'] . "'>Edit</a>" . "  " . "<a href = 'delete.php?ID=" . $rows['CommentID'] . "'>Delete</a>" . '<br>' . '<br>' . '<br>';
                }
                else {
                    echo '<br>' . '<br>' . '<br>';
                }
            }
          
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
        $conn = null;
    ?>
</body>
</html>