<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "project6css.css">
</head>
<body>
    <h1>Store</h1>
    <?php
    if (isset($_COOKIE["shoppingCartID"])) {
        echo "<h1>" . $_COOKIE["user"] . "</h1>";
        echo "<h1>" . $_COOKIE["shoppingCartID"] . "</h1>";
    }
    else {
        echo "<h1>" . $_COOKIE["user"] . "</h1>";
        echo "<h1>your cart is empty</h1>";
    }
    ?>
    <form action="clearCookies.php" method="post">
        <h1>clear cookies</h1>
        <input type = "submit" name = "submit" value = "clear">
    </form>
</body>
</html>