<?php
if ($_SERVER["REQUEST_METHOD"] === "GET"){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'registration';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $campus = $_GET['campus'] ?? '';

    if ($campus === "all"){
        $check = "SELECT * FROM registration ORDER BY rand() limit 1";
    } else if (!empty($campus)){
        $check = "SELECT * FROM registration WHERE campus = '$campus' ORDER BY rand() limit 1";
    } else {
        $check = "SELECT * FROM registration WHERE 1=0";
    }

    $result = $conn->query($check);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Raffle Winners</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <a href = "index.html" style = "float: right; color: black; display: block;">Back to Menu</a><br>
   <form action="" method="get">
    <div class="filter" style="list-style-type: none; padding: 0; float: right; display: inline-flex; margin-top: 1em;">
        <h5>Set filters here: </h5>

        <input type="checkbox" id="campus_all" name="campus" value="all">
        <label for="campus_all" style="margin-top:21px">All</label>

        <input type="checkbox" id="campus_main" name="campus" value="Main">
        <label for="campus_main" style="margin-top:21px">Main</label>

        <input type="checkbox" id="campus_banilad" name="campus" value="Banilad">
        <label for="campus_banilad" style="margin-top:21px">Banilad</label>

        <input type="checkbox" id="campus_lm" name="campus" value="LM">
        <label for="campus_lm" style="margin-top:21px">LM</label>

        <input type="checkbox" id="campus_pt" name="campus" value="PT">
        <label for="campus_pt" style="margin-top:21px">PT</label>

        <button type="submit" style="margin: 0px 10px 0px 10px; padding: 14px 32px;">Filter</button>
    </div>
    </form>

    <h1> Reveal the Lucky Winner!</h1>
    <table border = 1 cellpadding = 10 cellspacing = 0 style = "width: 100%">
        <tr>
            <th>ID #</th>
            <th>Name</th>
            <th>Campus</th>
        </tr>
        <?php
            if ($result->num_rows !== 0 ){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['idNum']."</td>";
                    echo "<td>".$row['studLName'].", ".$row['studFName']."</td>";
                    echo "<td>".$row['campus']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = '3'>No Records Found</td></tr>";
            }
        ?>
    </table>
</body>
</html>