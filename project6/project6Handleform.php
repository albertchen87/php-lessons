<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url = project6.html" />
    <title>Document</title>
    <link rel = "stylesheet" href = "project6css.css">
</head>
<body>
<?php

$name = $_POST['name'];
$data = $_POST['data'];

if ($name == "user") {
    setcookie($name, $data, time() + 3600*7);
}
elseif ($name == "shoppingCartID") {
    setcookie($name, $data, time() + 3600*30);
}
else {
    setcookie($name, $data, time() + 60*15);
}
?>
</body>
</html>

