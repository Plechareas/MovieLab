<!DOCTYPE html>

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
    include("config.php");
    require_once("components.php");
    require_once('lazy_session_start.php');
    lazy_session_start();
    ?>




<?php

$con = config::connect();
$query = $con->prepare("
 
SELECT * FROM playingnow

");

$temp=$query->execute();

$temp2=$query->fetchAll();


?>


<div class="container-fluid" style="margin-top: 5rem;">
    <div class="row welcome text-center" style="color: black;">
      <div class="col-12">
        <h1 class="display-4" style="font-size: 80px; font-weight: 500;">Playing now</h1>
      </div>
      <hr>
    </div>
  </div>
  <div class="container align-items-center" style="margin-top: 5rem;">
    <div class="row row2">
      <?php
      foreach ($temp2 as $row){
        cardpn($row['movieimg'], $row['ID']);
      }
      ?>
    </div>
</div>
<br>
  <!-- footer --> 
<?php 
    include("footer.php");
?>
    </body>
</html>