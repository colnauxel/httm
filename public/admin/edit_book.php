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
// lấy các chủ đề
$sql_get_cate="SELECT * FROM categorys";
$query_get_cate=mysqli_query($conn,$sql_get_cate);
$category=mysqli_fetch_all($query_get_cate,MYSQLI_ASSOC);

$idBook=$_GET['idBook'];
$sql="SELECT * FROM books WHERE idBook=$idBook";

$query=mysqli_query($conn,$sql);
$book=mysqli_fetch_assoc($query);
if(isset($_POST['change'])){
    $nameBook=$_POST['nameBook'];
    $titleBook=$_POST['titleBook'];
    $descriptionBook=$_POST['descriptionBook'];
    $priceBook=$_POST['priceBook'];
    $idCategory=$_POST['idCategory'];

   
    $target="../upload/".$_FILES['image']['name'];

    $image=$_FILES['image']['name'];
    if($image==''){
        $image=$category['imageCategory'];
    }
    // echo "$nameBook,  $titleBook, $descriptionBook,$priceBook,$image,$idCategory,";
    if(empty($nameBook)){
        array_push($errors,'Tên Sách không được để trống');
    }
    if(empty($titleBook)){
        array_push($errors,'Tiêu Đề không được để trống');
    }
    if(empty($descriptionBook)){
        array_push($errors,'Mô tả không được để trống');
    }
    if(empty($priceBook)){
        array_push($errors,'Giá không được để trống');
    }
    if(empty($idCategory)){
        array_push($errors,'Chủ đề không được để trống');
    }
    if(empty($image)){
        array_push($errors,'Ảnh không được để trống');
    }
    if(count($errors)==0){
        
        $sql="UPDATE books SET nameBook='$nameBook',imageBook='$image',titleBook='$titleBook',descriptionBook='$descriptionBook',
        priceBook=$priceBook,idCategory=$idCategory
        WHERE idBook=$idBook";
        $query=mysqli_query($conn,$sql);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            
        }
        if($query){
            array_push($msg,'Cập nhật thành công');
        }else{
           
            array_push($errors,'Cập nhật Không thành công');
        }

       

    }

    
}



?>

<div class="container mg-top">
<h3>Chỉnh sửa Sách</h3>
<?php include('../layout/message.php')?>
    <form class="form" action="" method="post" enctype="multipart/form-data" >
       
        <div class="form-group">
            <label >Tên Sách:</label>
            <input type="text" name="nameBook" value="<?php echo $book['nameBook'];?>" class="form-control"  >
        </div>
        <div class="form-group">
            <label >Ảnh:</label>
            <img src="http://localhost/bansach_php/public/upload/<?php echo $book['imageBook'];?>" width="150px" height="150px" alt="">
            <input type="file" name="image" id="" value="http://localhost/bansach_php/public/upload/<?php echo $book['imageBook'];?>" >
        </div>
        <div class="form-group">
            <label >Tiêu Đề:</label>
            <input type="text" name="titleBook" value="<?php echo $book['titleBook'];?>" class="form-control"  >
        </div>
        <div class="form-group">
            <label >Mô tả:</label>
            
            <textarea id="editor" name="descriptionBook" value="<?php echo $book['descriptionBook'];?>" class="form-control"></textarea>

        </div>
        <div class="form-group">
            <label >Giá:</label>
            <input type="number" name="priceBook" value="<?php echo $book['priceBook'];?>"  class="form-control" >
        </div>
        <div class="form-group">
            <label for="sel1">Chọn chủ đề:</label>
            <select class="form-control" name="idCategory" id="sel1">
            <?php foreach($category as $cate): ?>
                <?php if($cate['idCategory']==$book['idCategory']):?>
                    <option value="<?php echo $cate['idCategory'];?>" selected ><?php echo $cate['nameCategory'];?></option>
                <?php else:?>
                    <option value="<?php echo $cate['idCategory'];?>"  ><?php echo $cate['nameCategory'];?></option>
                <?php endif; ?>
            <?php endforeach;?>
            </select>
        </div>
       <button type="submit" name="change" class="btn btn-primary">Thay đổi</button>
    </form>
  

</div>



<script>

<?php
require('../layout/bottom.php');

?>