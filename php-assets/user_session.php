<?php
include('db_config.php');
session_start();
if(isset($_SESSION['user'])){
    $user_check = $_SESSION['user'];
    $ses_sql = mysqli_query($connection,"select * from user where username = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    if ($row['username']!==$user_check){
        header("location:login.php");
    }
} else {
    $_SESSION['guest']=session_regenerate_id();
}
if (!$_SESSION['cart'])
{
    $_SESSION['cart']=array();
}
?>