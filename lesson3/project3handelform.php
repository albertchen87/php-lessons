<?php


echo "hi";
$resnum = "1";
$tablenumber =  $_POST['tablenumber'];
$item1 = $_POST['item1'];
$item2 = $_POST['item2'];
$item3 = $_POST['item3'];
$item4 = $_POST['item4'];
$item5 = $_POST['item5'];


try {
    $conn = new PDO("mysql:host=localhost;dbname=test","root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $sql = "INSERT INTO `orderlist`(Restaurant_ID, TableNumber, Item_1, Item_2, Item_3, Item_4, Item_5) VALUES ('$resnum', '$tablenumber', '$item1', '$item2', '$item3', '$item4', '$item5')";
    $conn->exec($sql);
    echo "Inserted successfully";

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $conn = null;

  ?>