<?php
session_start();

require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';
$errors=array();
$msg=array();
$nameCustomer='';
if(isset($_POST['resgister'])){
    $nameCustomer=($_POST['nameCustomer']);
    $passwordCustomer=($_POST['passwordCustomer']);
    $passwordCustomer_comfirm=($_POST['passwordCustomer_confirm']);
    
    $emailCustomer=($_POST['emailCustomer']);
    $addressCustomer=($_POST['addressCustomer']);
    $phoneCustomer=($_POST['phoneCustomer']);
    $target="upload/".basename($_FILES['image']['name']);

    $image=$_FILES['image']['name'];//name image
    $sizeimage=$_FILES['image']['size'];// size image
    $typeimage=$_FILES['image']['type'];//type image
    if(empty($nameCustomer)){
        array_push($errors,"Tài khoản không được bỏ trống");
    }
    if(empty($passwordCustomer)){
        array_push($errors,"Mật khẩu không được bỏ trống");
    }
    if($passwordCustomer!=$passwordCustomer_comfirm){
        array_push($errors,"Mật khẩu không trùng khớp");
    }
   
    if(empty($emailCustomer)){
        array_push($errors,"emailCustomer không được bỏ trống");
    }
    if(empty($addressCustomer)){
        array_push($errors,"Địa Chỉ không được bỏ trống");
    }
    if(empty($phoneCustomer)){
        array_push($errors,"Điện thoại không được bỏ trống");
    }
    if(empty($image)){
        array_push($errors,"Avatar không được bỏ trống");
    }
    
    if(count($errors)==0){
        $sql1="SELECT *FROM customer WHERE nameCustomer='$nameCustomer'";
        $query1=mysqli_query($conn,$sql1);
     
        if(mysqli_num_rows($query1)==1){
            array_push($errors,"Tai khoan da toi tai");
           
        }else{
           
            $passwordCustomer=md5($passwordCustomer);
            $sql2="INSERT INTO customer(nameCustomer,avatarCustomer,emailCustomer,passWordCustomer,addressCustomer,phoneCustomer) VALUES ('$nameCustomer','$image','$emailCustomer','$passwordCustomer','$addressCustomer','$phoneCustomer')";
            $query2=mysqli_query($conn,$sql2);
         
            move_uploaded_file($_FILES['image']['tmp_name'],$target);

            
            if($query2){
                array_push($msg,"Đăng kí thanh công");
            }else{
                array_push($msg,"Đăng kí thất bại");
            }
            // header('location:login.php');
        }
    }
}
?>

<div class="container" id="form-login">
    <!-- display validation -->
    <?php include('layout/message.php')?>
    <form class="form mg-top" action="" method="post" enctype="multipart/form-data">
       
        <div class="form-group">
            <label >Tài Khoản:</label>
            <input type="text" name="nameCustomer"  class="form-control" placeholder="Tài khoản"  >
        </div>
        <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" name="passwordCustomer" class="form-control" placeholder="Mật khẩu" >
        </div>
        <div class="form-group">
            <label >Nhập lại mật khẩu:</label>
            <input type="password" name="passwordCustomer_confirm"  class="form-control" placeholder="Xác nhận mật khẩu" >
        </div>
        <!-- <div class="form-group">
            <label >Họ và Tên:</label>
            <input type="text" name="fullname" class="form-control" placeholder="Họ và Tên" >
        </div> -->
        <div class="form-group">
            <label >Email:</label>
            <input type="email" name="emailCustomer"  class="form-control" placeholder="Email" >
        </div>
        <div class="form-group">
            <label >Địa Chỉ:</label>
            <input type="text" name="addressCustomer"   class="form-control" placeholder="Địa chỉ" >
        </div>
        <div class="form-group">
            <label >Điện thoại:</label>
            <input type="text" name="phoneCustomer"   class="form-control" placeholder="Địa chỉ" >
        </div>
        <div class="form-group">
            <label >Hình đại diện:</label>
            <input type="file" name="image" class="form-control-file" >
        </div>
        <div class="form-group">
        <p>Bạn đã có tài khoản?<a href="login.php">Đăng nhập</a></p>
        </div>
       <button type="submit" name="resgister" class="btn btn-primary">Đăng kí</button>
    </form>
</div>





<?php
require('layout/bottom.php');
?>