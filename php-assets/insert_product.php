<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 06/09/2018
 * Time: 03:14
 */

include ('admin_session.php');
$name=mysqli_real_escape_string($connection, $_POST['name']);
$opis=mysqli_real_escape_string($connection, $_POST['$opis']);
$categoryId=mysqli_real_escape_string($connection, $_POST['select']);
$masa=mysqli_real_escape_string($connection, $_POST['masa']);
$cena=mysqli_real_escape_string($connection, $_POST['cena']);
$SQL="";
if ($categoryId==1)
{
    $SQL="INSERT INTO proizvod (idproizvod, naziv_proizvoda, opis, stanje, cena, tezina, postan, image, kategorija_idkategorija) VALUES (NULL, '$name', '$opis', 'da', '$cena', '$masa', NULL, 'images/obrok/cream_beam.jpeg', '$categoryId')";
} else if ($categoryId==2){
    $SQL="INSERT INTO proizvod (idproizvod, naziv_proizvoda, opis, stanje, cena, tezina, postan, image, kategorija_idkategorija) VALUES (NULL, '$name', '$opis', 'da', '$cena', '$masa', NULL, 'images/dezert/monaliza_posno.jpeg', '$categoryId')";

} else {
    $SQL = "INSERT INTO proizvod (idproizvod, naziv_proizvoda, opis, stanje, cena, tezina, postan, image, kategorija_idkategorija) VALUES (NULL, '$name', '$opis', 'da', '$cena', '$masa', NULL, 'images/energetske/banana_bomb.jpg', '$categoryId')";
}
if (mysqli_query($connection, $SQL)) {
    echo "Produkt unesen";
    header('Location: admin_panel.php?uneseno');
}
else {
    echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
}
