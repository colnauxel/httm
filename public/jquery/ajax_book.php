<?php
require '../../config/db.php';
$data=$_POST['data'];
$i=1;


    $sql="SELECT * FROM books
    INNER JOIN categorys
    ON books.idCategory=categorys.idCategory
     WHERE nameBook LIKE '%$data%'";

    $query=mysqli_query($conn,$sql);
    
    $books=mysqli_fetch_all($query,MYSQLI_ASSOC);
    
    $num=mysqli_num_rows($query);



 foreach($books as $book ){

?>
 <tr>
                        <td><?php echo $i++;?></td>

                        <td><?php echo $book['nameBook'];?></td>
                        <td>
                            <img src="../upload/<?php echo $book['imageBook']?>" width="60px" height="60px">
                        </td>
                        <td><?php echo $book['titleBook'];?></td>
                        <td><?php echo $book['descriptionBook'];?></td>
                        <td><?php echo $book['priceBook'];?></td>
                        <td><?php echo $book['nameCategory'];?></td>
                    

                        <td><a href="http://localhost/bansach_php/public/admin/edit_book.php/?idBook=<?php echo $book['idBook'];?>" class="btn btn-primary" >Sửa</a></td>
                        <td>   <a href="http://localhost/bansach_php/public/admin/delete.php/?idBook=<?php echo $book['idBook'];?>"  class="btn btn-danger delete_book" >Xoa</a>
                        </td>
                        
                    </tr>

<?php
    }
?>


