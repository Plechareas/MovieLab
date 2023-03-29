<?php
require_once("config.php");
require_once('lazy_session_start.php');
lazy_session_start();
require_once("secureadmin.php");
require_once("process.php");


if (isset($_POST['submit'])) {
    $con = config::connect();
    $mvname = $_POST['name'];
    $mvdescription = $_POST['description'];
    $mvactors= $_POST['actors'];
    $mvgenres= $_POST['genres'];
    $mvtime= $_POST['time'];
    $mvtrailer= $_POST['trailer'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./img/movies/".$filename;
    if (move_uploaded_file($tempname, $folder))  {
        $query = $con->prepare("
 
        INSERT INTO playingnow (moviename, moviedescription, movieactors, moviegenres, movietime, movieimg, movietrailer) VALUES (:mvname, :mvdescription, :mvactors, :mvgenres, :mvtime, :folder, :mvtrailer)

        ");
        $query->bindParam(":mvname",$mvname);
        $query->bindParam(":mvdescription",$mvdescription);
        $query->bindParam(":mvactors",$mvactors);
        $query->bindParam(":mvgenres",$mvgenres);
        $query->bindParam(":mvtime",$mvtime);
        $query->bindParam(":folder",$folder);
        $query->bindParam(":mvtrailer",$mvtrailer);
        if($query->execute()){
            array_push($errormsg, "Movie has been added successfully");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }else{
            array_push($errormsg, "Unsuccessfull movie upload");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }
    }else{
        array_push($errormsg, "Unsuccessfull image upload");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
  }
}
if (isset($_POST['submitcu'])) {
    echo "tesera";
    $con = config::connect();
    $mvname = $_POST['name'];
    $mvdescription = $_POST['description'];
    $mvactors= $_POST['actors'];
    $mvgenres= $_POST['genres'];
    $mvtime= $_POST['time'];
    $mvtrailer= $_POST['trailer'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./img/movies/".$filename;
    if (move_uploaded_file($tempname, $folder))  {
        $query = $con->prepare("
 
        INSERT INTO comingup (moviename, moviedescription, movieactors, moviegenres, movietime, movieimg, movietrailer) VALUES (:mvname, :mvdescription, :mvactors, :mvgenres, :mvtime, :folder, :mvtrailer)

        ");
        $query->bindParam(":mvname",$mvname);
        $query->bindParam(":mvdescription",$mvdescription);
        $query->bindParam(":mvactors",$mvactors);
        $query->bindParam(":mvgenres",$mvgenres);
        $query->bindParam(":mvtime",$mvtime);
        $query->bindParam(":folder",$folder);
        $query->bindParam(":mvtrailer",$mvtrailer);
        if($query->execute()){
            array_push($errormsg, "Movie has been added successfully");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }else{
            array_push($errormsg, "Unsuccessfull movie upload");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }
    }else{
            array_push($errormsg, "Unsuccessfull image upload");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
  }
}




?>