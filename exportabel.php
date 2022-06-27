<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>
    <style type="text/css">
        table{
            border-collapse:collapse;
            width: 100%;
            color: #d96459;
            font-family:monospace;
            font-size:25px;
            text-align:left;
        }
        th{
            background-color:#d96459;
            color:white;
        }
        tr:nth-child(even){background-color:#f2f2f2}
    </style>
</head>
<body>
<table>
    <tr>
        <th>Id_cat</th>
        <th>Oras</th>
        <th>Pret</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","serp");
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }
    $sql = "SELECT Id_cat, Oras, Pret FROM services ORDER BY Pret DESC";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["Id_cat"]."</td><td>".$row["Oras"]."</td><td>".$row["Pret"]."</td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 result";
    }
    $conn->close();
    ?>
</table>
</body>
</html>