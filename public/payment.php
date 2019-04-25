<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$total_price = 0;
$idOrder=NULL;

// Data sendmail
require './layout/data_order.php';
//Insert order and sendmail
if(isset($_POST['submit'])){
    $email_address=$_POST['addressEmail'];
    //insert order book
    $time=date(" H:i:s");
    $day=date("d-m-Y");
    $sql_order="INSERT INTO orderbooks VALUES ('',1,$total_price,'$time','$day')";
    $query_order=mysqli_query($conn,$sql_order);
    if($query_order){
        $idOrder= mysqli_insert_id($conn);
        $id=NULL;
        if(!empty($_SESSION["shopping_cart"])){
            foreach($_SESSION["shopping_cart"] as $keys => $values){
                $idBook=$values["idBook"];
                $amount=$values["product_quantity"];
                $sql="INSERT INTO orderdetail(idOrder,idBook,amount) VALUES ($idOrder,$idBook,$amount)";
                $query_detail=mysqli_query($conn,$sql);
            }
        
       
        }else{
            echo 'error';
        }
        // sendmail
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);

// try {
    //Server settings
    // $mail->SMTPDebug = 1;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'lexuanloc1202@gmail.com';                     // SMTP username
    $mail->Password   = 'xuanloc120297';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('lexuanloc1202@gmail.com', 'xuanloc');
    $mail->addAddress($email_address);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // $body='<p> Da gui thanh cong</p>';
    // Content
    $mail->isHTML(true);
    $mail->CharSet = 'utf-8';                                 // Set email format to HTML
    $mail->Subject = 'Xác nhận hóa đơn đã mua';
    $mail->Body    = $output;
    $mail->AltBody = strip_tags($output);

    if($mail->send()){
        echo 'Message has been sent';
    }else
    echo 'Send message faild';
    
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
    }else{
        echo 'order error';
    }
 

}
?>

<!-- table cart product -->
<div class="container">
<div class="row">
    <!-- show cart product -->
    <div class="table-responsive col-md-6 mg-top" id="order_table">
    <h2>Danh Sách sản phẩm</h2>
    <table class="table table-bordered table-striped">
    <thead>
        <tr>  
                    <th>Tên Sách</th> 
                    <th>Ảnh</th>
                    <th>Số lượng</th>  
                    <th >Giá</th>  
                    <th>tổng</th>  
                    <th>Xóa</th>  
        </tr>
    </thead>
    <tbody>
        
        <?php
        if(!empty($_SESSION["shopping_cart"])){

         foreach($_SESSION["shopping_cart"] as $keys => $values):?>
            <tr>
            <td><?php echo $values['nameBook'];?></td>
            <td><img src="upload/<?php echo $values['imageBook'];?>" style="width:50px;"></td>
            <td ><?php echo $values['product_quantity'];?></td>
            <td align="right"> <?php echo $values['priceBook'];?> VND</td>
            <td align="right"><?php echo number_format($values['product_quantity'] * $values['priceBook'], 2);?>VND</td>
            <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values['idBook'];?>">Remove</button></td>
            </tr>
       
            
        <?php  endforeach; ?>
        <tr>  
        <td colspan="3" align="right">Tổng cộng</td>  
        <td align="right"> <?php echo number_format($total_price, 2);?>VND</td>  
        <td colspan="2"></td>
        <?php }else{?>
            <tr>
            <td colspan="5" align="center">
            Giỏ hàng trống!
            </td>
            </tr>
        <?php }?>
    </tr>
    </tbody>
        

    </table>
    </div>
    <!-- From email comfir -->
    <form role="form" action="" method="POST" class="col-md-6 mg-top">
    <h2>Thông tin xác nhận email</h2>
        <div class="form-group">
            <label >Email address</label>
            <input type="email" name="addressEmail" id="email" class="form-control" placeholder="Enter email">
        </div>
        <!-- <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div> -->

        <button type="submit" name="submit" class="btn btn-default">Xác Nhận</button>
    </form>
</div>
</div>

<?php require './jquery/cart_controller.php';
// echo $_SESSION['shopping_cart'];
?>

<?php require './layout/bottom.php';?>