<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
    <ul>
        <li><a href = "WelcomePage.html">Home</a></li>
        <li><a href = "logIn.html">login</a></li>
        <li><a href = "signUp.html">Sign Up</a></li>
    </ul>
</head>
<body>
    <form action = signUpHandleform.php method = "post">
        <label>Username</label>
        <input type = "text" name = "Username">
        <br>
        <label>Email</label>
        <input type = "text" name = "Email">
        <br>
        <label>Password</label>
        <input type = "password" name = "Password">
        <br>
        <input type = "submit">
    </form>
</body>
</html>