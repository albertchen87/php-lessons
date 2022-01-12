<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$student = ["Steve", "Albert", "Daniel", "Thomas", "Jim", "Sanhorn"];
$name = "ALbert";
$match = False;
foreach($student as $s){
    echo "<li>$s</li>";
}
for($i = 0;$i<6;$i++)
{
    if(strcasecmp($name, $student[$i]) == 0)
    {
        $match = True;
    }
}
echo "Name: ",$name;
if($match == True)
{
    echo "<p style=\"color:green\">The student '$name' was found!<p><br>";
}
else
{
    echo "<p style=\"color:red\">Could not find student in our list!<p><br>";
}
if(in_array(strtolower($name),array_map('strtolower',$student)))
{
    echo "<p style=\"color:green\">The student '$name' was found!<p><br>";
}
else
{
    echo "<p style=\"color:red\">Could not find student in our list!<p><br>";
}
    ?>
</body>
</html>