<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script> 
<style>
.middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    padding: 5px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }

.card:hover  {
    opacity: 0.8;
    display: inline-block;
}

.card:hover .middle {
    opacity: 1;
}

.btn{
    width: 100px;
    height: 40px;
    border: none;
    color: white;
}

</style>

<?php
require_once('lazy_session_start.php');
lazy_session_start();
require_once("secureadmin.php");
require_once("components.php");
require_once("config.php");
?>
</head>
<body>
<?php
include("navbar.php");
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
        <h1 class="display-4" style="font-size: 80px; font-weight: 500;">Edit Playing now movies</h1>
      </div>
      <hr>
    </div>
  </div>
  <div class="container align-items-center" style="margin-top: 5rem;">
    <div class="row row2">
      <?php
      foreach ($temp2 as $row){
        editCardpn($row['movieimg'], $row['ID']);
      }
      ?>
    </div>
    <div class="col-lg-12 text-center" style="margin-top: 3rem;">
    <a href="addpnmovie.php"><button type="button" class="btn btn-dark">Add Movie</button></a>
    </div>
</div>

<?php
$con = config::connect();
$query = $con->prepare("
 
SELECT * FROM comingup

");

$cmingup=$query->execute();

$cu=$query->fetchAll();


?>


<div class="container-fluid" style="margin-top: 5rem;">
    <div class="row welcome text-center" style="color: black;">
      <div class="col-12">
        <h1 class="display-4" style="font-size: 80px; font-weight: 500;">Edit Coming up movies</h1>
      </div>
      <hr>
    </div>
  </div>
  <div class="container align-items-center" style="margin-top: 5rem;">
    <div class="row row2">
      <?php
      foreach ($cu as $row){
        editCardcu($row['movieimg'], $row['id']);
      }
      ?>
    </div>
    <div class="col-lg-12 text-center" style="margin-top: 3rem;">
    <a href="addcumovie.php"><button type="button" class="btn btn-dark">Add Movie</button></a>
    </div>
</div>

</body>
</html>