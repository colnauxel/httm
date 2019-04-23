<?php
require './layout/header.php';
require './layout/menu.php';
require '../config/db.php';

// get list books
$sql_getboooks="SELECT * FROM books";
$query_getBooks=mysqli_query($conn,$sql_getboooks);
$books=mysqli_fetch_all($query_getBooks,MYSQLI_ASSOC);

?>

<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Navbar example</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <button class="btn btn-lg btn-primary" id="test" href="" role="button">View navbar docs »</button>
        </p>
      </div>

    </div>
<!-- list0 books -->
<h2>Tất cả các sách</h2>
<?php foreach($books as $book ): ?>
    <div class="col-sm-4 col-md-3">
    <p><img src="upload/<?php echo $book['imageBook'];?>" style="width:200px;height:200px"></p>
    <h5>Tên Sách: <strong><?php echo $book['nameBook'];?></strong> </h5>
    <input type="hidden" name="hidden_name" id="name<?php echo $book['idBook'];?>" value="<?php echo $book['nameBook']; ?>" />
    <input type="hidden" name="hidden_image" id="image<?php echo $book['idBook'];?>" value="<?php echo $book['imageBook']; ?>" />
    <input type="hidden" name="hidden_title" id="title<?php echo $book['idBook'];?>" value="<?php echo $book['titleBook']; ?>" />
    <input type="hidden" name="hidden_description" id="description<?php echo $book['idBook'];?>" value="<?php echo $book['descriptionBook']; ?>" />
    <input type="hidden" name="hidden_price" id="price<?php echo $book['idBook'];?>" value="<?php echo $book['priceBook']; ?>" />
    <input type="hidden" name="hidden_idCategory" id="idCategory<?php echo $book['idBook'];?>" value="<?php echo $book['idCategory']; ?>" />
    
    <a href="" name="add_to_cart" id="<?php echo $book['idBook'];?>" class="btn btn-primary add_to_cart">Mua</a>
    </div>
   
<?php endforeach; ?>

<?php require './jquery/cart_controller.php';?>
<?php require './layout/bottom.php';?>
