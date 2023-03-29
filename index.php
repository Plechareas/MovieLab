<!DOCTYPE html>

<?php
require_once('lazy_session_start.php');
lazy_session_start();
$_SESSION['loggedin'] = false;
require_once("components.php");
require_once("config.php");
include("backtotop.html");
?>


<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="indexstyle.css">
    </head>

    <body>
    <?php 
    include("navbar.php");
    ?>
    <!-- carousel -->

    <div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
    <li data-target="#slides" data-slide-to="0" class="active"></li>
    <li data-target="#slides" data-slide-to="1"></li>
    <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/carousel/mov1.jpeg">
        </div>
        <div class="carousel-item">
            <img src="./img/carousel/mov2.jpg">
        </div>
        <div class="carousel-item">
            <img src="./img/carousel/mov3.jpg">
        </div>
    </div>
</div>


<!-- playing now -->

<?php

$con = config::connect();
$query = $con->prepare("
 
SELECT * FROM playingnow

");

$temp5=$query->execute();

$temp5=$query->fetchAll();


?>

  <div class="container-fluid bg-dark" style="margin-top: 5rem;">
    <div class="row welcome text-center" style="padding: 40px; color:white;">
      <div class="col-12">
        <h1 class="display-4">Hot Movies Playing now</h1>
      </div>
      <hr>
    </div>
  </div>
  <div class="container" style="margin-top: 5rem;">
    <div class="row row2">
      
        <?php
        
        $x=0;
        foreach($temp5 as $row){
        $x=$x+1;
        $temp=$query->fetch(PDO::FETCH_ASSOC);
        cardpn($row['movieimg'],$row['ID']);
        if($x==3){
          break;
        }
        }
        ?>
      </div>
</div>

  <div class="container"style="margin-top: 2rem;">
    <div class="col-md-12 text-center">
        <a href="movies.php"><button type="button" class="btn">View All</button></a>
    </div>
</div>


<!-- coming up -->

<?php

$con = config::connect();
$query = $con->prepare("
 
SELECT * FROM comingup

");

$temp=$query->execute();

$temp2=$query->fetchAll();


?>

<div class="container-fluid bg-dark" style="margin-top: 5rem;">
    <div class="row welcome text-center" style="padding: 40px; color:white;">
      <div class="col-12">
        <h1 class="display-4">Coming up</h1>
      </div>
      <hr>
    </div>
  </div>
  <div class="container" style="margin-top: 5rem;">
    <div class="row row2">
      <?php
      foreach($temp2 as $row){
        cardcu($row['movieimg'], $row['id']);
      }
      ?>
  </div>
  </div>

<!-- footer -->
<?php 
    include("footer.php");
?>

    </body>
</html>