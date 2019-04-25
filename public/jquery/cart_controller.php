<script>  

$(document).ready(function(){


// show sản phẩm trong giỏ hàng
load_cart_data();

  function load_cart_data()
  {
    $.ajax({
    url:"./jquery/fetch_cart.php",
    method:"POST",
    dataType:"json",
    success:function(data)
    {
      $('#cart_details').html(data.cart_details);
      $('.total_price').text(data.total_price);
      $('.badge').text(data.total_item);
    }
    });
  }
// hiện giở hàng
$('#cart-popover').popover({
  html:true,
  container:'body',
  content:function(){
    return $('#popover_content_wrapper').html()
  }
});
  // thêm sản phẩm vào giở hàng
  $(document).on('click', '.add_to_cart', function(){
    var idBook = $(this).attr("id");
    var nameBook = $('#name'+idBook+'').val();
    var imageBook = $('#image'+idBook+'').val();
 
    var priceBook = $('#price'+idBook+'').val();
    // var product_quantity = $('#quantity'+idBook).val();
    var product_quantity=1;
    var action = "add";
    if(product_quantity > 0)
    {
    $.ajax({
      url:"./jquery/action_cart.php",
      method:"POST",
      data:{idBook:idBook, nameBook:nameBook,imageBook:imageBook , priceBook:priceBook, product_quantity:product_quantity, action:action},
      success:function(data)
      {
      load_cart_data();
      alert("Item has been Added into Cart");
      }
    });
    }
    else
    {
    alert("lease Enter Number of Quantity");
    }
  });
  // Xóa sản phẩm trong giỏ hàng
  $(document).on('click', '.delete', function(){
  var idBook = $(this).attr("id");
  var action = 'remove';
  if(confirm("Are you sure you want to remove this product?"))
  {
   $.ajax({
    url:"./jquery/action_cart.php",
    method:"POST",
    data:{idBook:idBook, action:action},
    success:function()
    {
     load_cart_data();
     $('#cart-popover').popover('hide');
     alert("Item has been removed from Cart");
    }
   })
  }
  else
  {
   return false;
  }
 });
  //Xóa toàn bộ giỏ hàng
    $(document).on('click', '#clear_cart', function(){
    var action = 'empty';
      $.ajax({
      url:"./jquery/action_cart.php",
      method:"POST",
      data:{action:action},
      success:function()
      {
        load_cart_data();
        $('#cart-popover').popover('hide');
        alert("Your Cart has been clear");
      }
      });
  });  
  // Gửi email xác nhận
    $(document).on('click', '#sendmail', function(){
      var email=$('#email');
      $.ajax({
      url:"./jquery/sendmail.php",
      method:"POST",
      datatype:'json',
      data:{
        email:email.val()
      },
      success:function()
      {
       
        alert("Đã gửi gmail xác nhận");
      }
      });
  });  
});
</script>