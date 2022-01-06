<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "project4css.css">
    <ul>
        <a href="project4.html">Enter Message</a>
        <a href="messages.php">Message List</a>
    </ul>
</head>
<body>
<?php
    // Store id in var to pass into URL
    $ID = $_GET['ID']
?>

<form action=<?php echo "update.php?ID=$ID" ?> method="POST">
    <input type="hidden" name="id" value="<?php $ID ?>" />
    <input type="text" name="name" placeholder="name">
    <br>
    <textarea name="message" placeholder="message"></textarea>
    <br>
    <input type="submit" value="Update">
</form>
</body>
</html>
