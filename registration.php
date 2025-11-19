<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'registration';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $idNum = $_POST['idNum'];
    $studFName = $_POST['studFName'];
    $studLName = $_POST['studLName'];
    $campus = $_POST['campus'];
    $amountPaid = $_POST['amountPaid'];

    $sql = "INSERT into registration(idNum, studFName, studLName, campus, amountPaid) VALUES ('$idNum','$studFName','$studLName','$campus','$amountPaid')";
    if ($conn->query($sql)){
        echo "<script>
            alert('Added Successfully');
            window.location.href = 'viewStudents.php';
        </script>";
    } else {
        echo "Unable to add".$conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
        <title>Add Student</title>
        <link rel = "stylesheet" href = "style.css">
    </head>
<body>
    <form action = "" method = "post">
        <label for = "idNum">Enter ID Number: </label>
        <input type = "text" id = "idNum" name = "idNum" required><br><br>

        <label for = "studFName">Enter First Name: </label>
        <input type = "text" id = "studFName" name = "studFName" required><br><br>

        <label for = "studLName"> Enter Last Name: </label>
        <input type = "text" id = "studLName" name = "studLName" required><br><br>

        <label for = "campus">Enter Campus: </label>
        <input type = "text" id = "campus" name = "campus" required><br><br>

        <label for = "amountPaid">Enter Amount Paid: </label>
        <input type = "number" step = "0.01" id = "amountPaid" name = "amountPaid" required> <br><br>

        <button type = "submit" id = "addBtn">Add Student</button>
        <button type = "reset" id = "cnlBtn">Cancel</button>
    </form>
</body>
</html>