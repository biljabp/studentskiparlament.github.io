$('document').ready(function () {
    var konacna=0;


    $("#cartModal").load('ajax/load-cart-modal.php', function () {


        $('#checkout').click(function(){
            console.log('checkout')
        })

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
$( document ).ajaxComplete(function() {
    var konacna=0;

    $('.product_amount').each(function () {
        konacna+=$(this).data('price')*$(this).val();
        console.log(konacna);
        $('#konacna_cena').html(konacna)
    })
})

$('#korisnik_postojeci').click(function () {
    console.log("POSTOJECI KORISNIK")
})