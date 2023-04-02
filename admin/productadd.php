<?php

include "header.php";
include "slider.php";
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$insert_product = $product ->insert_product($_POST,$_FILES);


}

?>
<div class="admin-content-right">
    <div class="product-add-content">
        <?php
        if (isset($insert_product)) {
            echo $insert_product;
        }
        ?>
        <form action="productadd.php" method="POST" enctype="multipart/form-data">
            <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
            <input required type="text" name="sanpham_tieude"> <br>
            <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
            <input required type="text" name="sanpham_ma"> <br>
    
            <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
            <select required="required" name="cartegory_id" id="cartegory_id">
                <option value="">--Chọn--</option>
                <?php
                $show_danhmuc = $product->show_cartegory();
                if ($show_danhmuc) {
                    while ($result = $show_danhmuc->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
                 
            <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
            <input required type="text" name="sanpham_gia"> <br>
            <label for="">Cấu hình<span style="color: red;">*</span></label> <br>
            <textarea class="ckeditor" required name="sanpham_cauhinh" cols="60" rows="5"></textarea><br>
            <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
            <input required type="file" multiple name="sanpham_anh"> <br>
            <button class="admin-btn" name="submit" type="submit">Gửi</button>
        </form>
    </div>
</div>