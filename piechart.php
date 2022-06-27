<?php require_once 'forpiechart/connect.php'; ?>
<?php 
    /*$query = "SELECT * FROM services";*/
    $query = "SELECT Id_cat, COUNT(Id_cat) AS `orders` FROM services WHERE Oras='Cluj' GROUP BY Id_cat ORDER BY `orders` DESC";
    $result = mysqli_query($conn,$query); 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PieChart</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php  
                while($chart = mysqli_fetch_assoc($result))
                {
                    echo "['".$chart['Id_cat']."',".$chart['Id_cat']."],";
                }
            ?>
        ]);

        var options = {
            title: 'Cele mai populare servicii'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
    </script>

</head>
<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>