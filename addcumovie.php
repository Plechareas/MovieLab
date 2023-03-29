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
    <style>
    .custom-file-upload {
    
    border: 1px solid #ccc;
    text-align: center;
    border-radius: 4px;
    padding: 15px;
}
    </style>
</head>
<body>
    <?php
require_once('lazy_session_start.php');
lazy_session_start();
require_once("components.php");
require_once("config.php");
require_once("secureadmin.php");
include("navbar.php");
    ?>
<form method='POST' action='addmv.php' enctype="multipart/form-data">
    <div class='container'>
        <h3 style='text-align:center; margin-top: 3rem;'>Name</h3>
        <div class='col-lg-9' style='margin:0 auto; float: none;'>
            <input type='text' class='form-control text-center' name='name' value=''>
            <h3 style='text-align:center; margin-top: 1rem;'>Description</h3>
            <input type='text' class='form-control text-center' name='description' value=''>
            <h3 style='text-align:center; margin-top: 1rem;'>Actors</h3>
            <input type='text' class='form-control text-center' name='actors' value=''>
            <h3 style='text-align:center; margin-top: 1rem;'>Genres</h3>
            <input type='text' class='form-control text-center' name='genres' value=''>
            <h3 style='text-align:center; margin-top: 1rem;'>Time</h3>
            <input type='text' class='form-control text-center' name='time' value=''>
            <h3 style='text-align:center; margin-top: 1rem;'>Trailer Link</h3>
        <input type='text' class='form-control text-center' name='trailer' value=''>
            <h3 style='text-align:center; margin-top: 1rem;'>Image</h3>
            <div class="custom-file-upload" id="content">
                <input type="file"
                name="uploadfile" 
                value="" />
  </form>
</div>

<div class='col-lg-12 text-center mt-4'>
<button type='submit' class='btn btn-primary' style='justify-content: center;' name='submitcu'>Update</button>
</form>
</div>
</div>

<?php



?>

<script>
$(document).ready(function() {
  $('input[type="file"]').on("change", function() {
    let filenames = [];
    let files = this.files;
    if (files.length > 1) {
      filenames.push("Total Files (" + files.length + ")");
    } else {
      for (let i in files) {
        if (files.hasOwnProperty(i)) {
          filenames.push(files[i].name);
        }
      }
    }
    $(this)
      .next(".custom-file-label")
      .html(filenames.join(","));
  });
});
</script>

</body>
</html>