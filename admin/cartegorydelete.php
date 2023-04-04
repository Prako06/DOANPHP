<?php
include "header.php";
include "class/cartegory_class.php";

 ?>
<?php
$cartegory = new cartegory();
if (!isset($_GET['cartegory_id'])|| $_GET['cartegory_id']==NULL){
    echo "danh muc ko ton tai";
	 }
else {$cartegory_id = $_GET['cartegory_id'];
    }
    $delete_cartegory = $cartegory  -> delete_cartegory($cartegory_id);
    header('Location:cartegorylist.php');
?>