<?php
session_start();
if(empty($_SESSION['nameCustomer']) == false){
    session_destroy();
    header('location:http://localhost/bansach_php/public/login.php');
}
if(empty($_SESSION['nameUser']) == false){
    session_destroy();
    header('location:http://localhost/bansach_php/public/admin/login_ad.php');
}

?>