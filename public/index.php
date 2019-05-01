<?php
session_start();

require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';
require '../config/config.php';
// get list books
$sql_getboooks="SELECT * FROM books ORDER BY idBook DESC LIMIT 4";
$query_getBooks=mysqli_query($conn,$sql_getboooks);
$books=mysqli_fetch_all($query_getBooks,MYSQLI_ASSOC);
//danh sach mua nhieu
$sql_getboooks_hot="SELECT *,COUNT(amount) AS amount FROM orderdetail 
INNER JOIN books
ON orderdetail.idBook=books.idBook
GROUP BY nameBook
ORDER BY amount DESC
LIMIT 4";
$query_getBooks_hot=mysqli_query($conn,$sql_getboooks_hot);
$books_hot=mysqli_fetch_all($query_getBooks_hot,MYSQLI_ASSOC);

?>

<?php require './layout/banner.php';?>

<!-- list0 books -->
<div class="container">
<h2>Các Sách Mới nhất</h2>
<hr>
<?php foreach($books as $book ): ?>
    <div class="col-sm-4 col-md-3">
      <div class="item-product">
      
      <p><img src="upload/<?php echo $book['imageBook'];?>" style="width:170px;height:170px;    margin-top: 10px;"></p>
      <h5>Tên Sách: <strong><?php echo $book['nameBook'];?></strong> </h5>
      <input type="hidden" name="hidden_name" id="name<?php echo $book['idBook'];?>" value="<?php echo $book['nameBook']; ?>" />
      <input type="hidden" name="hidden_image" id="image<?php echo $book['idBook'];?>" value="<?php echo $book['imageBook']; ?>" />
      <input type="hidden" name="hidden_title" id="title<?php echo $book['idBook'];?>" value="<?php echo $book['titleBook']; ?>" />
      <input type="hidden" name="hidden_description" id="description<?php echo $book['idBook'];?>" value="<?php echo $book['descriptionBook']; ?>" />
      <input type="hidden" name="hidden_price" id="price<?php echo $book['idBook'];?>" value="<?php echo $book['priceBook']; ?>" />
      <input type="hidden" name="hidden_idCategory" id="idCategory<?php echo $book['idBook'];?>" value="<?php echo $book['idCategory']; ?>" />
      
      <a href=""  name="add_to_cart" id="<?php echo $book['idBook'];?>" class="btn btn-primary add_to_cart">Mua</a>
      <a href="http://localhost/bansach_php/public/bookDetail.php?idBook=<?php echo $book['idBook'];?>" name="add_to_cart" id="<?php echo $book['idBook'];?>" class="btn btn-danger">Chi tiết</a>
      </div>
    </div>
   
<?php endforeach; ?>
</div>
<div class="container">
<h2>Các Sách bán Chạy</h2>
<hr>
<?php foreach($books_hot as $book ): ?>
    <div class="col-sm-4 col-md-3">
      <div class="item-product">
      
      <p><img src="upload/<?php echo $book['imageBook'];?>" style="width:170px;height:170px;margin-top: 10px;"></p>
      <h5>Tên Sách: <strong><?php echo $book['nameBook'];?></strong> </h5>
      <input type="hidden" name="hidden_name" id="name<?php echo $book['idBook'];?>" value="<?php echo $book['nameBook']; ?>" />
      <input type="hidden" name="hidden_image" id="image<?php echo $book['idBook'];?>" value="<?php echo $book['imageBook']; ?>" />
      <input type="hidden" name="hidden_title" id="title<?php echo $book['idBook'];?>" value="<?php echo $book['titleBook']; ?>" />
      <input type="hidden" name="hidden_description" id="description<?php echo $book['idBook'];?>" value="<?php echo $book['descriptionBook']; ?>" />
      <input type="hidden" name="hidden_price" id="price<?php echo $book['idBook'];?>" value="<?php echo $book['priceBook']; ?>" />
      <input type="hidden" name="hidden_idCategory" id="idCategory<?php echo $book['idBook'];?>" value="<?php echo $book['idCategory']; ?>" />
      
      <a href="" name="add_to_cart" id="<?php echo $book['idBook'];?>" class="btn btn-primary add_to_cart">Mua</a>
      <a href="http://localhost/bansach_php/public/bookDetail.php?idBook=<?php echo $book['idBook'];?>" name="add_to_cart" id="<?php echo $book['idBook'];?>" class="btn btn-danger">Chi tiết</a>
      </div>
    </div>
   
<?php endforeach; ?>
</div>

<?php require './jquery/cart_controller.php';?>
<?php require './layout/bottom.php';?>
