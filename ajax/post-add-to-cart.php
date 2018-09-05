<?php
include ('../php-assets/user_session.php');
$product_id=mysqli_real_escape_string($connection, $_POST['product_id']);
array_push($_SESSION['cart'], $product_id);
$counted_arrays=array_count_values($_SESSION['cart']);
echo $counted_arrays[$product_id];

?>