<?php
include ('../php-assets/user_session.php');
$product_id=mysqli_real_escape_string($connection, $_POST['product_id']);
    $pos = array_search($product_id, $_SESSION['cart']);
    if (isset($pos)){
        $counted_arrays=array_count_values($_SESSION['cart']);
        if (($counted_arrays[$product_id])) {
            unset($_SESSION['cart'][$pos]);
            echo (--$counted_arrays[$product_id]);
        } else {echo "0";}
    }
    else {
        echo "0";
    }

    ?>
