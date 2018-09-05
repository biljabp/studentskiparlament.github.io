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
<div class="container">
<h1>Uspesno ste se registrovali. Da biste dovrsili vasu porudzbinu, morate da potvrdite jos jednom</h1>
    <?php
    $string="(";
    foreach ($_SESSION['cart'] as $id) {
        $string.=$id.', ';
    }
    $string=substr($string, 0, -2).')';
    echo $string;
    $SQL="SELECT * from proizvod where idproizvod IN $string ";
    $cart_items = mysqli_query($connection,$SQL);
    $counted_arrays=array_count_values($_SESSION['cart']);
    $products="";
    $ukcena=0;
    while ($row = mysqli_fetch_array($cart_items,MYSQLI_ASSOC))
    {
        $ukcena+=$row['cena']*$counted_arrays[$row['idproizvod']];
        $products.="                    <div class='row'>
                                    <div class=\"col-lg-4\">
                                        <h4 class=\"product-name\"><strong>".$row['naziv_proizvoda']."</strong></h4><h4><small>".$row['opis']."</small></h4>
                                    </div>
                                    <div class=\"col-lg-6\">
                                        <div class=\"col-lg-6 text-right\">
                                            <h6><strong>".$row['cena']."din <span class=\"text-muted\"> x</span></strong></h6>
                                        </div>
                                        <div class=\"col-lg-4\">
                                            <input type=\"text\" class=\"form-control input-sm product_amount input-with-data \" data-naziv=\"".$row['naziv_proizvoda']."\" id='valuedInput".$row['idproizvod']."'  data-id=\"".$row['idproizvod']."\" data-price='".$row['cena']."' value=\"".$counted_arrays[$row['idproizvod']]." \" disabled>
                                            <button class='btn add_this' data-id='".$row['idproizvod']."'>+</button>
                                            <button class='btn remove_this' data-id='".$row['idproizvod']."'>-</button>

                                        </div>
                                        <div class=\"col-lg-2\">
                                            <button type=\"button\" class=\"btn btn-link btn-lg remove_from_cart\" data-id='".$row['idproizvod']."'>
                                                <span class=\"glyphicon glyphicon-trash\"> </span>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                     <hr>
                                     ";
    }

    $output="
  <div class=\"modal-body col-lg-12 \">
                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"panel panel-info\">
                            <div class=\"panel-heading\">
                                <div class=\"panel-title\">
                                    <div class=\"row\">
                                        <div class=\"col-lg-6\">
                                            <h5><span class=\"glyphicon glyphicon-shopping-cart\"></span> Korpa sa porudžbinama</h5>
                                        </div>
                                        <div class=\"col-lg-6\">
                                            <a href='salate.php'><button type=\"button\"  data-dismiss=\"modal\" class=\" btn btn-primary btn-sm btn-block continue_shopping\">
                                                <span class=\"glyphicon glyphicon-share-alt\"></span> Nastavi Kupovinu
                                            </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel-body\">
                                ".$products."
                                
                            </div>
                            <div class=\"panel-footer\">
                                <div class=\"row text-center\">
                                    <div class=\"col-lg-9\">
                                        <h4 class=\"text-right\">Ukupno <strong id='konacna_cena'>$ukcena</strong></h4>
                                    </div>  
                                    <div class=\"col-lg-3\">
                                        <button type=\"button\" data-toggle=\"modal\" 
                                          class=\"btn btn-success btn-md\" id='modalCheckout'>
                                            Dovrši porudžbinu
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type='hidden' id='invisible' data-target=\"#dovrsiModal\" data-dismiss=\"modal\"> 
    </div>
</div>
";
echo $output;    ?>



</div>

    <div id="dovrsiModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Uspešno</h4>
                </div>
                <div class="modal-body">

                    <h1>Uspešno unešena porudžbina, porudžbina je prosleđena vlasnicima!</h1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>

</body>

<script >
$('document').ready(function () {
        $('.product_amount').change(function () {
            console.log('happened change');
            var cena = $(this).data('price');
            var kolicina = $(this).val();
            console.log(cena, 'koje ima', kolicina);
            var konacna = 0;
            $('.product_amount').each(function () {
                konacna += $(this).data('price') * $(this).val();
                console.log(konacna);
                $('#konacna_cena').html(konacna)
        })
    })

    $('.add_this').click(function () {
        var nameId="#valuedInput"+$(this).data('id');
        $.post('ajax/post-add-to-cart.php', {'product_id':$(this).data('id')}, function (data) {

            $(nameId).val(data)
        })
    })

    $('.remove_this').click(function () {
        var nameId="#valuedInput"+$(this).data('id');
        $.post('ajax/post-remove-one-from-cart.php', {'product_id':$(this).data('id')}, function (data) {
            $(nameId).val(data)
        })
    })

    $( document ).ajaxComplete(function() {
        var konacna=0;

            $('.product_amount').each(function () {
                konacna+=$(this).data('price')*$(this).val();
                console.log(konacna);
                $('#konacna_cena').html(konacna)
            })
        });
        $('#modalCheckout').click(function (e) {
            e.preventDefault();
            $.post('ajax/insert-cart.php', {
                'user_id':"<?php echo $_SESSION['user']?>"
            }, function () {
                $('.input-with-data').each(function () {
                    var ukupna_cena=0;
                    var cena=$(this).data("price");
                    var kolicina=$(this).val();
                    var id=$(this).data("id");
                    ukupna_cena=kolicina*cena;
                    $.post('ajax/order-items.php', {
                        'cena':ukupna_cena,
                        'kolicina':kolicina,
                        'id':id
                    }, function (data) {
                        if (data == "Success") {
                            $('#dovrsiModal').modal('show');
                        }                    })

                })
            });
        })


})
</script>

</html>