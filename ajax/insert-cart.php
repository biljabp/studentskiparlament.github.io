<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 05/09/2018
 * Time: 22:06
 */
include('../php-assets/user_session.php');
if (isset ($_POST['user_id'])){
    $idkupac=$_POST['user_id'];
    $order_number=md5(time());
    $SQL="INSERT INTO porudzbina (status, broj_posiljke, datum_porudzbine, ukupan_iznos, kupac_idkupac) VALUES (1, '$order_number', now(), 0, $idkupac)";
    if (mysqli_query($connection, $SQL)) {
        echo "Porudzina kreirana ali ne i stavke";
        $_SESSION['order_number']=$order_number;
    }
    else {
        echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
    }
}
