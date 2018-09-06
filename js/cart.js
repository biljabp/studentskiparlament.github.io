$('document').ready(function () {
    var konacna=0;


    $("#cartModal").load('ajax/load-cart-modal.php', function loadCart () {

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

        $('#userBtn').click(function () {
            window.location.href="porudzbina.php";
            console.log('desilo se')
        });

        $('#checkout').click(function(){
            console.log('checkout')

        })

        $('.product_amount').each(function () {
            konacna+=$(this).data('price')*$(this).val();
            console.log(konacna);
            $('#konacna_cena').html(konacna)

        })

        $('.product_amount').change(function () {
            if (isNumeric($(this).val())){
            console.log('happened change');
            var cena=$(this).data('price');
            var kolicina=$(this).val();
            console.log (cena, 'koje ima', kolicina);
            var konacna=0;
            $('.product_amount').each(function () {
                konacna+=$(this).data('price')*$(this).val();
                console.log(konacna);
                $('#konacna_cena').html(konacna)
            })
            } else
            {
                $(this).insertAfter("<p>Prihvata se samo numerički broj</p>")
            }
        })

        $('.remove_from_cart').click(function () {
            $.post('ajax/post-remove-from-cart.php', {'product_id': $(this).data('id')}, function (data) {
                $("#cartModal").load('ajax/load-cart-modal.php', function () {
                    $('.product_amount').each(function () {
                        konacna+=$(this).data('price')*$(this).val();
                        console.log(konacna);
                        $('#konacna_cena').html(konacna)
                    })


                    $('.product_amount').change(function () {
                        console.log('happened change');
                        var cena=$(this).data('price');
                        var kolicina=$(this).val();
                        console.log (cena, 'koje ima', kolicina);
                        var konacna=0;
                        $('.product_amount').each(function () {
                            konacna+=$(this).data('price')*$(this).val();
                            console.log(konacna);
                            $('#konacna_cena').html(konacna)
                        })
                    })

                    $('.remove_from_cart').click(function () {
                        $.post('ajax/post-remove-from-cart.php', {'product_id': $(this).data('id')}, function () {
                            $("#cartModal").load('ajax/load-cart-modal.php');
                            $('.product_amount').each(function () {
                                konacna+=$(this).data('price')*$(this).val();
                                console.log(konacna);
                                $('#konacna_cena').html(konacna)
                            })

                        })

                    });
                });
            })

        });
    });

    $(".add_to_cart").click(function () {

        $.post('ajax/post-add-to-cart.php', {'product_id':$(this).data('id')}, function (data) {
            $("#cartModal").load('ajax/load-cart-modal.php', function () {
                $('.product_amount').change(function () {
                    console.log('happened change');
                    var cena=$(this).data('price');
                    var kolicina=$(this).val();
                    console.log (cena, 'koje ima', kolicina);
                    var konacna=0;
                    $('.product_amount').each(function () {
                        konacna+=$(this).data('price')*$(this).val();
                        console.log(konacna);
                        $('#konacna_cena').html(konacna)
                    })
                })

                $('.remove_from_cart').click(function () {
                    $.post('ajax/post-remove-from-cart.php', {'product_id': $(this).data('id')}, function (data) {
                        $("#cartModal").load('ajax/load-cart-modal.php', function () {
                            $('.product_amount').change(function () {
                                console.log('happened change');
                                var cena=$(this).data('price');
                                var kolicina=$(this).val();
                                console.log (cena, 'koje ima', kolicina);
                                var konacna=0;
                                $('.product_amount').each(function () {
                                    konacna+=$(this).data('price')*$(this).val();
                                    console.log(konacna);
                                    $('#konacna_cena').html(konacna)
                                })
                            })

                            $('.remove_from_cart').click(function () {
                                $.post('ajax/post-remove-from-cart.php', {'product_id': $(this).data('id')}, function (data) {
                                    $("#cartModal").load('ajax/load-cart-modal.php');
                                })

                            });
                        });
                    })

                });
            });
        });

    });

});
function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
$( document ).ajaxComplete(function() {
    var konacna=0;

    $('.product_amount').each(function () {
        if (isNumeric($(this).val())){
        konacna+=$(this).data('price')*$(this).val();
        console.log(konacna);
        $('#konacna_cena').html(konacna)
        }
    })
})

$('#korisnik_postojeci').click(function () {
    console.log("POSTOJECI KORISNIK")
})

