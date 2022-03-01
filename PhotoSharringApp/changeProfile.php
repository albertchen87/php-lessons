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

    <form action = 'uploadProfileChange.php' method = 'post'>
        <?php    
        echo    "<label>Username</label><input type = 'text' name = 'Username' value = " . $_SESSION['Username'] . ">" . "<br>";
        echo    "<label>Password</label><input type = 'text' name = 'Password' value = " . $_SESSION['Password'] . ">" . "<br>";
        echo    "<label>Birthday</label><input type = 'date' name = 'birthday' value = " . $_SESSION['birthday'] . ">" . "<br>";
        echo    "<label>Description</label><input type = 'text' name = 'Description' value = " . $_SESSION['Description'] . ">" . "<br>";
        echo    "<label>New Profile Picture</label><input type='file' name = 'pic' value = " . $_SESSION['profilePic'] . "accept = '*image/*' >";
        ?>        
        <br>
        <input type = "submit" value = "Change Profile">
    </form>

</body>
</html>