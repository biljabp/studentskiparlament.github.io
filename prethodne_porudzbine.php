<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 04/09/2018
 * Time: 05:38
 */
include ('php-assets/user_session.php');
if(isset($_GET['registracija']) && $_GET['registracija']=='uspesna'){

}

$categories_sql="SELECT * from kategorija";
$categories_result=mysqli_query($connection, $categories_sql);

$userid=$_SESSION['user'];
$userSQL="SELECT * from kupac WHERE idkupac=$userid";
$userResult=mysqli_query($connection, $userSQL);
$user=mysqli_fetch_array($userResult, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="css/salate.css" rel="stylesheet">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dezert salate u tegli. Ukusne poslastice zdrave i hranljive.">
    <meta name="keywords" content="Dezert salate, Slatke salate, Salate sa nutelom, salate sa eurokremom,
                                    salata, eurokrem, dezert, slatko, cokolada, chokocake, honey cake, homeroche, monaliza, nugat,
                                    jabuka cake"/>
    <meta name="author" content="BPP team">
    <title>Salad in a jar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<nav class="navbar navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">YUMMY SALADS</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proizvodi <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <?php
                        while ($c=mysqli_fetch_array($categories_result, MYSQLI_ASSOC)) {
                            ?>
                            <li><a href="salate.php?category_id=<?php echo $c['idkategorija']; ?>"><?php echo $c['naziv_kategorije']; ?></a></li>
                            <li role="separator" class="divider"></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="user_profile.php">Moj Profil</a></li>
                <li class="right"><a href="php-assets/logout.php">Odjavi se</a> </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

</nav>


<div class="container">
    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
        <div class="img-responsive">
            <img src="https://www.brandeps.com/icon-download/U/User-01.svg">
        </div>
        <div>
            <h3>Korisnicki podaci</h3>
        </div>
        <table class="table table-responsive">
            <tr><td><?php echo $user['ime'] ?> </td></tr>
            <tr><td><?php echo $user['email'] ?> <td></tr>
            <tr><td><?php echo $user['ulica_broj'] ?> <td></tr>
            <tr><td><?php echo $user['mesto'] ?> <td></tr>
            <tr><td><?php echo $user['post_broj'] ?> <td></tr>


        </table>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-6 col-xs-12">
        <div class="page-header">
            <h1>Porudžbine </h1>

            <?php
            $SQLporudzbine="SELECT * from porudzbina WHERE kupac_idkupac=$userid";
            $resultPorudzbine=mysqli_query($connection, $SQLporudzbine);
            while ($row=mysqli_fetch_array($resultPorudzbine,MYSQLI_ASSOC)) {
                $status = "";
                if ($row['status'] == 3) {
                    echo "
                    <div class=\"panel panel-danger\">
                    <div class=\"panel-heading\">Nedavne porudžbine</div>
                    <div class=\"panel-body\">
                        <table class='table'>
                            <tr><th>Broj porudzbine</th><td>" . $row['broj_posiljke'] . "</td></tr>
                            <tr><th>Iznos posiljke</th><td>" . $row['ukupan_iznos'] . "</td></tr>
                            <tr><th>Vreme porucivanja</th><td>" . $row['datum_porudzbine'] . "</td></tr>
                        </table>
                        <button class='btn btn-danger right ponoviPorudzbinu' data-id='".$row['idporudzbina']."'>Ponovi porudžbinu</button>
                    </div>
                </div>
                ";
                    }
                }
                ?>

        </div>
    </div>
</div>
<script>
    $('.ponoviPorudzbinu').click(function () {
        var id=$(this).data('id');
        $.post('ajax/repeat-order.php', {
            'id_porudzbine':id
        }, function (data) {
            location.reload();

        })

    })
</script>
</body>

</html>