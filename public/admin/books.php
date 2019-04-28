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

$sql="SELECT * FROM books
INNER JOIN categorys
ON books.idCategory=categorys.idCategory
";

$query=mysqli_query($conn,$sql);
$books=mysqli_fetch_all($query,MYSQLI_ASSOC);
$i=1;


?>

<div class="container mg-top">
<h3>Danh Sách Tất cả Sách</h3>

        <div class="form-group">
            <!-- <label >Tìm kiếm</label>   -->
            <input type="text" id="listpost" class="form-control" placeholder="Tìm kiếm">
        </div>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Sách</th>
                    <th>Ảnh</th>
                    <th>Tiêu đề sách</th>
                    <th>Mô tả Sách</th>
                    <th>Giá sách</th>
                    <th>Chủ đề</th>
                    <th>Sửa</th>
                    <th>Xóa</th>

                </tr>
            </thead>
            <tbody class="list_post">
                <?php foreach($books as $book ): ?>

                    <tr>
                        <td><?php echo $i++;?></td>

                        <td><?php echo $book['nameBook'];?></td>
                        <td>
                            <img src="../upload/<?php echo $book['imageBook']?>" width="60px" height="60px">
                        </td>
                        <td><?php echo $book['titleBook'];?></td>
                        <td><?php echo $book['descriptionBook'];?></td>
                        <td><?php echo $book['priceBook'];?></td>
                        <td><?php echo $book['nameCategory'];?></td>
                    

                        <td><a href="http://localhost/php/public/admin/edit_book.php/?idBook=<?php echo $book['idBook'];?>" class="btn btn-primary" >Sửa</a></td>
                        <td>   <a href="http://localhost/php/public/admin/delete.php/?idBook=<?php echo $book['idBook'];?>"  class="btn btn-danger delete_post" >Xoa</a>
                        </td>
                        
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