<?php
session_start();
require '../../config/db.php';
if($_SESSION['nameUser']==''){
    header('location:login_ad.php');
}


if(empty($_GET['idCategory'])==false){
    $idCategory=$_GET['idCategory'];
    $sql_book="SELECT * FROM books WHERE idCategory=$idCategory";
    $query_book=mysqli_query($conn,$sql_book);
    $book=mysqli_fetch_all($query_book,MYSQLI_ASSOC);
    foreach ($book as $b) {
        $idBook=$b['idBook'];
  
        $sql_delete_order="DELETE FROM orderdetail WHERE idBook=$idBook";
        $query_order=mysqli_query($conn,$sql_delete_order);
        $sql_delete_book="DELETE FROM books WHERE idBook=$idBook";
        $query_book=mysqli_query($conn,$sql_delete_book);
       
    }

    $sql_delete_cate="DELETE FROM categorys WHERE idCategory=$idCategory";
    $query=mysqli_query($conn,$sql_delete_cate);
    if($query){
        header('location:http://localhost/bansach_php/public/admin/category.php');
    }
}
if(empty($_GET['idBook'])==false){
    $idBook=$_GET['idBook'];
  
    $sql_delete_order="DELETE FROM orderdetail WHERE idBook=$idBook";
    $query_order=mysqli_query($conn,$sql_delete_order);
    $sql_delete_book="DELETE FROM books WHERE idBook=$idBook";
    $query_book=mysqli_query($conn,$sql_delete_book);
    if($query_book){
        header('location:http://localhost/bansach_php/public/admin/books.php');
    }
}
?>
