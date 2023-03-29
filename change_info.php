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

</head>
<body>
<?php
require_once("config.php");
require_once('lazy_session_start.php');
lazy_session_start();
require_once("secureadmin.php");
include("navbar.php");

if(isset($_GET['editpn'])){
$id=$_GET['editpn'];
$_SESSION['editid'] = $id;
$con = config::connect();
$query = $con->prepare("
 
SELECT * FROM playingnow WHERE ID=:id LIMIT 1

");

$query->bindParam(":id", $id);

$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$mvname = $row['moviename'];
$description =$row['moviedescription'];
$actors=$row['movieactors'];
$genres=$row['moviegenres'];
$time=$row['movietime'];
$img=$row['movieimg'];
$trailer=$row['movietrailer'];
echo "
<form method='POST' action='updateinfo.php'>
<div class='container'>
<h3 style='text-align:center; margin-top: 3rem;'>Name</h3>
<div class='col-lg-9' style='margin:0 auto; float: none;'>
<input type='text' class='form-control text-center' name='name' value='$mvname'>
<h3 style='text-align:center; margin-top: 1rem;'>Description</h3>
<input type='text' class='form-control text-center' name='description' value='$description'>
<h3 style='text-align:center; margin-top: 1rem;'>Actors</h3>
<input type='text' class='form-control text-center' name='actors' value='$actors'>
<h3 style='text-align:center; margin-top: 1rem;'>Genres</h3>
<input type='text' class='form-control text-center' name='genres' value='$genres'>
<h3 style='text-align:center; margin-top: 1rem;'>Time</h3>
<input type='text' class='form-control text-center' name='time' value='$time'>
<h3 style='text-align:center; margin-top: 1rem;'>Image Path</h3>
<input type='text' class='form-control text-center' name='img' value='$img'>
<h3 style='text-align:center; margin-top: 1rem;'>Trailer Link</h3>
<input type='text' class='form-control text-center' name='trailer' value='$trailer'>
</div>
<div class='col-lg-12 text-center mt-4'>
<button type='submit' class='btn btn-primary' style='justify-contect: center;' name='submit'>Update</button>
</form>
</div>
</div>
";
}

if(isset($_GET['editcu'])){
$id=$_GET['editcu'];
$_SESSION['editid'] = $id;
$con = config::connect();
$query = $con->prepare("
 
SELECT * FROM comingup WHERE id=:id LIMIT 1

");

$query->bindParam(":id", $id);

$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$mvname = $row['moviename'];
$description =$row['moviedescription'];
$actors=$row['movieactors'];
$genres=$row['moviegenres'];
$time=$row['movietime'];
$img=$row['movieimg'];
$trailer=$row['movietrailer'];
echo "
<form method='POST' action='updateinfo.php'>
<input type='hidden' name='uname' value='editcu2?>'>
<div class='container'>
<h3 style='text-align:center; margin-top: 3rem;'>Name</h3>
<div class='col-lg-9' style='margin:0 auto; float: none;'>
<input type='text' class='form-control text-center' name='name' value='$mvname'>
<h3 style='text-align:center; margin-top: 1rem;'>Description</h3>
<input type='text' class='form-control text-center' name='description' value='$description'>
<h3 style='text-align:center; margin-top: 1rem;'>Actors</h3>
<input type='text' class='form-control text-center' name='actors' value='$actors'>
<h3 style='text-align:center; margin-top: 1rem;'>Genres</h3>
<input type='text' class='form-control text-center' name='genres' value='$genres'>
<h3 style='text-align:center; margin-top: 1rem;'>Time</h3>
<input type='text' class='form-control text-center' name='time' value='$time'>
<h3 style='text-align:center; margin-top: 1rem;'>Image Path</h3>
<input type='text' class='form-control text-center' name='img' value='$img'>
<h3 style='text-align:center; margin-top: 1rem;'>Trailer Link</h3>
<input type='text' class='form-control text-center' name='trailer' value='$trailer'>
</div>
<div class='col-lg-12 text-center mt-4'>
<button type='submit' class='btn btn-primary' style='justify-contect: center;' name='submit'>Update</button>
</form>
</div>
</div>
";
}?>



    
</body>
</html>