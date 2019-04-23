<?php

//action.php

session_start();
// Thêm sản phẩm
if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  if(isset($_SESSION["shopping_cart"]))
  {
   $is_available = 0;
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
    if($_SESSION["shopping_cart"][$keys]['idBook'] == $_POST["idBook"])
    {
     $is_available++;
     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
    }
   }
   if($is_available == 0)
   {
    $item_array = array(
     'idBook'               =>     $_POST["idBook"],  
     'nameBook'             =>     $_POST["nameBook"],  
     'imageBook'            =>     $_POST["imageBook"],  
     'titleBook'         =>    $_POST["titleBook"],
     'descriptionBook'             =>     $_POST["descriptionBook"],  
     'priceBook'            =>     $_POST["priceBook"],  
     'product_quantity'         =>    $_POST["product_quantity"],
     
    );
    $_SESSION["shopping_cart"][] = $item_array;
   }
  }
  else
  {
   $item_array = array(
    'idBook'               =>     $_POST["idBook"],  
     'nameBook'             =>     $_POST["nameBook"],  
     'imageBook'            =>     $_POST["imageBook"],  
     'titleBook'         =>    $_POST["titleBook"],
     'descriptionBook'             =>     $_POST["descriptionBook"],  
     'priceBook'            =>     $_POST["priceBook"],  
     'product_quantity'         =>     $_POST["product_quantity"]
   );
   $_SESSION["shopping_cart"][] = $item_array;
  }
 }
}
// xóa sản phẩm
if(isset($_POST["action"]))
{

 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values["idBook"] == $_POST["idBook"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }
}

?>
