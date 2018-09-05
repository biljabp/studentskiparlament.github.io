<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 06/09/2018
 * Time: 00:21
 */

include('../php-assets/user_session.php');


if(isset($_POST['id_porudzbine'])){
    $id=$_POST['id_porudzbine'];
    $SQL="UPDATE porudzbina SET status=1 WHERE idporudzbina=$id";

    if (mysqli_query($connection, $SQL)) {
        echo "Uspesno ponovljena posiljka";
    } else {
        echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
    }

}