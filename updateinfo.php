<?php

require_once("config.php");
require_once('lazy_session_start.php');
lazy_session_start();
require_once("secureadmin.php");
require_once("process.php");

if(isset($_POST['submit'])){
    $mvname = $_POST['name'];
    $mvdescription = $_POST['description'];
    $mvactors= $_POST['actors'];
    $mvgenres= $_POST['genres'];
    $mvtime= $_POST['time'];
    $mvimg= $_POST['img'];
    $mvtrailer= $_POST['trailer'];
    $id = $_SESSION['editid'];

    $con=config::connect();
    if(empty($_POST['uname'])){
    $query=$con->prepare("
    
    UPDATE playingnow SET moviename=:mvname, moviedescription=:mvdescription, movieactors=:mvactors, moviegenres=:mvgenres, movietime=:mvtime, movieimg=:mvimg, movietrailer=:mvtrailer WHERE ID=:id LIMIT 1
    
    ");
    }
    if(!empty($_POST['uname'])){
        $query=$con->prepare("
    
    UPDATE comingup SET moviename=:mvname, moviedescription=:mvdescription, movieactors=:mvactors, moviegenres=:mvgenres, movietime=:mvtime, movieimg=:mvimg, movietrailer=:mvtrailer WHERE ID=:id LIMIT 1
    
    ");
    }
    $query->bindParam(":mvname", $mvname);
    $query->bindParam(":mvdescription", $mvdescription);
    $query->bindParam(":mvactors", $mvactors);
    $query->bindParam(":mvgenres", $mvgenres);
    $query->bindParam(":mvtime", $mvtime);
    $query->bindParam(":mvimg", $mvimg);
    $query->bindParam(":mvtrailer", $mvtrailer);
    $query->bindParam(":id", $id);
    $query->execute();
    if($query->execute()){
        array_push($errormsg, "Movie has been updated.");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
   }else{
        array_push($errormsg, "Something went wrong with updating the movie.");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
}

?>