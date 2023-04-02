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
if (isset($_GET['sanpham_ma'])|| $_GET['sanpham_ma']!=NULL){
    $sanpham_ma = $_GET['sanpham_ma'];
    }
    $get_sanpham = $product -> get_sanpham($sanpham_ma);
    if($get_sanpham){$resul = $get_sanpham ->fetch_assoc();}
  
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$update_product = $product ->update_product($_POST,$_FILES,$sanpham_ma );
}
?>

<div class="admin-content-right">
            <div class="product-add-content">
                <?php
                if(isset($insert_product)){echo $insert_product; }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['sanpham_tieude'] ?>" required type="text" name="sanpham_tieude"> <br>
                    <label  for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['sanpham_ma'] ?>" required type="text" name="sanpham_ma"> <br>
            
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="cartegory_id" id="cartegory_id">
                        <option value="">--Chọn--</option>
                        <?php
                        $show_cartegory = $product ->show_cartegory();
                        if($show_cartegory){while($result=$show_cartegory->fetch_assoc()){
                        ?>
                        <option <?php if($resul['cartegory_id']== $result['cartegory_id']) {echo "selected";} ?> value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    
                    
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input value="<?php echo $resul['sanpham_gia'] ?>" required type="text" name="sanpham_gia"> <br>  
                    <label for="">Cấu hình<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_cauhinh" cols="60" rows="5"><?php echo $resul['sanpham_cauhinh'] ?></textarea><br>  
                    
                    <label for="">Ảnh<span style="color: red;">*</span></label> <br>
                    <img style="width: 100px; height: 100px" src="uploads/<?php echo $resul['sanpham_anh'] ?>"> <br> 
                    <input  type="file" name="sanpham_anh"> <br>   
               
                    <button class="admin-btn" name="submit" type="submit">Gửi</button>  
                </form>
            </div>           
        </div>
    </section>
    <section>
    </section>
    <script src="js/scripts.js"></script>
</body>
</html>  