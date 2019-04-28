<?php
session_start();

if($_SESSION['nameUser']==''){
    header('location:login_ad.php');
}
require '../layout/header.php';
require '../layout/menu_ad.php';
require '../../config/db.php';

$msg=array();
$errors=array();

$sql="SELECT * FROM orderbooks
INNER JOIN customer
ON orderbooks.idCustomer=customer.idCustomer ";

$query=mysqli_query($conn,$sql);
$orders=mysqli_fetch_all($query,MYSQLI_ASSOC);

$i=1;


?>

<div class="container mg-top">
<h3>Danh Sách Tất cả Đơn Hàng</h3>

        <div class="form-group">
            <!-- <label >Tìm kiếm</label>   -->
            <input type="text" id="listpost" class="form-control" placeholder="Tìm kiếm">
        </div>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Xem chi tiết</th>
                    <th>Giờ mua</th>
                    <th>Ngày Mua</th>

                </tr>
            </thead>
            <tbody class="list_post">
            <?php foreach($orders as $order ): ?>

                <tr>
                    <td><?php echo $i++;?></td>
                
                    <td><?php echo $order['nameCustomer'];?></td>
                   
                    <td><?php echo $order['total'];?></td>
                    <td><a class="btn btn-primary" href="http://localhost/bansach_php/public/admin/orderdetail.php?idOrder=<?php echo $order['idOrder'];?>">Chi Tiết</a></td>
                    <td><?php echo $order['time_order'];?></td>
                    <td><?php echo $order['day_order'];?></td>

                    
                    
                </tr>
        <?php endforeach;?>
            </tbody>
            </table>    
</div>
</div>
</div>



<?php
require('../layout/bottom.php');
?>