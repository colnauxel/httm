<?php
session_start();

$_SESSION['nameUser']='';
// $_COOKIE['nameUser']='';

// $_SESSION['type']='';
require '../layout/header.php';
require '../layout/menu_ad.php';
require '../../config/db.php';
$nameUser='';
$passwordUser='';
$msg=array();
$errors=array();

// SET COOKIE
// if(isset($_COOKIE['username'])){
//     $user=$_COOKIE['username'];
// }else{
//     $user="";
   
// }
if(isset($_POST['login'])){
    $nameUser=$_POST['nameUser'];
    $passwordUser=$_POST['passwordUser'];
 
    
    if(empty($nameUser)){
        array_push($errors,'Tài khoản không được để trống');
    }
    if(empty($passwordUser)){
        array_push($errors,'Mật khẩu không được để trống');
    }
    if(count($errors)==0){
        $passwordUser=md5($passwordUser);
        $sql="SELECT * FROM users WHERE nameUser='$nameUser'AND passwordUser='$passwordUser'";
        $query=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query)==0){
            array_push($errors,'Tài khoản hoặc mật khẩu không chính xác');
        }else{
            if(empty($_POST['remember'])){
                setcookie("nameUser","");
                
              
            }else{
                setcookie("nameUser",$nameUser,time()+3600);

            }
            session_start();
            
            $_SESSION['nameUser']=$user['nameUser'];
            // $_SESSION['avatarCustomer']=$user['avatarCustomer'];
            // $_SESSION['emailCustomer']=$user['emailCustomer'];
            if($_SESSION['nameUser']){
                header('location:dashboard.php');
            }
        }


    }
   
}

?>

<div class="container " id="form-login">
    <h3>Đăng nhập quản trị</h3>
    <form class="form-horizontal mg-top" action="" method="post">
        <?php require('../layout/message.php')?>
        <div class="form-group">
            <label >Tài Khoản:</label>
            <input type="text" name="nameUser"  value="" class="form-control" placeholder="Tài khoản" >
        </div>
        <div class="form-group">
            <label >Mật Khẩu:</label>
            <input type="password" name="passwordUser"   class="form-control" placeholder="Mật khẩu">
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
</div>





<?php
require('../layout/bottom.php');
?>