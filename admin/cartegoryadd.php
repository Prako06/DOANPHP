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