<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "css.css">
</head>
<body>
<?php    
var_dump($_FILES);

$image = $_FILES['p-image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

?>
</body>
</html>