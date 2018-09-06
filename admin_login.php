
<?php
session_start();
var_dump($_SESSION);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Admin login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    <link href="css/admin.css" rel="stylesheet">
</head>
<body class="login-body">


<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> Administrator <small>Teglasa</small></h1>
            </div>
        </div>
    </div>
</header>

<div class="login-window">

        <form name="login" method="post" action="php-assets/admin_login_check.php" >
            <input type="text" name="username" placeholder="Unesite korisnicko ime" class="text-box" ><br>
            <input type="password" name="password" placeholder="Unesite lozinku" class="text-box" ><br>
            <input type="submit" name="submit" class="btn btn-danger login-button" value="Posalji" ><br>
            <input type="reset" name="reset" class="btn btn-secondary login-button" value="Otkazi">
            <span> <?php


                ?> </span>
        </form>

</div>





</body>
</html>

