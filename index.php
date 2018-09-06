<?php
include('php-assets/user_session.php');
$categories_sql="SELECT * from kategorija";
$categories_result=mysqli_query($connection, $categories_sql);


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
<link href="css/stylesheet.css" rel="stylesheet">

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salate u tegli! Nove atraktivne poslastice koje ce utoliti vasu glad i omoguciti vam da budete aktivni ceo dan!">
    <meta name="keywords" content="salate u tegli, salate, tegla, teglas, energetske salate, dezert salate, posne salate"/>
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
                <?php
                    if (isset($_SESSION['user'])){
                    ?>
                <li><a href="user_profile.php.php">Moj Profil</a></li>
                <li class="right"><a href="php-assets/logout.php">Odjavi se</a> </li>
                        <?php
                    }
                    else {
                        ?>
                        <li><a data-toggle="modal" data-target="#checkoutModal"">Prijava</a></li>


                    <?php
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

</nav>

<div class="page-header" align="center">
    <div class="icons" align="left">
        <p>Pratite nas na:</p>
        <a href="https://www.facebook.com/yummysaladssu/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/teglasns?lang=en"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/teglans/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>
    <div id="header">
        <a href="index.php" target="_parent"><img src="images/logo.jpg" style="cursor: pointer"></a>
        <p>Samo u Yummy Salads objektima. Ako nam vratite 10 praznih teglica nazad, dobijate od nas dve PUNE po Vašem izboru za SAMO 1 RSD.</p>
    </div>
</div>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" align="center">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="images/saradnja.jpg" alt="picture">
            <div class="carousel-caption">
            </div>
        </div>

    </div>
</div>
<br/>

<div class="background">
    <br/>
<div class="panel panel-success">
    <div class="panel-heading"><h3>Sviđaju Vam se naši proizvodi i želite ih u svom objektu? </h3></div>
    <div class="panel-body">
        <p>Da li imate ugostiteljski objekat kojem je potreban neki inovitet? Potreban Vam je neki novi proizvod ili osveženje? Ako je jedan od odgovora "Da", onda ste na pravom mestu!
            Mi smo kompanija koja uvek ima u planu i cilju da se proširi, pa s toga nudimo opcije saradnje sa svim ugostiteljskim objektima. Obogatite svoj jelovnik, učinite ga zanimljivim i ukusnijim sa našim originalnim i zdravim proizvodima.
            <br/>U ponudi Vam nudimo tri proizvoda:</p>
        <ul>
        <li>Obrok salate u tegli</li>
        <li>Energetske obroke u tegli</li>
        <li>Kolače u tegli</li>
        </ul>
    </div>
</div>

<div class="container form">
    <div class="col-md-5">
        <div class="form-area">
            <form role="form">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Kontaktirajte nas pomoću:</h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ime i prezime" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Broj mobilnog telefona" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Tekst poruke" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="5"></textarea>
                    <span class="help-block"><p id="characterLeft" class="help-block ">Prešli ste limit</p></span>
                </div>

                <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Pošaljite</button>
            </form>
        </div>
    </div>
</div>
    <br/>
</div>


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div class="picture" align="center">
    <p>Članovi našeg tima:</p>
    <a href="http://www.organska-ishrana.me"><img src="images/sponzori.png" alt="picture" class="banner img-responsive"/></a>
    <a href="http://stanniel.github.io"><img src="images/sponzori2.png" alt="picture" class="banner img-responsive"/></a>

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
                    <li><a href="https://www.facebook.com/teglasns/?ref=br_rs"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/yummysaladssu"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/teglans/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<p align="center" style="color: white; background-color:#004020">Copyright © salate.me 2017<br/>Ovaj sajt je namenjen isključivo u ŠKOLSKE svrhe</p>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script><!-- Include all compiled plugins (below), or include individual files as needed -->


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

<div id="potrvdinalog" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Uspešno</h4>
            </div>
            <div class="modal-body">

                <h1>Uspešna registracija. Molimo Vas da potvrdite email!</h1>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(function(){
        if(window.location.hash) {
            var hash = window.location.hash;
            console.log(hash); // Show bootstrap modal id in console
            if ( $( hash ).hasClass('modal') ) {
                setTimeout(function () {
                    $(hash).modal('show');
                }, 1000)
            }
        }
    });
</script>
</body>
</html>