<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 06/09/2018
 * Time: 00:47
 */
include ('user_session.php');
$email=mysqli_escape_string($connection, $_POST['email']);
$password=md5(mysqli_escape_string($connection, $_POST['password']));

$SQL="SELECT * from kupac WHERE email='$email'and password='$password' and code='1'";
echo $email."<br>".$password;

$result=mysqli_query($connection, $SQL);
$user=mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($result){


    if (empty($_SESSION['cart'])){
        header('Location: ../salate.php');
    } else {
        echo "Uspesno ste verifikovali nalog";
        header('Location:../porudzbina.php');
    }
    $_SESSION['user']=$user['idkupac'];

}
else {
    header('Location: ../salate.php');
}