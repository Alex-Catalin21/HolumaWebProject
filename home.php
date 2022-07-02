<?php
  session_start();
  include_once  'bdConnection.php'; // included bd
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link href="home.css" rel="stylesheet" type="text/css" />
    <title>Home</title>

    <!-- adding css for ajax !-->
    <style>
      table,th,td{
        border : 1px solid black;
        border-collapse: collapse;
      }
      th,td{
        padding: 5px;
      }
    </style>
    <!-- ajax css end !-->

    <!-- style for space between buttons !-->
    <style>
    input { margin-bottom: 10px; }
    </style>
    
  </head>
  <body>

    <div class="header">
      <img src="imagini/new-logo.png" alt="logo" />
    
      <div class="header-right">
        <a class="active" href="home.php">Home</a>
        <a href="shop.php">Services</a>
        <?php
        if(!$_SESSION["loggedin"])
        {
        ?>
          <a href="login.php">Log-in/Sign-up</a>
        <?php
        }else{
        ?>
      
        <a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Log-out</a>
        <?php
        }
        ?>
      </div>
    </div>

    <main>
      <img id="logo" src="imagini/new-logo.png" alt="logo picture" />
      <div class="products"></div>

      
    </main>
    <form action="logout.php" id="logout_form" method="post">
    </form>
    
    <!-- rss button and title !-->
    <a href="rss.xml" target="_blank">
      <img src="imagini/128px-Feed-icon.svg.png" alt="rss icon" style="width: 50px;display: block;margin-left: auto;margin-right: auto;">
    </a>

    <p style="display:block;margin-left:auto;margin-right:auto;">Flux RSS</p> 
    <!--RSS button and title !-->

    <!-- second ajax example(from ajax xml) !-->
    <button type="button" onclick="loadDoc()">Preturi in functie de orase</button>
    <br><br>
    <table id="demo"></table>
    <!--end for second ajax example !-->

    <script>

  // second ajax example
  function loadDoc(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200){
        myFunction(this);
      }
    };
    xhttp.open("GET", "rss.xml", true);
    xhttp.send();
  }
  function myFunction(xml){
    var i;
    var xmlDoc = xml.responseXML;
    var table = "<tr><th>Pret</th><th>Oras</th></tr>";
    var x = xmlDoc.getElementsByTagName("item");
    for(i = 0; i<x.length; i++){
      table += "<tr><td>" +
      x[i].getElementsByTagName("pret")[0].childNodes[0].nodeValue + "</td><td>" + x[i].getElementsByTagName("oras")[0].childNodes[0].nodeValue + "</td></tr>";
    }
    document.getElementById("demo").innerHTML = table;
  }
  //end for ajax script
  </script>


  <!-- html for showing beautiful data !-->
  <form action="piechart.php" target="_blank">
    <input type="submit" value="Vizualizeaza datele in mod atractiv" />
  </form>
  <!-- html for showing beautiful data !-->

  <!-- html for exporting as pdf !-->
  <form action="dompdf1.php" target="_blank">
    <input type="submit" value="Exporta datele ca si PDF" />
  </form>
  <!-- html for exporting as pdf !-->

  <!-- html for exporting as json !-->
  <form action="citesteServiciiRest.php" target="_blank">
    <input type="submit" value="Exporta serviciile ca si JSON" />
  </form>
  <!-- html for exporting as json !-->

  <!-- html for feedback transport !-->
  <form action="feedback.html" target="_blank">
    <input type="submit" value="Doriti sa ne lasati un feedback?"/>
  </form>
  <!-- html for feedback transport !-->

  </body>
</html>

<?php //rss flux

$web_url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

$str = "<?xml version='1.0' ?>";
$str .= "<rss version='2.0'>";
  $str .= "<channel>";
    $str .= "<title>SERP</title>";
    $str .= "<description>Our Website</description>";
    $str .= "<language>en-US</language>";
    $str .= "<link>$web_url</link>";

    $conn = mysqli_connect("localhost", "root", "", "serp");
    $result = mysqli_query($conn, "SELECT * FROM services ORDER BY First_date DESC");

    while($row = mysqli_fetch_object($result))
    {
      $str .= "<item>";
        $str .= "<id>" . $row->Id_cat . "</id>";

        $str .= "<pret>" . $row->Pret . "</pret>";
        
        $str .= "<oras>" . $row->Oras  . "</oras>";
      $str .= "</item>";
    }
  $str .= "</channel>";
$str .= "</rss>";

file_put_contents("rss.xml", $str);

?>