<?php
 $host = 'localhost';
 $username = 'root';
 $password = '';
 $db = 'registration';

 $conn = new mysqli($host, $username, $password, $db);
 if ($conn->connect_error){
    die ("Connection Error: ".$conn->connect_error)
 }
?>