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
    
    $check = "SELECT attended from registration where idNum = '$idNum'";
    $result = $conn->query($check);

    if ($result->num_rows == 0){
        echo "<script>
            alert('ID # is not YET REGISTERED');
            window.location.href = 'viewAttendance.php';
        </script>";
        exit;
    }
    $row = $result->fetch_assoc();

    if ($row['attended'] === 'Yes'){
        echo "<script>
            alert('Student Attendance is already Recorded.');
            window.location.href = 'viewAttendance.php';
        </script>";
        exit;
    }
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