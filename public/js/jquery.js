//comfirm delete
$('.delete_category').click(function(){
    return confirm("bạn có muốn xóa chủ đề");
 });
 $('.detele_book').click(function(){
     return confirm("Bạn có muốn xóa cuốn sách này");
  });

// seach category
$('#search_category').keyup(function(){
    var keyPost=$('#search_category').val();
    // alert($('#postSearch').val());
    $.post('../jquery/ajax_category.php',{data:keyPost},function(data){
        $('#show_category').html(data);
    })
});
// seach category
$('#search_book').keyup(function(){
    var keyPost=$('#search_book').val();
    // alert($('#postSearch').val());
    $.post('../jquery/ajax_book.php',{data:keyPost},function(data){
        $('#show_book').html(data);
    })
});
// seach book
$('#search_order').keyup(function(){
    var keyPost=$('#search_order').val();
    // alert($('#postSearch').val());
    $.post('../jquery/ajax_order.php',{data:keyPost},function(data){
        $('#show_order').html(data);
    })
});