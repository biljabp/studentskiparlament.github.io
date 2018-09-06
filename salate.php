<?php
include('php-assets/user_session.php');
$category_id=1;
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}
else {
    header('localhost/salate.php?category_id=1');
}
$category_name=mysqli_query($connection, "SELECT naziv_kategorije from kategorija where idkategorija=$category_id");
    $categories_sql="SELECT * from kategorija";
    $categories_result=mysqli_query($connection, $categories_sql);

    $salads_sql="SELECT * FROM proizvod where kategorija_idkategorija=$category_id";
    $requested_salad=mysqli_query($connection, $salads_sql);
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109808964-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-109808964-1');
    </script>

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


    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '536966099993520');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=536966099993520&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

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
                <li><a href="o_nama.php">O nama</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
                <li><a href="ketering.php">Ketering</a></li>
                <li><p onmouseover="myNumber(this)" onmouseout="myNumberOut(this)">Naručite na: 069/1-528-560</p></li>
                <script>
                    function myNumber(x) {
                        x.style.color= "#46B778";
                    }

                    function myNumberOut(x) {
                        x.style.color= "white";
                    }
                </script>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    <div class="cart">
        <button type="button" class="btn btn-info btn-lg right" data-toggle="modal" data-target="#cartModal"><i class="fa fa-shopping-cart" aria-hidden="true"></i>


            Korpa <span class="iznos_korpe"></span></button>
    </div>
</nav>

<div class="page-header" align="center">
    <div class="icons" align="left">
        <p>Pratite nas na:</p>
        <a href="https://www.facebook.com/yummysaladssu/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/yummysaladssu"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/teglans/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>
    <div id="header">
        <a href="index.php" target="_parent"><img src="images/logo.jpg" style="cursor: pointer"></a>
        <p>Samo u Yummy Salads objektima. Ako nam vratite 10 praznih teglica nazad, dobijate od nas dve PUNE po Vašem izboru za SAMO 1 RSD.</p>
    </div>
</div>
<br/>

<ul class="list-group">
    <li class="list-group-item list-group-item-success">
        <?php
        while ($name=mysqli_fetch_array($category_name, MYSQLI_ASSOC)) {
            echo strtoupper($name['naziv_kategorije']);
        }
        ?>

    </li>
</ul>

<div class="row">

    <?php
    while ($item=mysqli_fetch_array($requested_salad, MYSQLI_ASSOC))
    {
        echo "
<div class=\"col-sm-6 col-md-4 col-lg-3\">
        <div class=\"thumbnail thumbnail-height\">
            <img src=\"".$item['image']."\" alt=\"picture\">
            <div class=\"caption\">
                <h3>".$item['naziv_proizvoda']."</h3>
                <p>".$item['opis']."</p>
            </div>
        <table class='table text-center'>
            <tr><th>Masa</th><th>Cena</th></tr>
            <tr><td>".$item['tezina']."g"."</td><td>".$item['cena']."din."."</td></tr>
            <tr><td colspan='2'><button  data-id='".$item['idproizvod']."' class='add_to_cart btn col-lg-12 col-md-12 col-xs-12 col-sm-12'>Dodaj u korpu</button> </td></tr>
        </table>
        </div>
    </div>";
    }

    ?>


</div>


<footer>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <ul class="adress">
                    <span>Adresa</span>
                    <li>
                        <p>Narodnog Fronta 30, Novi Sad</p>
                    </li>

                    <li>
                        <p>069/1-528-560</p>
                    </li>

                    <li>
                        <p>yummysalads@gmail.com</p>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-4">
                <ul class="contact">
                    <span>Kontakt</span>
                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li>
                        <a href="o_nama.php">O nama</a>
                    </li>

                    <li>
                        <a href="ketering.php">Ketering</a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <ul class="social">
                    <span>Pratite nas na:</span>
                    <li><a href="https://www.facebook.com/yummysaladssu/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/teglasns?lang=en"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/teglans/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<p align="center" style="color: white; background-color:#004020">Copyright © salate.me 2017<br/>Ovaj sajt je namenjen isključivo u ŠKOLSKE svrhe</p>
<div id="cartModal" class="modal fade" role="dialog">

</div>

<div id="checkoutModal" class="modal fade" role="dialog">
    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Prijava</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <form id="loginForm" method="POST" action="php-assets/login_check.php">
                                <div class="form-group">
                                    <label for="email" class="control-label">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email"  required="" title="Please enter your email" placeholder="example@gmail.com">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Lozinka</label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>
                                <div id="loginErrorMsg" class="alert alert-error hide">Pogrešni login podaci</div>

                                <button type="submit" class="btn btn-success btn-block">Prijavi se</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Registrij se sada <span class="text-success">BESPLATNO JE</span></p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success"></span> Pregled svih porudžbina</li>
                            <li><span class="fa fa-check text-success"></span> Brzo naručivanje</li>
                            <li><span class="fa fa-check text-success"></span> Omiljene porudžbine</li>
                        </ul>
                        <p><a href="register.php" class="btn btn-info btn-block">Registruj se!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script><!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
<script src="js/cart.js">

</script><!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
