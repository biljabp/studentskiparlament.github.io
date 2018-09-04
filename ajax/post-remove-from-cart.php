<?php
include ('../php-assets/user_session.php');
$product_id=mysqli_real_escape_string($connection, $_POST['product_id']);
foreach (array_keys($_SESSION['cart'], $product_id) as $key) {
    unset($_SESSION['cart'][$key]);
}
?>