<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=wayner_kerr_restaurant","root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $sql = "INSERT INTO `menu` (Menu_ID, Restaurant_ID, List_ID) VALUES ('2','2','2')";
    $conn->exec($sql);
    echo "Inserted successfully";

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
