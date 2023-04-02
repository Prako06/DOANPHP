<?php

include "header.php";
include "class/product_class.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_ad.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>


<?php
$product = new product();
$fm = new Format();



?>
        <div class="admin-content-right">
            <div class="table-content">
                <table>
                    <tr>
                        <th>Stt</th>

                        <th>Tiêu đề</th>
                        <th>Mã</th>
                        <th>Danh mục</th>
  
                        <th>Giá</th> 
                        <th>Cau hình</th> 
 
                        <th>Ảnh</th>   
               
                        <th>Tùy chỉnh</th>
                    </tr>
                  <?php
                  $show_product = $product ->show_product();
                  if($show_product){$i=0; while($result = $show_product ->fetch_assoc()){$i++;

                 
                  ?>
                    <tr>
                        <td> <?php echo $i ?></td>

                        <td> <?php echo $fm -> textShorten($result['sanpham_tieude'],$limit = 30) ;?></td>
                        <td> <?php echo $result['sanpham_ma'] ?></td>
                        <td> <?php echo $result['cartegory_name']  ?></td>
                        <td> <?php echo $result['sanpham_gia']  ?></td>
                        <td> <?php echo $fm -> textShorten($result['sanpham_cauhinh'],$limit = 30) ; ?></td>
                
                        <td> <img style="width: 100px; height: 50px" src="uploads/<?php echo $result['sanpham_anh'] ?>" alt=""></td>                
                        <td><a href="productedit.php?sanpham_ma=<?php echo $result['sanpham_ma'] ?>">Sửa</a>|
                        <a href="productdelete.php?sanpham_ma=<?php echo $result['sanpham_ma'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                     }}
                  ?>
                </table>
               </div>        
        </div>
    </section>
    <section>
    </section>
    <script src="js/scripts.js"></script>
</body>
</html>  