<?php
require '../../config/db.php';
$data=$_POST['data'];
$i=1;


$sql="SELECT * FROM orderbooks
INNER JOIN customer
ON orderbooks.idCustomer=customer.idCustomer
WHERE nameCustomer LIKE '%$data%' ";

    $query=mysqli_query($conn,$sql);
    
    $orders=mysqli_fetch_all($query,MYSQLI_ASSOC);
    
    $num=mysqli_num_rows($query);



 foreach($orders as $order ){

?>
 
 <tr>
                    <td><?php echo $i++;?></td>
                
                    <td><?php echo $order['nameCustomer'];?></td>
                   
                    <td><?php echo $order['total'];?></td>
                    <td><a class="btn btn-primary" href="http://localhost/bansach_php/public/admin/orderdetail.php?idOrder=<?php echo $order['idOrder'];?>">Chi Tiết</a></td>
                    <td><?php echo $order['time_order'];?></td>
                    <td><?php echo $order['day_order'];?></td>

                    
                    
                </tr>
<?php
    }
?>


