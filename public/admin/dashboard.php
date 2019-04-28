<?php
session_start();


if($_SESSION['nameUser']==''){
    header('location:login_ad.php');
}

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
                header('location:index.php');
            }
        }


    }
   
}

?>

    <div class="container mg-top">
      <div class="row">
     
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

         
       
      </div>
    </div>




<?php
require('../layout/bottom.php');
?>