<?php
include('user_session.php');
$name=mysqli_real_escape_string($connection,$_POST['name']);
$phone=mysqli_real_escape_string($connection,$_POST['phone']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$confirm=mysqli_real_escape_string($connection,$_POST['password_confirm']);
$email=mysqli_real_escape_string($connection,$_POST['email']);
$postal_code=mysqli_real_escape_string($connection,$_POST['postal_code']);
$city=mysqli_real_escape_string($connection,$_POST['city']);
$address=mysqli_real_escape_string($connection,$_POST['address']);
if ($password==$confirm){
    $password=md5($password);
}

$code=md5(time());

$SQL="INSERT INTO kupac ( ime, email, password, ulica_broj, mesto, post_broj,  code) 
VALUES ('$name', '$email', '$password', '$address', '$city', '$postal_code', '$code')";

if (mysqli_query($connection, $SQL)) {

    header ('Location: ../index.php#potrvdinalog');
    echo "New record created successfully";
} else {
    echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
}
$subject = 'Verifikacioni kod | Teglas salate';

$headers = "From: support@teglas.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";


$message = <<< PORUKA
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

a {
text-decoration: none;
color: white;
}

#all {
background-color: #226647;
padding: 15px;
}

#container {
margin-bottom: 15px;
}

.link {
margin-top: 15px;
margin-bottom: 15px;
background-color: #3d97f7;
padding: 10px;
color: white;
}

.bottom {
    color: #686868;
    font-size: 10px;
}

.big {
font-size: 40px;
font-weight: 900;
}
</style>
</head>
<body>
    <div id="all">
        <div id="container">
            <span class="big">
                Poštovani,<br>
            </span>
            Hvala Vam na registraciji.
            <br>
            <br>
            <a href="http://localhost/studentskiparlament.github.io/php-assets/verify_account.php?code=$code"><div class="link">Kliknite ovde da verifikujete email adresu</div></a>
            <div class="bottom">Ukoliko ne možete da kliknete na link gore, molimo vas da ručno odete na sledeći link: <a href="http://localhost/studentskiparlament.github.io/php-assets/verify_account.php?code=$code">http://localhost/php-assets/verify_account.php?code=$code</a> <br>Ovo je automatizovani email. Molimo da ne odgovarate na njega<br>Ukoliko ne znate odagle je došao, molimo Vas, ignorišite ga</span>
        </div>
    </div>
</body>
</html> 
PORUKA;

mail($email, $subject, $message, $headers);




?>