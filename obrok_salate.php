<!DOCTYPE html>
<?php
    include('php-assets/db_config.php')
?>
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

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vegetarijanske salate kakve do sada niste probali! Najukusnije i najatraktivnije vegetarijanske salate na trzistu. Pogledajte nasu ponudu!">
    <meta name="keywords" content="salate u tegli, vegetarijanske salate, cezar salata, zelena salata, kupus salata, brokoli salate"/>
    <meta name="author" content="BPP team">
    <title>Salad in a jar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
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
    <?php
    $salads_sql="SELECT * FROM proizvod where kategorija_idkategorija=1";
    $desert_salads_results=mysqli_query($connection, $salads_sql);
    if (mysqli_num_rows($desert_salads_results)>0){

    }
    ?>

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
                        <li><a href="obrok_salate.php">Obrok salate</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="energetske_salate.php">Energy salate</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="dezert_salate.php">Dessert salate</a></li>
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
</nav>

<div class="page-header" align="center">
    <div class="icons" align="right">
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

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<ul class="list-group">
    <li class="list-group-item list-group-item-success">OBROK SALATE</li>
</ul>

<div class="row">

    <?php
    while ($item=mysqli_fetch_array($desert_salads_results, MYSQLI_ASSOC))
    {
        echo "
<div class=\"col-sm-6 col-md-4 col-lg-3\">
        <div class=\"thumbnail thumbnail-height\">
            <img src=\"".$item['image']."\" alt=\"picture\">
            <div class=\"caption\">
                <h4>".$item['naziv_proizvoda']."</h4>
                <p>".$item['opis']."</p>
            </div>
        <table class='table text-center'>
            <tr><th>Masa</th><th>Cena</th></tr>
            <tr><td>".$item['tezina']."g"."</td><td>".$item['cena']."din."."</td></tr>
            <tr><td colspan='2'><button class='btn col-lg-12 col-md-12 col-xs-12 col-sm-12'>Dodaj u korpu</button> </td></tr>
        </table>
        </div>
    </div>";
    }

    ?>


</div>


<section class="our_client">
    <h4 class="title"><span class="text">Baneri</span></h4>
    <div class="row">
        <div class="span2">
            <a href="http://salate.me/"><img alt="salate" src="images/vector.jpg" ></a>
        </div>
        <div class="span2">
            <a href="http://ipg.veselinromic.com/"><img alt="prodaja guma" src="images/vector.jpg" style="width: 100px;"></a>
        </div>
        <div class="span2">
            <a href="http://organska-ishrana.me/"><img alt="organska ishrana" src="images/vector.jpg" style="width: 100px;"></a>
        </div>
        <div class="span2">
            <a href="http://devlakoznejakne.byethost7.com/?i=1"><img alt="kozne jakne" src="images/vector.jpg" style="width: 100px;"></a>
        </div>
        <div class="span2">
            <a href="http://cugni.me/"><img alt="cugni me" src="images/vector.jpg" style="width: 100px;"></a>
        </div>
        <div class="span2">
            <a href="#"><img alt="placeholder, 50 eura" src="images/vector.jpg" style="width: 100px;"></a>
        </div>
    </div>
</section>

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

            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
