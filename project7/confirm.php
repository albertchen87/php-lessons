<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "project7css.css">
    <title>Document</title>
</head>
<body>
    <?php session_start(); ?>
    <form action = "confirmHandleform.php" method = "post">
        <label>Username</label>
        <?php echo "<input type = 'text' name = 'Username' value = " . $_SESSION['Username'] . ">" ?>
        <br>
        <label>Password</label>
        <input type = "password" name = 'confirmPassword'>
        <br>
        <input type = "submit">
    </form>
</body>
</html>