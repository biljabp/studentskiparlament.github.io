<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 04/09/2018
 * Time: 00:08
 */
include ('../php-assets/user_session.php');
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
                                            <input type=\"text\" class=\"form-control input-sm product_amount \" data-price='".$row['cena']."' value=\"".$counted_arrays[$row['idproizvod']]."\">
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
                                            <button type=\"button\"  data-dismiss=\"modal\" class=\" btn btn-primary btn-sm btn-block continue_shopping\">
                                                <span class=\"glyphicon glyphicon-share-alt\"></span> Nastavi Kupovinu
                                            </button>
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
                                        data-target=\"#checkoutModal\" 
                                        data-dismiss=\"modal\"  class=\"btn btn-success btn-md\" id='checkout'>
                                            Naplati
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </div>
</div>
";
echo $output;
?>