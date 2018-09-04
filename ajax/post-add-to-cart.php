<?php
include ('../php-assets/user_session.php');
$product_id=mysqli_real_escape_string($connection, $_POST['product_id']);
array_push($_SESSION['cart'], $product_id);
var_dump($_SESSION['cart']);
?>