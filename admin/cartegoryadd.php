<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";
?>
<?php
$cartegory = new cartegoty;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cartegory_name = $_POST['cartegory_name'];
    $insert_cartegory = $cartegory -> insert_cartegory($cartegory_name);
}
?>

<div class="admin-content-right">
            <div class="product-add-content">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <input required name="cartegory_name" type="text" placeholder = "Nhap danh muc">
                    <button type= "submit">Thêm</button>
                </form>
            </div>    
        </div>
    </section>
    
</body>
</html>