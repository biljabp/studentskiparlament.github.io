<?php
session_start();
include ('db_config.php');
if (isset($_POST['submit'])) {


    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Unesite login parametre";
        header('Location: ../admin_login.php');
    }
    else {

        $username=$_POST['username'];
        $password=$_POST['password'];
        //sql injection preventiva
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        // query
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 1) // ako je uslov zadovoljen
        {
            $_SESSION['admin']=$username;
            mysqli_free_result($result);
            mysqli_close($connection);
            header('Location: ../admin_panel.php');
        } else {
            $error="Neispravni login podaci";
            header('Location: ../admin_login.php');
        }

    }
}


?>