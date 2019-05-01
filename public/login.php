<?php
session_start();
ob_start();
$_SESSION['nameCustomer']='';
// $_COOKIE['nameCustomer']='';

// $_SESSION['type']='';
require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';
$nameCustomer='';
$passwordCustomer='';
$msg=array();
$errors=array();

// SET COOKIE
// if(isset($_COOKIE['username'])){
//     $user=$_COOKIE['username'];
// }else{
//     $user="";
   
// }
if(isset($_POST['login'])){
    $nameCustomer=$_POST['nameCustomer'];
    $passwordCustomer=$_POST['passwordCustomer'];
 
    
    if(empty($nameCustomer)){
        array_push($errors,'Tài khoản không được để trống');
    }
    if(empty($passwordCustomer)){
        array_push($errors,'Mật khẩu không được để trống');
    }
    if(count($errors)==0){
        $passwordCustomer=md5($passwordCustomer);
        $sql="SELECT * FROM customer WHERE nameCustomer='$nameCustomer'AND passWordCustomer='$passwordCustomer'";
        $query=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query)==0){
            array_push($errors,'Tài khoản hoặc mật khẩu không chính xác');
        }else{
           
           
            $_SESSION['idCustomer']=$user['idCustomer'];
            $_SESSION['nameCustomer']=$user['nameCustomer'];
            $_SESSION['avatarCustomer']=$user['avatarCustomer'];
            $_SESSION['emailCustomer']=$user['emailCustomer'];
            if($_SESSION['nameCustomer'] !=''){
                header('location:index.php');
                
             
            }
        }


    }
   
}

?>

<div class="container mg-top" id="form-login">

    <h2>Đăng nhập</h2>
    <form class="form-horizontal" action="" method="post">
        <?php require('layout/message.php')?>
        <div class="form-group">
            <label >Tài Khoản:</label>
            <input type="text" name="nameCustomer"  value="" class="form-control" placeholder="Tài khoản" >
        </div>
        <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" name="passwordCustomer"   class="form-control" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="remember"> Nhớ tài khoản
                    </label>
                </div>
        </div>
       <button type="submit" name="login" class="btn btn-primary">Đăng Nhập</button>
      
    </form>
    <hr>
    <a href="http://localhost/bansach_php/public/admin/login_ad.php"  class="btn btn-danger">Đăng Nhập Quản trị</a>
</div>





<?php
require('layout/bottom.php');
?>