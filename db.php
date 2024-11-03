<?php
$servername = "localhost";
$username = ""; 
$password = "";
$dbname = "todo_app";

try{
    $conn =  new PDO("mysql:host=$servername,dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Failed".$e->getMessage();
}