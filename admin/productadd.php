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
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    // var_dump($_POST);
	$insert_product = $product ->insert_product($_POST,$_FILES);
    //header('Location:brandlist.php');

}

?>