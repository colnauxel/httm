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
$idCategory=$_GET['idCategory'];
$sql="SELECT * FROM categorys WHERE idCategory=$idCategory ";

$query=mysqli_query($conn,$sql);
$category=mysqli_fetch_assoc($query);
if(isset($_POST['change'])){
    $nameCategory=$_POST['nameCategory'];
    $descriptionCategory=$_POST['descriptionCategory'];
    if(empty($nameCategory)){
        array_push($errors,"Tên chủ đề không được bỏ trống");
    }
    if(empty($descriptionCategory)){
        array_push($errors,"Mô tả không được bỏ trống");
    }
    if(count($errors)==0){
        $sql_upload="UPDATE categorys SET nameCategory='$nameCategory',descriptionCategory='$descriptionCategory'
        WHERE idCategory=$idCategory";
        $query_up=mysqli_query($conn,$sql_upload);
        if($query_up){
            array_push($msg,"Lưu chủ đề thành công");
        }else{
            array_push($errors,"Lưu chủ đề thất bại");
        }
        }

    
}



?>

<div class="container mg-top">
<h3>Chỉnh sửa Chủ Đề</h3>
<?php include('../layout/message.php')?>
    <form class="form" action="" method="post" enctype="multipart/form-data" >
       
        <div class="form-group">
            <label >Tên Chủ đề:</label>
            <input type="text" name="nameCategory" value="<?php echo $category['nameCategory']?>" class="form-control"  >
        </div>
        <div class="form-group">
            <label >Mô tả:</label>
            <input type="text" name="descriptionCategory" value="<?php echo $category['descriptionCategory']?>"  class="form-control" >
        </div>
       
       <button type="submit" name="change" class="btn btn-primary">Thay đổi</button>
    </form>
  

</div>




<?php
require('../layout/bottom.php');
?>