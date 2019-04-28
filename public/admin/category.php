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

$sql="SELECT * FROM categorys ";

$query=mysqli_query($conn,$sql);
$categorys=mysqli_fetch_all($query,MYSQLI_ASSOC);

$i=1;


?>

<div class="container mg-top">
<h3>Danh Sách Tất cả Chủ Đề</h3>

        <div class="form-group">
            <!-- <label >Tìm kiếm</label>   -->
            <input type="text" id="listpost" class="form-control" placeholder="Tìm kiếm">
        </div>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Chủ Đề</th>
                    <th>Mô tả Chủ đề</th>
                    <th>Sửa</th>
                    <th>Xóa</th>

                </tr>
            </thead>
            <tbody class="list_post">
            <?php foreach($categorys as $cate ): ?>

                <tr>
                    <td><?php echo $i++;?></td>
                
                    <td><?php echo $cate['nameCategory'];?></td>
                    
                    <td><?php echo $cate['descriptionCategory'];?></td>
                
                    <td><a href="http://localhost/php/public/admin/edit_category.php/?idCategory=<?php echo $cate['idCategory'];?>" class="btn btn-primary" >Sửa</a></td>
                    <td>   <a href="http://localhost/php/public/admin/delete.php/?idCategory=<?php echo $cate['idCategory'];?>"  class="btn btn-danger delete_post" >Xoa</a>
                    </td>
                    
                </tr>
        <?php endforeach;?>
            </tbody>
            </table>    
</div>
</div>




<?php
require('../layout/bottom.php');
?>