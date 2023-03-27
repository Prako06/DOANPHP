<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";


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
$cartegory = new cartegory;
$show_cartegory = $cartegory -> show_cartegory()
?>


<div class="admin-content-right">
            <div class="table-content">
            <h1>Danh sách danh mục</h1>
                    <table>
                        <tr>
                            <th>Stt</th>
                            <th>ID</th>
                            <th>Danh mục</th>
                            <th>Tuỳ biến</th>

                        </tr>
                        <?php
                    if($show_cartegory){$i=0; while($result= $show_cartegory->fetch_assoc()){
                        $i++
                   
                    ?>
                        <tr> 
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['cartegory_id'] ?></td>
                        <td> <?php echo $result['cartegory_name']  ?></td>
                        <td><a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Sửa</a>|<a href="cartegorydelete.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Xóa</a></td>
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