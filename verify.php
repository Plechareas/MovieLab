<?php

require_once("config.php");
require_once('lazy_session_start.php');
lazy_session_start();
require_once("process.php");

if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];

    $con = config::connect();

    $query = $con->prepare("
    
    SELECT verified,vkey FROM users WHERE verified = 0 AND vkey=:vkey LIMIT 1
    
   
    
    ");
    $query->bindParam(":vkey", $vkey);

    $query->execute();
    
    if ($query->rowCount() == 1){
        $query = $con->prepare("
        UPDATE users SET verified = 1 WHERE vkey=:vkey
    
        ");
        $query->bindParam(":vkey", $vkey);
        if($query->execute()){
            array_push($errormsg, "You have been verified successfully.");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }else{
            array_push($errormsg, "Something went wrong with the verification process.");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }
    }else{
        array_push($errormsg, "You are already verified.");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }

}




?>