<?php
session_start();
if($_SESSION['nameCustomer'] ==''){
    header('location:http://localhost/bansach_php/public/login.php');
}
require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';
require '../config/config.php';
$idCustomer=$_SESSION['idCustomer'];
// get list books
$sql_data_customer="SELECT * FROM customer WHERE idCustomer=$idCustomer";
$query=mysqli_query($conn,$sql_data_customer);
$customer=mysqli_fetch_assoc($query);

?>

<div class="container">
<h2>Thông tin khách hàng<?php echo $customer['nameCustomer'];?></h2>
<hr>
    <p>Thông tin khách hàng<?php echo $customer['nameCustomer'];?></p>
    <p>Thông tin khách hàng<?php echo $customer['emailCustomer'];?></p>
    <p>Thông tin khách hàng<?php echo $customer['phoneCustomer'];?></p>
</div>

<?php require './jquery/cart_controller.php';?>
<?php require './layout/bottom.php';?>
