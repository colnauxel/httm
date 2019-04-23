<?php
require '../config/config.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$message='';

if(isset($_POST['submit'])){
 
    $email_send=$_POST['email'];
    $message=$_POST['message'];
    echo $email_send;
    
// Load Composer's autoloader
require '../vendor/autoload.php';

//     // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// try {
    //Server settings
    $mail->SMTPDebug = 1;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = EMAIL;                     // SMTP username
    $mail->Password   =PASS;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

//     //Recipients
    $mail->setFrom('lexuanloc1202@gmail.com', 'xuanloc');
    $mail->addAddress($email_send);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $body=$message;
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hoa don mua hang';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);
    // $mail->send();
    if($mail->send()){
         echo 'Message has been sent';
      
       
    }
    header('location:http://localhost/bansach_php/public/index.php');
    $message='Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h3>Send Email Orders </h3>
    <?php echo $message;?>
    <form action="#" method="POST">
            <div class="form-group">
                <label >Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Message:</label>
                <!-- <input type="textarea" class="form-control" placeholder="Password"> -->
                <textarea class="form-control" name="message" >

                </textarea>
            </div>
        
        
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
</body>
</html>