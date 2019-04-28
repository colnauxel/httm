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

$idOrder=$_GET['idOrder'];

$sql="SELECT * FROM orderdetail
INNER JOIN books
ON orderdetail.idBook=books.idBook
WHERE idOrder=$idOrder ";

$query=mysqli_query($conn,$sql);
$orderDetail=mysqli_fetch_all($query,MYSQLI_ASSOC);

$i=1;


?>

<div class="container mg-top">
<h3>Chi tiết đơn hàng</h3>

        <div class="form-group">
            <!-- <label >Tìm kiếm</label>  
            <input type="text" id="listpost" class="form-control" placeholder="Tìm kiếm"> -->
        </div>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Sách</th>
                    <th>Số lượng</th>
                    

                </tr>
            </thead>
            <tbody class="list_post">
            <?php foreach($orderDetail as $detail ): ?>

                <tr>
                    <td><?php echo $i++;?></td>
                
                    <td><?php echo $detail['nameBook'];?></td>
                   
                    <td><?php echo $detail['amount'];?></td>

                   

                    
                    
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