<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$dbName = "todo_list";

try{
    $conn = new PDO("mysql:host=$sName;dbName=$dbName",$uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected!";
}catch(PDOException $e){
    echo "Connection error: " . $e->getMessage();
}




