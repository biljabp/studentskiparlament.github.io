<?php
include('php-assets/user_session.php');
$category_id=1;
var_dump($_SESSION);
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
    <div class="cart">
        <button type="button" class="btn btn-info btn-lg right" data-toggle="modal" data-target="#cartModal"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Korpa <span class="iznos_korpe"></span></button>
    </div>
</nav>
<div class="container">
<form id="register_form_id" class="form-horizontal" action="php-assets/register_check.php" method="post">
    <div id="user_register">
        <!-- F&L name -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="name">Puno ime:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name" id="name" placeholder="Vaše ime" tabindex="1" required>
            </div>
        </div>
        <!-- Phone number -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="phone"> Broj telefona:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Broj telefona" tabindex="2" required>
            </div>
        </div>
        <!-- Address -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="address">Vaša adresa</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address" id="address" placeholder="Vaša adresa" tabindex="3" required>
            </div>
        </div>
        <!-- City -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="city">Grad:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="city" id="city" placeholder="Grad" tabindex="4">
            </div>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="postal_code" id="postal_code" placeholder="Poštanski broj" tabindex="5" required>
            </div>
        </div>

    </div>

    <div id="user_details">

        <!-- email address -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"> Vaš email:</label>
            <div class="col-sm-8">
                <input type="email" class="form-control first_form" name="email" id="email" placeholder="Unesite Vašu email adresu" tabindex="7" required>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label class="control-label col-sm-4" for="password">Nova lozinka:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control first_form" name="password" id="password" placeholder="Unesite lozinku" tabindex="8" required>
            </div>
        </div>
        <!-- Password confirm -->
        <div class="form-group" id="password_confirm_group_id">
            <label class="control-label col-sm-4" for="password_confirm">Potvrdite vašu lozinku:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control first_form" name="password_confirm" id="password_confirm" placeholder="Potvrdite lozinku" tabindex="9" required>
            </div>
        </div>


        <!-- Final Button -->
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button id="registration_submit_button" type="submit"  class="btn btn-default" tabindex="11">Pošaljite registraciju <i class="fa fa-check-circle" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>

</form>
</div>

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script><!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/localization/messages_sr_lat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script>
    $('document').ready(function () {
        $("#register_form_id").validate({
            rules: {
                name:{
                    required:true,
                    rangelength:[6, 60],
                },
                password: {
                    required: true,
                    rangelength: [8, 32]

                },
                password_confirm: {
                    equalTo: "#password"
                },
                phone: "required",
                email: {
                    required: true,
                    email: true
                },
                postal_code: "required",
                city: "required",
                address: "required"
            }
        });


        $('#registration_submit_button').click(function () {

            var options = {
                beforeSubmit: function () {
                    $("#register_form_id").validate({
                        rules: {
                            password: {
                                required: true,
                                rangelength: [8, 32]

                            },
                            password_confirm: {
                                equalTo: "#password"
                            },
                            phone: "required",
                            email: {
                                required: true,
                                email: true
                            },
                            postal_code: "required",
                            city: "required",
                            address: "required"
                        }
                    });
                },  // pre-submit callback
                success: function () {
                    window.location.href = 'index.php#potrvdinalog';
                },  // post-submit callback

                // other available options:
                //url:       url         // override for form's 'action' attribute
                //type:      type        // 'get' or 'post', override for form's 'method' attribute
                //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
                //clearForm: true        // clear all form fields after successful submit
                resetForm: true,        // reset the form after successful submit

                // $.ajax options can be used here too, for example:
                //timeout:   3000
            };

            // bind form using 'ajaxForm'
            $('#register_form_id').ajaxForm(options);

            // pre-submit callback
            function showRequest(formData, jqForm, options) {

                // formData is an array; here we use $.param to convert it to a string to display it
                // but the form plugin does this for you automatically when it submits the data
                var queryString = $.param(formData);

                // jqForm is a jQuery object encapsulating the form element.  To access the
                // DOM element for the form do this:
                // var formElement = jqForm[0];

                console.log('About to submit: \n\n' + queryString);

                // here we could return false to prevent the form from being submitted;
                // returning anything other than false will allow the form submit to continue
                return true;
            }

            // post-submit callback
            function showResponse(responseText, statusText, xhr, $form) {
                // for normal html responses, the first argument to the success callback
                // is the XMLHttpRequest object's responseText property

                // if the ajaxForm method was passed an Options Object with the dataType
                // property set to 'xml' then the first argument to the success callback
                // is the XMLHttpRequest object's responseXML property

                // if the ajaxForm method was passed an Options Object with the dataType
                // property set to 'json' then the first argument to the success callback
                // is the json data object returned by the server

                console.log('status: ' + statusText + '\n\nresponseText: \n' + responseText +
                    '\n\nThe output div should have already been updated with the responseText.');

            }
            $('#register_form_id').submit();


        });

    });

</script>
</body>
</html>