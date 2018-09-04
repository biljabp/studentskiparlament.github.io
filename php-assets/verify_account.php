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

if (mysqli_query($connection, $SQL)) {
    header('../porudzbina.php?registracija=uspesna');
} else {
    echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
}