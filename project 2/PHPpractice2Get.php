<?php

echo "Username: ",$_GET['username'],"<br>";
echo "Password: ",$_GET['password'],"<br>";
echo "Email: ",$_GET['email'],"<br>";
echo "Job: ",$_GET['job'],"<br>";
echo "Gender: ",$_GET['gender'],"<br>";
echo "Operating System Familiarity: ";
foreach ($_GET['system'] as $sys) {
    echo $sys, " ";
}
echo "<br>";
echo "Terms & agrrement: ",$_GET['agreement'],"<br>";

// get is more useful for non-private information
// post is more useful for private information such as username, password, etc.