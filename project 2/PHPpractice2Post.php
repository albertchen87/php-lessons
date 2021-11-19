<?php

echo "Username: ",$_POST['username'],"<br>";
echo "Password: ",$_POST['password'],"<br>";
echo "Email: ",$_POST['email'],"<br>";
echo "Job: ",$_POST['job'],"<br>";
echo "Gender: ",$_POST['gender'],"<br>";
echo "Operating System Familiarity: ";
foreach ($_POST['system'] as $sys) {
    echo $sys, " ";
}
echo "<br>";
echo "Terms & agrrement: ",$_POST['agreement'],"<br>";