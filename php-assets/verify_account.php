<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 04/09/2018
 * Time: 05:00
 */
include ('user_session.php');
$code=$_GET['code'];

$SQL="UPDATE kupac SET code=1 WHERE code='$code' ";
$SQL2="SELECT idkupac from kupac where code='$code'";
$result=mysqli_query($connection, $SQL2);
while ($c=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $_SESSION['user']=$c['idkupac'];
}

if (mysqli_query($connection, $SQL)) {
    echo "Uspesno ste verifikovali nalog";
    header('Location:../porudzbina.php');
} else {
    echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
}