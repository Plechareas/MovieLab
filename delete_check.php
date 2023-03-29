<?php

require_once("config.php");
require_once("process.php");

if(isset($_GET['idpn'])){
    $id = $_GET['idpn'];
    $con = config::connect();
    $query = $con->prepare("

    DELETE FROM playingnow WHERE ID=:id LIMIT 1

    ");
    
    $query->bindParam(":id", $id);
    $query->execute();
    if($query->execute()){
        //na to prospathisoume me modal otan exoume xrono
        array_push($errormsg, "Movie has been deleted.");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }else{
        array_push($errormsg, "Something went wrong with deleting the movie.");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
}

if(isset($_GET['idcu'])){
    $id = $_GET['idcu'];
    $con = config::connect();
    $query = $con->prepare("

    DELETE FROM comingup WHERE ID=:id LIMIT 1

    ");
    
    $query->bindParam(":id", $id);
    $query->execute();
    if($query->execute()){
        array_push($errormsg, "Movie has been deleted");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }else{
        array_push($errormsg, "Something went wrong with deleting the movie.");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
}



?>