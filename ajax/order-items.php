<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 05/09/2018
 * Time: 22:36
 */
include ('../php-assets/user_session.php');
if(isset($_POST['cena']) && isset($_POST['kolicina']) && isset($_POST['id']) && $_POST['kolicina']>0 && $_POST['cena']>0){
    $cena=mysqli_real_escape_string($connection,$_POST['cena']);
    $kolicina=mysqli_real_escape_string($connection,$_POST['kolicina']);
    $id=mysqli_real_escape_string($connection,$_POST['id']);
    $order_number=$_SESSION['order_number'];
    $SQL="SELECT idporudzbina from porudzbina WHERE broj_posiljke='$order_number'";
    $result=mysqli_query($connection, $SQL);
    $row=mysqli_fetch_array($result);
    $idporudzbina=$row['idporudzbina'];
    $SQL2="INSERT INTO detalji_porudzbine (kolicina, iznos_stavki, proizvod_idproizvod, porudzbina_idporudzbina) VALUES ( '$kolicina', '$cena', '$id', '$idporudzbina')";
    if (mysqli_query($connection, $SQL2)) {
        echo "Success";
    } else {
        echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
    }

}