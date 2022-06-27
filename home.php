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
          <a href="login.php">Log-in/Sign-in</a>
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

    <a href="rss.xml" target="_blank">
      <img src="imagini/128px-Feed-icon.svg.png" alt="rss icon" style="width: 50px;">
    </a>

  </body>
</html>

<?php //almost finished adding rss flux

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
echo "Flux RSS";
?>