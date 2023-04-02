<?php
include "header.php";
include "class/product_class.php";

 ?>
<?php
$product = new product();
if (!isset($_GET['sanpham_ma'])|| $_GET['sanpham_ma']==NULL){
    echo "Game kko tồn tại";
	 }
else {$sanpham_ma = $_GET['sanpham_ma'];
    }
    $delete_product = $product  -> delete_product($sanpham_ma);
    header('Location:productlist.php');
?>