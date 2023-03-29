<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
require_once('lazy_session_start.php');
lazy_session_start();
require_once("secureadmin.php");
require_once("config.php");
include("navbar.php");
$con = config::connect();
$query = $con->prepare("
    
    SELECT * FROM users
    
    ");
$query->execute();
//sunolikoi xrhstes
$totalusers = $query->rowCount();
//total earnings, no of booked tickets
$query = $con->prepare("
    
    SELECT tickets, total_cost FROM booked
    
    ");
$query->execute();
$temp=$query->fetchAll();
$totalearnings=0;
$totalbookedtickets=0;
foreach($temp as $row){
$totalearnings+=$row['total_cost'];
$totalbookedtickets+=$row['tickets'];
}
?>

<div class="container" style="margin-top: 5rem;">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="./img/money.png" alt="" style="width: 100%; height: 10vw; object-fit: scale-down; padding-top: 15px;">

                    <div class="card-body">
                        <h5 class="card-title text-center">Total earnings</h5>
                        <p class="card-text text-center">
                        The total MovieLab earnings are : <?php echo $totalearnings ?> €
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="./img/account.png" alt="" style="width: 100%; height: 10vw; object-fit: scale-down; padding-top: 15px;">

                    <div class="card-body">
                        <h5 class="card-title text-center">Total accounts created</h5>
                        <p class="card-text text-center">
                        The number of accounts that have been created in MovieLab is : <?php echo $totalusers ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top text-center" src="./img/adminticket.png" alt="" style="width: 100%; height: 10vw; object-fit: scale-down; padding-top: 15px;">

                    <div class="card-body">
                        <h5 class="card-title text-center">Total tickets sold</h5>
                        <p class="card-text text-center">
                        The number of tickets that have been sold in MovieLab is : <?php echo $totalbookedtickets ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="./img/views.png" alt="" style="width: 100%; height: 10vw; object-fit: scale-down; padding-top: 15px;">

                    <div class="card-body">
                        <h5 class="card-title text-center">Website views</h5>
                        <p class="card-text text-center">
                            The total views of MovieLab is : 15
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>