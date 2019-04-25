<?php
$output = '
<h1>Hóa đơn xác nhận mua hàng</h1>
<div class="table-responsive" id="order_table">
<table class="table table-bordered table-striped">
<tr>  
        <th>Tên Sách</th> 
        <th>Ảnh</th>
        <th>Số lượng</th>  
        <th >Giá</th>  
        <th>tổng</th>  
       
    </tr>
';
if(!empty($_SESSION["shopping_cart"])){
foreach($_SESSION["shopping_cart"] as $keys => $values){
    $total_price = $total_price + ($values["product_quantity"] * $values["priceBook"]);
    $output .= '
    <tr>
     <td>'.$values["nameBook"].'</td>
        <td></td>
     <td>'.$values["product_quantity"].'</td>
     <td align="right"> '.$values["priceBook"].'VND</td>
     <td align="right">'.number_format($values["product_quantity"] * $values["priceBook"], 2).'VND</td>
    
    </tr>
    ';
    // $total_price = $total_price + ($values["product_quantity"] * $values["priceBook"]);
    // $total_item = $total_item + 1;
   }
   $output .= '
   <tr>  
          <td colspan="3" align="right">Tổng cộng</td>  
          <td align="right"> '.number_format($total_price, 2).'VND</td>  
          <td></td>  
      </tr>
   ';
   $output .= '</table></div>';



}

?>