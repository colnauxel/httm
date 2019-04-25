<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
    

        require 'vendor/autoload.php';
        // require_once "PHPMailer/PHPMailer.php";
        // require_once "PHPMailer/SMTP.php";
        // require_once "PHPMailer/Exception.php";
        
        $email= new PHPMailer(true);

        // SMTP Settings
        $mail->SMTPDebug = 1;                                       // Enable verbose debug output

        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'lexuanloc1202@gmail.com';                     // SMTP username
        $mail->Password   = 'xuanloc120297';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;      
        // Email setting
        $mail->setFrom('lexuanloc1202@gmail.com', 'xuanloc');
        $mail->addAddress('xuanloc120297@gmail.com');     // Add a recipient

        $body='<p> Da gui thanh cong</p>';
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);
        if($mail->send()){
            // $response= "Email is sent!";
            echo 'ok';
        }else{
            // $response="Something is wrong!!".$mail->ErrorInfo;
            echo $mail->ErrorInfo;
        }
        // exit(json_encode(array("response"=>$reponse)));
    }


?>