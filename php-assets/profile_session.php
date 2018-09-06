<?php
include('db_config.php');
session_start();

if(isset($_SESSION['user'])){
    $user_check = $_SESSION['user'];
    $ses_sql = mysqli_query($connection,"select idkupac from kupac where idkupac = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    if ($row['idkupac']!==$user_check){
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>