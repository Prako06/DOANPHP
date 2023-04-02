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

$cartegory_id = $_GET['cartegory_id'];

if (!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == null) {
    $cartegory_id = $result['cartegory_id'];

} 
$get_cartegory = $cartegory->get_cartegory($cartegory_id);


if ($get_cartegory) {
    $result = $get_cartegory->fetch_assoc();
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartegory_name = $_POST['cartegory_name'];
    $update_cartegory = $cartegory->update_cartegory($cartegory_name, $cartegory_id);

}
?>


<div class="admin-content-right">
    <div class="product-add-content">

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Vui lòng danh mục<span style="color: red;">*</span></label> <br>
            <input type="text" name="cartegory_name" value="<?php echo $result['cartegory_name'] ?>">
            <button class="admin-btn" type="submit">Sửa</button>
        </form>
    </div>
</div>
</section>

</body>

</html>