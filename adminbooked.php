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
require_once("config.php");
require_once("secureadmin.php");
include("navbar.php");
$con = config::connect();
$query = $con->prepare("
    
    SELECT * FROM booked
    
    ");

$test=$query->execute();
$temp2=$query->fetchAll();
?>


<table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Costumer Username</th>
      <th scope="col">Room</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Tickets</th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($temp2 as $row){
          $id=$row['id'];
          $cuss=$row['costumer_username'];
          $room=$row['room'];
          $date=$row['date'];
          $time=$row['time'];
          $tickets=$row['tickets'];
          ?>
        <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $cuss ?></td>
        <td><?php echo $room ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $time ?></td>
        <td><?php echo $tickets ?></td>
      </tr>
      <?php
      }
      ?>

    </tbody>
</table>




</body>
</html>