<?php
 $host = 'localhost';
 $username = 'root';
 $password = '';
 $db = 'registration';

 $conn = new mysqli($host, $username, $password, $db);
 if ($conn->connect_error){
    die ("Connection Error: ".$conn->connect_error);
 }

 $idNum = $_GET['idNum'];

 $sql = "DELETE FROM registration where idNum = '$idNum'";
 if ($conn->query($sql)){
    echo "<script>
        alert('Deleted Successfully');
        window.location.href = 'viewStudents.php';
    </script>";
 }

 $conn->close();
?>