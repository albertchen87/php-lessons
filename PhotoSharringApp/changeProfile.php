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
    echo    "<label>Username</label><input type = 'text' value = " . $_SESSION['Username'] . ">" . "<br>";
    echo    "<label>Password</label><input type = 'text' value = " . $_SESSION['Password'] . ">" . "<br>";
    echo    "<label>Birthday</label><input type = 'text' value = " . $_SESSION['birthday'] . ">" . "<br>";
    echo    "<label>Description</label><input type = 'text' value = " . $_SESSION['Description'] . ">" . "<br>";
    ?>
    <label
    <input type="file" name="uploadedFile" accept = "*image/*">

    <form action = "changeProfile.php">
        <input type = "submit" value = "Change Profile">
    </form>

    <br>
    <br>

    <form action = "logout.php">
        <input type = "submit" value = "logout">
    </form>
</body>
</html>