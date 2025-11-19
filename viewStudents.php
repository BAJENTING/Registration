<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'registration';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM registration";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div id = "navbar">
    <ul>
        <li><a href = "registration.php">Register a Student Here</a></li>
        <li><a href = "index.html">Back to Menu</a></li>
    </ul>
    </div>
    <table border = 1 cellpadding = 10 cellspacing = 0>
        <tr>
            <th>ID #</th>
            <th>Name</th>
            <th>Campus</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
        <?php
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['idNum']."</td>";
                    echo "<td>".$row['studLName'].", ".$row['studFName']."</td>";
                    echo "<td>".$row['campus']."</td>";
                    echo "<td>".$row['amountPaid']."</td>";
                    echo "<td>
                    <a href = 'editStud.php?idNum=".$row['idNum']."'><button id = 'edtBtn'>Edit</button></a>
                    <a href = 'delStud.php?idNum=".$row['idNum']."'><button id = 'delBtn'>Del</button></a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = '5'>No Records Found</td></tr>";
            }
        ?>
    </table>
</body>
</html>