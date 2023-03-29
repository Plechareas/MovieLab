<?php

require_once("config.php");
require('./booking/fpdf.php');
require_once('lazy_session_start.php');
lazy_session_start();


$errormsg=array();

if(!empty($_POST["username"])){
    $con = config::connect();
    $username = $_POST["username"];
    $query = $con->prepare("
    SELECT * FROM users WHERE username=:username
    
    ");

    $query->bindParam(":username", $username);

    $query->execute();
    
    if($query->rowCount() > 0 ){
        echo "<span style='color:red; opacity: 1; font-size:15px;'>&#10060; Username already exists.</span>";
    }else{
        echo "<span style='color:green;opacity: 1; font-size:15px;'>&#10004;&#65039; Username is available.</span>";
    }
}

//ajax check email
if(!empty($_POST["email"])){
    $con = config::connect();
    $email = $_POST["email"];
    $query = $con->prepare("
    SELECT * FROM users WHERE email=:email
    
    ");

    $query->bindParam(":email", $email);

    $query->execute();
    
    if($query->rowCount() > 0 ){
        echo "<span style='color:white; opacity: 1; font-size:15px;'>&#10060; Email already exists.</span>";

    }else{
        echo "<span style='color:green;opacity: 1; font-size:15px;'>&#10004;&#65039; Email is available.</span>";
    }
}


//register xrhsth
if(isset($_POST['register'])){

    $con = config::connect();
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
    $hashed_password = md5($password);
    

    //validation server-side
    $query = $con->prepare("
    SELECT username FROM users WHERE username=:username LIMIT 1
    
    ");
    $query->bindParam(":username", $username);
    $query->execute();
    if($query->rowCount() == 1 ){
        //vrethike logariasmos me to idio uss
        array_push($errormsg, "Username already exists");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
    if(strlen($username)<8){
        array_push($errormsg, "Username must be at least 8 characters");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
    $query = $con->prepare("
    SELECT email FROM users WHERE email=:email LIMIT 1
    
    ");
    $query->bindParam(":email", $email);
    $query->execute();
    if($query->rowCount() == 1){
        array_push($errormsg, "email already exists");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
    if(!preg_match('^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[/\W|_/g]).{8,}$^', $password)){
        array_push($errormsg, "Password must contain at least 8 characters, one uppercase letter, one number, one lowercase and one special character");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
    if($password!=$password2){
        array_push($errormsg, "Passwords don't match");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
    if(!empty($errormsg)){
        
    }else{




        $vkey = md5(time().$username);

        if(insertAccount($con, $username, $email, $hashed_password, $vkey)){
            $to = $email;
            $subject = "Email Verification";
            $message = '<!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                <div class="Wrapper">
                    <p>
                        Thank you for signing up on our website. Please click on the link below
                        to verify your email
                    </p>
                    <a href="http:/localhost/project2/verify.php?vkey=' . $vkey . '">Verify your email address</a>
                </div>
            </body>
            </html>';
            $headers = "From: movielab2k21@gmail.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
            mail($to,$subject,$message,$headers);
            array_push($errormsg, "An link verification has been sent to your email.");
            $_SESSION['errormsg'] = $errormsg;
            header("Location: errors.php");
            exit();
        }
    
    }
    }



//login xrhsth

if(isset($_POST['login'])){
    $con = config::connect();
    $username = filter_var($_POST['loginUsername'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['loginPassword'], FILTER_SANITIZE_STRING);
    $hashed_password = md5($password);

    //validate username & password

    if(checkLogin($con, $username, $hashed_password, $errormsg)){
        if($_SESSION['accounttype'] == 1){
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit();
        }
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
                exit();
    }else{
        $_SESSION['loggedin'] = false;
        array_push($errormsg, "Username or password is incorrect");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }
}

//koumpi gia na steilei kwdiko pw reset sto email
if(isset($_POST['pwreset'])){
    $con=config::connect();
    $email = filter_var($_POST['emailpwreset'], FILTER_SANITIZE_EMAIL);

    $query = $con->prepare("
    
    SELECT * FROM users WHERE email=:email LIMIT 1
    
    ");

    $query->bindParam(":email", $email);
    $query->execute();
    if($query->rowCount() == 1){
        $pwtoken = md5(time());
        Emailpastoken($con, $email, $pwtoken);
    }else{
        array_push($errormsg, "Email does not exist");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }

}

//koumpi meta to email gia na allaksei kwdiko
if(isset($_POST['resetpassword'])){
    $pwtoken = $_SESSION['kwdikos'];
    $email = $_SESSION['toemail'];
    $con = config::connect();
    $password = filter_var($_POST['finalpwreset'], FILTER_SANITIZE_STRING);
    $repeatpassword = filter_var($_POST['repeatfinalpwreset'], FILTER_SANITIZE_STRING);
    $hashed_password = md5($password);
    //validate ta stoixeia


    resetPassword($con, $hashed_password, $pwtoken, $email);
}

//booking
if(isset($_POST['booking'])){
    $costumer_username = $_SESSION['username'];
    $mvname = $_SESSION['bookingname'];
    $room = $_POST['room'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $temp4= ' '.$date.' || '.$time.'';
    $tickets = $_POST['tickets'];
    $email = $_SESSION['email'];
    
    //validate stoixeia

    $con = config::connect();

    if(insertBooked($con, $costumer_username, $room, $date, $time, $tickets)){
        class PDF extends FPDF
{
	/* Page header */
	function Header()
	{
		/* Logo */
		$this->Image('./img/logo.png',88,6,35);
	}



function Footer()
{
    /* Position at 1.5 cm from bottom */
    $this->SetY(-15);
    /* Arial italic 8 */
    $this->SetFont('Arial','I',8);
    /* Page number */
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

/* Instanciation of inherited class */
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('helvetica','',13);
    $pdf->Cell(20,50, 'Location: Plateia Parkou, Lamia, 35100', 0, 1, 'L');
    $pdf->Cell(0,-30, 'Telephone: 22310-66911', 1, 0, 'L');
    $pdf->SetFont('helvetica','',19);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Image('./img/ticket.png', 20, 90 , 170);
    $pdf->Ln();
    $pdf->Cell(100);
    $pdf->Cell(10,140, $mvname ,0,1,'C');
    $pdf->Cell(100);
    $pdf->Cell(10,-120,$temp4,0,1,'C');
    $pdf->Cell(100);
    $pdf->Cell(10, 140,$room,0,1,'C');
    $pdf->Cell(100);
    $pdf->Image('./img/qr.png', 159, 106 , 20);
    $pdf->Output("./booking/tickets.pdf", "F");
 
    // Recipient 
    $to = $email; 
     
    // Sender 
    $from = 'movielab2k21@gmail.com'; 
    $fromName = 'MovieLab'; 
     
    // Email subject 
    $subject = 'Tickets';  
     
    // Attachment file 
    $file = "./booking/tickets.pdf"; 
     
    // Email body content 
    $htmlContent = ' 
        <h2>Thank you for booking tickets from us.</h2> 
    '; 
     
    // Header for sender info 
    $headers = "From: $fromName"." <".$from.">"; 
     
    // Boundary  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
     
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
     
    // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
     
    // Preparing attachment 
    if(!empty($file) > 0){ 
        if(is_file($file)){ 
            $message .= "--{$mime_boundary}\n"; 
            $fp =    @fopen($file,"rb"); 
            $data =  @fread($fp,filesize($file)); 
     
            @fclose($fp); 
            $data = chunk_split(base64_encode($data)); 
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
            "Content-Description: ".basename($file)."\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
        } 
    } 
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 
     
    // Send email 
    $mail = @mail($to, $subject, $message, $headers, $returnpath);  
     
    // Email sending status 
    echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; 
}
}


function insertBooked($con, $costumer_username, $room, $date, $time, $tickets){
    $total_cost= $tickets*10;
    $query = $con->prepare("
    
    INSERT INTO booked (costumer_username, room, date, time, tickets, total_cost)

    VALUES(:costumer_username, :room, :date, :time, :tickets, :total_cost)
    
    ");

    $query->bindParam(":costumer_username", $costumer_username);
    $query->bindParam(":room", $room);
    $query->bindParam(":date", $date);
    $query->bindParam(":time", $time);
    $query->bindParam(":tickets", $tickets);
    $query->bindParam(":total_cost", $total_cost);

    return $query->execute();
}

function resetPassword($con, $hashed_password, $pwtoken, $email){
    $query = $con->prepare("
    SELECT * FROM users WHERE email=:email AND passreset=:pwtoken LIMIT 1
    ");

    $query->bindParam(":email", $email);
    $query->bindParam(":pwtoken", $pwtoken);

    $query->execute();
    if($query->rowCount() == 1){
        $query = $con->prepare("
    
        UPDATE users SET password=:hashed_password WHERE email=:email LIMIT 1
        
        ");

        $query->bindParam(":hashed_password", $hashed_password);
        $query->bindParam(":email", $email);
        $query->execute();

        if($query){
            $newpwtoken = md5(time());
            $query = $con->prepare("
    
            UPDATE users SET passreset=:newpwtoken WHERE email=:email LIMIT 1
            
            ");
            $query->bindParam(":newpwtoken", $newpwtoken);
            $query->bindParam(":email", $email);
            $query->execute();
        }
    }

}

function Emailpastoken($con, $email, $pwtoken){
    $query = $con->prepare("
    
    UPDATE users SET passreset=:pwtoken WHERE email=:email LIMIT 1
    
    ");

    $query->bindParam(":pwtoken", $pwtoken);
    $query->bindParam(":email", $email);
    $query->execute();
    
    if($query){
        $to = $email;
        $subject = "Password Reset";
        $message = '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <div class="Wrapper">
                <p>
                    Thank you for signing up on our website. Please click on the link below
                    to verify your email
                </p>
                <a href="http:/localhost/project/passwordresetv2.php?pwtoken=' . $pwtoken . '">Verify your email address</a>
            </div>
        </body>
        </html>';
        $headers = "From: movielab2k21@gmail.com";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($to,$subject,$message,$headers);
        $_SESSION['kwdikos']= $pwtoken;
        $_SESSION['toemail']= $email;
    }else{
        //echo "den etrekse to query gia na mpei to pwtoken sthn vash";
        array_push($errormsg, "Password token has not been updated to the database");
        $_SESSION['errormsg'] = $errormsg;
        header("Location: errors.php");
        exit();
    }

}


function insertAccount($con, $username, $email, $hashed_password, $vkey){
    $query = $con->prepare("
    
    INSERT INTO users (username, email, password, vkey)

    VALUES(:username, :email, :hashed_password, :vkey)
    
    ");

    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":hashed_password", $hashed_password);
    $query->bindParam(":vkey", $vkey);

    return $query->execute();
}


function checkLogin($con, $username, $hashed_password, $errormsg){
    $query = $con->prepare("
    
    SELECT * FROM users WHERE username=:username AND password=:hashed_password LIMIT 1
    
    ");

        $query->bindParam(":username", $username);
        $query->bindParam(":hashed_password", $hashed_password);

        $query->execute();
        if($query->rowCount() == 1){
            $query = $con->prepare("
            
            SELECT * FROM users WHERE username=:username LIMIT 1
            
            ");

            $query->bindParam(":username", $username);
            $query->execute();
            $temp = $query->fetch();
            
            if($temp['verified'] == 1){
                $_SESSION['id'] = $temp['id'];
                $_SESSION['email'] = $temp['email'];
                $_SESSION['username'] = $temp['username'];
                $_SESSION['accounttype'] = $temp['account_type'];
                return true;
            }else{
                array_push($errormsg, "Please verify your account. Check your email");
                $_SESSION['errormsg'] = $errormsg;
                header("Location: errors.php");
                exit();
                //mporei an mpei selida diaforetiki me katallhlo mhnyma
            }
            return false;
                
            
        }
}

//if(!empty($errormsg)){
//    $_SESSION['errormsg'] = $errormsg;
//    header("Location: errors.php");
//    exit();
//}
?>