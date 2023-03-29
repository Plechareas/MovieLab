<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="booking.css">
</head>
<body>
<?php

    include("navbar.php");
    require_once('lazy_session_start.php');
    require_once('config.php');
    require_once("process.php");
	lazy_session_start();
  if(!isset($_SESSION['id'])){
    array_push($errormsg, "Login is required");
    $_SESSION['errormsg'] = $errormsg;
    header("Location: errors.php");
    exit();
  }
    $movieid = $_GET['id'];
    $con = config::connect();
    $query = $con->prepare("
    
    SELECT * FROM playingnow WHERE ID=:movieid LIMIT 1
    
    ");

    $query->bindParam(":movieid", $movieid);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $mvname = $row['moviename'];
    $mvimg = $row['movieimg'];
    $_SESSION['bookingname'] = $mvname;
    $t1 = date("d-m-Y", strtotime("+1 day"));
    $t2 = date("d-m-Y", strtotime("+2 day"));
    $t3 = date("d-m-Y", strtotime("+3 day"));
    $t4 = date("d-m-Y", strtotime("+4 day"));
    $t5 = date("d-m-Y", strtotime("+5 day"));
    
?>

<form method="POST" action="process.php">    
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <img class="img-fluid" style="width: 30rem;" src="<?=$mvimg?>">
            </div>
        <div class="col-md-6 col-lg-6" style="color: white;">
        <h1 style="text-align: center;"><?=$mvname?></h1>
        <label class="text-center" style="padding-bottom: 10px;">Room</label>
        <select class="custom-select my-select form-control required text-center" name="room" style="background: white; color:black;">
          <option value="Dolby Atmos">Dolby Atmos</option>
          <option value="iMax">iMax</option>
          <option value="3D">3D</option>
        </select>
        <label class="" style="padding-bottom: 10px; padding-top: 10px;">Date</label>
        <select class="custom-select my-select form-control required text-center" name="date" style="background: white; color:black;">
          <option value="<?= $t1 ?>"><?= $t1 ?></option>
          <option value="<?= $t2 ?>"><?= $t2 ?></option>
          <option value="<?= $t3 ?>"><?= $t3 ?></option>
          <option value="<?= $t4 ?>"><?= $t4 ?></option>
          <option value="<?= $t5 ?>"><?= $t5 ?></option>
        </select>
        <label class="text-center" style="padding-bottom: 10px; padding-top: 10px;">Time</label>
        <select class="custom-select my-select form-control required text-center" name="time" style="background: white; color:black;">
          <option value="16:00">16:00</option>
          <option value="19:00">19:00</option>
          <option value="23:00">23:00</option>
        </select>
        <label class="text-center" style="padding-bottom: 10px; padding-top: 10px;">Tickets</label>
        <div class="product-item">
        <select class="product-select my-select form-control required text-center" name="tickets" id="tickets" style="background: white; color:black;">
          <option value="1">(1) 10€</option>
          <option value="2">(2) 20€</option>
          <option value="3">(3) 30€</option>
          <option value="4">(4) 40€</option>
          <option value="5">(5) 50€</option>
          <option value="6">(6) 60€</option>
        </select>   
</div>
        <span id="item-price"></span>
        <button type="submit" name="booking" class="btn btn-outline" style="background-color: #75384D; color: white; margin-top: 45px; width: 100%; padding-top: 12px; padding-bottom: 12px;">BOOK NOW</button>
        </div>
        </div>
    </div>
</form>
</body>
</html>