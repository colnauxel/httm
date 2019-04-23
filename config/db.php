<?php
$local='localhost';
$username='root';
$password='';
$name_database='bansach';
//Create Connection 
$conn=mysqli_connect($local,$username,$password,$name_database);

// check Connection 
if(mysqli_connect_errno()){
    //Connect failed
    echo 'Connect mysql faild'.mysqli_connect_errno();
}
