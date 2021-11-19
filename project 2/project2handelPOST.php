<?php 

    echo "Username: ", $_POST['username'], "<br>";
    echo "Password: ", $_POST['password']. "<br>";
    echo "Email: ", $_POST['email']. "<br>";
    echo "Job: ", $_POST['job']. "<br>";
    echo "Gender: ", $_POST['Gender']. "<br>";
    echo $_POST['system'];
    foreach ($_POST['system'] as $sys) {
        echo $sys, " ";
    }
    echo "Terms and agrrement: ", $_POST['termCheck'], "<br>";
?>