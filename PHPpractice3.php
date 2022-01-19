<?php

$student = ["Steve","Albert","Jim","Sanhorn","Joanna","Daniel","Zoe"];
echo "<ul>Students: ";
foreach($student as $s){
    echo "<li>$s</li>";
}
echo "</ul><br>";
$name = "a string value";
$match= False;
for($i = 0;$i<7;$i++)
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