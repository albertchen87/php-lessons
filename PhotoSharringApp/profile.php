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
    echo $_SESSION['Username'] . "<br>";
    echo $_SESSION['Password'] . "<br>";
    echo $_SESSION['Email'] . "<br>";
    echo $_SESSION['UserID'] . "<br>";
    echo $_SESSION['Description'] . "<br>";
    echo $_SESSION['birthday'] . "<br>";
    $UserID = $_SESSION['UserID'];
        try {
            $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp","root", "");
            // set the PDO error mode to exception      
            $sql = 'SELECT * FROM `users` WHERE `UserID` = ?'; 
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $UserID);
            $stmt->execute();
     
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $pic = $row['profilePic'];
            echo '<img style="width: 500px; height: auto" src="data:image/jpg;base64,'.base64_encode($pic).' "/>' . '<br>';

          
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
        $conn = null;
    ?>

    <form action = "changeProfile.php">
        <input type = "submit" value = "Change Profile">
    </form>

    <a href = 'Mfollowers.php'>Manage followers</a>
    <a href = 'Mfollowed.php'>Manage followed</a>
    <a href = 'liked.php'>liked</a>


    <br>
    <br>

</body>
</html>