<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'registration';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $idNum = $_GET['idNum'];
    $studFName = $_POST['studFName'];
    $studLName = $_POST['studLName'];
    $campus = $_POST['campus'];
    $amountPaid = $_POST['amountPaid'];

    $sql = "UPDATE registration SET studFName = '$studFName', studLName = '$studLName', campus = '$campus', amountPaid = '$amountPaid'";
    if ($conn->query($sql)){
        echo "<script>
        alert('Updated Successfully');
        window.location.href = 'viewStudents.php';
        </script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students</title>
</head>
<body>
    <form action = "" method = "post">
        <label for = "studFName">New First Name:</label>
        <input type = "text" id = "studFName" name = "studFName" required><br><br>

        <label for = "studLName">New Last Name: </label>
        <input type = "text" id = "studLName" name = "studLName" required><br><br>

        <label for = "campus">New Campus:</label>
        <input type = "text" id = "campus" name = "campus" required><br><br>

        <label for = "amountPaid">New Amount Paid: </label>
        <input type = "number" step = "0.01" id = "amountPaid" name = "amountPaid" required><br><br>

        <button type = "submit" id = "addBtn">Update</button>
        <button type = "reset" id = "cnlBtn">Cancel</button>
    </form>
</body>
</html>