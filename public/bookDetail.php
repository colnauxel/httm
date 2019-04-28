<?php
session_start();

require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';
require '../config/config.php';
// get book detail
$idBook=$_GET['idBook'];
$sql_getboook="SELECT * FROM books WHERE idBook=$idBook";
$query_getBook=mysqli_query($conn,$sql_getboook);
$book=mysqli_fetch_assoc($query_getBook);

?>



<!-- list0 books -->
<div class="container mg-top">
<h2>Chi Tiết về sản phẩm    </h2>

    <div class="col-md-6">
      <div class="item-product">
      
      <p><img src="upload/<?php echo $book['imageBook'];?>" style="width:350px;height:350px"></p>
      </div>
    </div>
    <!--  -->
    <div class="col-md-6 " id="detail-book">
    <h3>Tên Sách: <strong><?php echo $book['nameBook'];?></strong> </h3>
    <h4>Tiêu Đề:<?php echo $book['titleBook'];?></h4>
    <p>Mô tả:<?php echo $book['descriptionBook'];?></p>
      <input type="hidden" name="hidden_name" id="name<?php echo $book['idBook'];?>" value="<?php echo $book['nameBook']; ?>" />
      <input type="hidden" name="hidden_image" id="image<?php echo $book['idBook'];?>" value="<?php echo $book['imageBook']; ?>" />
      <input type="hidden" name="hidden_title" id="title<?php echo $book['idBook'];?>" value="<?php echo $book['titleBook']; ?>" />
      <input type="hidden" name="hidden_description" id="description<?php echo $book['idBook'];?>" value="<?php echo $book['descriptionBook']; ?>" />
      <input type="hidden" name="hidden_price" id="price<?php echo $book['idBook'];?>" value="<?php echo $book['priceBook']; ?>" />
      <input type="hidden" name="hidden_idCategory" id="idCategory<?php echo $book['idBook'];?>" value="<?php echo $book['idCategory']; ?>" />
      
      Số lượng:<input type="number" value="1" name="quantity" min="1" max="5">
      <a href="" name="add_to_cart" id="<?php echo $book['idBook'];?>" class="btn btn-primary add_to_cart">Mua</a>
      </div>
</div>

<?php require './jquery/cart_controller.php';?>
<?php require './layout/bottom.php';?>
