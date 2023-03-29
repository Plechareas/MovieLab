<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php 
    require_once("navbar.php");
    include("backtotop.html");
	require_once('lazy_session_start.php');
    require_once('config.php');
	lazy_session_start();
    
    if(isset($_GET['morepn'])){
    $movieid = $_GET['morepn'];
    $con = config::connect();
    $query = $con->prepare("
    
    SELECT * FROM playingnow WHERE ID=:movieid LIMIT 1
    
    ");

    $query->bindParam(":movieid", $movieid);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $mvname = $row['moviename'];
    $mvdescription = $row['moviedescription'];
    $mvactors = $row['movieactors'];
    $mvgenres = $row['moviegenres'];
    $mvtime = $row['movietime'];
    $mvimg = $row['movieimg'];
    $mvtrailer = $row['movietrailer'];
    ?>
<div class="container" style="margin-top: 6rem">
    <div class="row">
    <div class="col-md-6 col-lg-4 text-center">
        <img style="width: 25rem;" src="<?=$mvimg?>">
    </div>
    <div class="col-md-6 col-lg-8 mb-3" style="padding-left: 4rem;">
        <h1 class="display-4 text-center font-weight-bold"><?=$mvname?></h1>
        <hr>
        <h2 class="display-6 text-muted text-center">Plot: <?=$mvdescription?></h2>
        <hr>
        <h2 class="display-6 text-muted text-center">Actors: <?=$mvactors?></h2>
        <hr>
        <h2 class="display-6 text-muted text-center">Genres: <?=$mvgenres?></h2>
        <hr>
        <h2 class="display-6 text-muted text-center">Time: <?=$mvtime?></h2>
        <hr>
    </div>
    </div>
    <div class="container" style="margin-top: 2rem;">
    <div class="col-md-12 text-center">
    <a href="<?php echo 'booking.php?id='.$movieid; ?>"><button type="button" class="btn btn btn-danger btn-lg" style="width: 200px; background-color: #75384D">Book now</button></a>
    </div>
</div>
    <h1 class="display-4 text-center mt-4 font-weight-bold">Trailer</display>
    <div class="embed-responsive embed-responsive-16by9" style="margin-top: 2rem;">
        <iframe class="embed-responsive-item" src="<?=$mvtrailer?>"></iframe>
    </div>  
</div>
<?php
}
?>
<?php
if(isset($_GET['morecu'])){
    $movieid = $_GET['morecu'];
    $con = config::connect();
    $query = $con->prepare("
    
    SELECT * FROM comingup WHERE id=:movieid LIMIT 1
    
    ");

    $query->bindParam(":movieid", $movieid);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $mvname = $row['moviename'];
    $mvdescription = $row['moviedescription'];
    $mvactors = $row['movieactors'];
    $mvgenres = $row['moviegenres'];
    $mvtime = $row['movietime'];
    $mvimg = $row['movieimg'];
    $mvtrailer = $row['movietrailer'];
    ?>
<div class="container" style="margin-top: 6rem">
    <div class="row">
    <div class="col-md-6 col-lg-4 text-center">
        <img style="width: 25rem;" src="<?=$mvimg?>">
    </div>
    <div class="col-md-6 col-lg-8 mb-3" style="padding-left: 4rem;">
        <h1 class="display-4 text-center font-weight-bold"><?=$mvname?></h1>
        <hr>
        <h2 class="display-6 text-muted text-center">Plot: <?=$mvdescription?></h2>
        <hr>
        <h2 class="display-6 text-muted text-center">Actors: <?=$mvactors?></h2>
        <hr>
        <h2 class="display-6 text-muted text-center">Genres: <?=$mvgenres?></h2>
        <hr>
        <h2 class="display-6 text-muted text-center">Time: <?=$mvtime?></h2>
        <hr>
    </div>
    </div>
    <div class="container" style="margin-top: 2rem;">
    <div class="col-md-12 text-center">
    <h1 style="font-style: italic;">Available soon</h1>
    </div>
</div>
    <h1 class="display-4 text-center mt-4 font-weight-bold">Trailer</display>
    <div class="embed-responsive embed-responsive-16by9" style="margin-top: 2rem;">
        <iframe class="embed-responsive-item" src="<?=$mvtrailer?>"></iframe>
    </div>  
</div>
<?php
}
?>

<?php
include("footer.php");
?>

</body>
</html>