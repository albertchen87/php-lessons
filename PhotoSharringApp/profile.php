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
    var_dump($_SESSION);
    echo $_SESSION['Username'] . "<br>";
    echo $_SESSION['Password'] . "<br>";
    echo $_SESSION['Email'] . "<br>";
    ?>
    <form action = "logout.php">
        <input type = "submit" value = "logout">
    </form>
</body>
</html>