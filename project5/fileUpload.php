<?php
var_dump($_FILES);
//echo $_FILES['uploadedFile']['name'];
$destinationFolder = "./images/";
$filePath = $destinationFolder . $_FILES['uploadedFile']['name'];
move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $filePath)
?>