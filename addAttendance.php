<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'registration';

    $conn = new mysqli($host,$username,$password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $idNum = $_POST['idNum'];
    
    $sql = "UPDATE registration SET attended = 'Yes' WHERE idNum = '$idNum'";
    if ($conn->query($sql)){
        echo "<script>
            alert('Student Attendance is Successfully Recorded.');
            window.location.href = 'viewAttendance.php';
        </script>";
    } else {
        echo "Unable to record".$conn->error;
    }
?>