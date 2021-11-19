<?php 

    echo "Username: ", $_GET['username'], "<br>";
    echo "Password: ", $_GET['password']. "<br>";
    echo "Email: ", $_GET['email']. "<br>";
    echo "Job: ", $_GET['job']. "<br>";
    echo "Gender: ", $_GET['Gender']. "<br>";
    echo $_GET['system'];
    foreach ($_GET['system'] as $sys) {
        echo $sys, " ";
    }
    echo "Terms and agrrement: ", $_GET['termCheck'], "<br>";
?>