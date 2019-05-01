<?php
require '../../config/db.php';
$data=$_POST['data'];
$i=1;
// if($data !=''){
    
    // echo $data;
    $sql="SELECT * FROM categorys WHERE nameCategory LIKE '%$data%'   ";
// }elseif($data ==''){
//     $sql="SELECT * FROM users WHERE type='member'";
// }
    $query=mysqli_query($conn,$sql);
    
    $cate=mysqli_fetch_all($query,MYSQLI_ASSOC);
    
    $num=mysqli_num_rows($query);



 foreach($cate as $c ){

?>
<tr>
                    <td><?php echo $i++;?></td>
                
                    <td><?php echo $c['nameCategory'];?></td>
                    
                    <td><?php echo $c['descriptionCategory'];?></td>
                
                    <td><a href="http://localhost/bansach_php/public/admin/edit_category.php/?idCategory=<?php echo $c['idCategory'];?>" class="btn btn-primary" >Sửa</a></td>
                    <td>   <a href="http://localhost/bansach_php/public/admin/delete.php/?idCategory=<?php echo $c['idCategory'];?>"  class="btn btn-danger delete_category" >Xoa</a>
                    </td>
                    
                </tr>

<?php
    }
?>


