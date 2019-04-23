
<?php
//fetch_cart.php
session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th>Tên Sách</th> 
            <th>Ảnh</th>
            <th>Số lượng</th>  
            <th >Giá</th>  
            <th>tổng</th>  
            <th>Xóa</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <tr>
   <td>'.$values["nameBook"].'</td>
   <td><img src="upload/'.$values["imageBook"].'" style="width:50px;"></td>
   <td>'.$values["product_quantity"].'</td>
   <td align="right"> '.$values["priceBook"].'VND</td>
   <td align="right">'.number_format($values["product_quantity"] * $values["priceBook"], 2).'VND</td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["idBook"].'">Remove</button></td>
  </tr>
  ';
  $total_price = $total_price + ($values["product_quantity"] * $values["priceBook"]);
  $total_item = $total_item + 1;
 }
 $output .= '
 <tr>  
        <td colspan="3" align="right">Tổng cộng</td>  
        <td align="right"> '.number_format($total_price, 2).'VND</td>  
        <td></td>  
    </tr>
 ';
}
else
{
 $output .= '
    <tr>
     <td colspan="5" align="center">
      Giỏ hàng trống!
     </td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
 'cart_details'  => $output,
 'total_price'  => number_format($total_price, 2).'VND',
 'total_item'  => $total_item
); 

echo json_encode($data);


?>