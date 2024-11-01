/**********************************************************
 *
 *  Funcion para Guardar
 *   
 **********************************************************/
$(document).ready(function () {
    $('#btnGuarda').click(function () {       
        if ($('#correo').val() == "") {
            $('#alerta').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Te Hizo Falta El Correo.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            $('#correo').focus();
        } else if ($('#nombre').val() == "") {
            $('#alerta').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Te Hizo Falta El Nombre.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            $('#nombre').focus();
        }else if ($('#direccion').val() == "") {
            $('#alerta').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Te Hizo Falta El direccion.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            $('#direccion').focus();
        } else if ($('#number').val() == "") {
            $('#alerta').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Te Hizo Falta El Numero Telefónico<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            $('#number').focus();
        }else {
            var Correo = $('#correo').val();    
            var Nombre = $('#nombre').val();
            var Number = $('#number').val();
            var direc = $('#direccion').val();
            var Cant = $('#cant').val();
            var Sud = document.getElementById("sudtotal").innerText;
            var Iva = document.getElementById("impues").innerText;
            var Total = document.getElementById("total").innerText;
            $.ajax({
                url: 'controller/CheckoutController.php',
                type: 'POST',
                data: 'accion=INSERTAR&correo=' + Correo + '&nombre=' + Nombre+'&direccion=' + direc+ '&number=' + Number+ '&cant=' + Cant+ '&sudtotal=' + Sud+ '&impues=' + Iva+ '&total=' + Total,            
                success: function (msj) {
                    if (msj == 1) {
                        $("#alerta").append('<div class="alert alert-success alert-dismissible fade show" role="alert">Generando Numeros...<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        $("#alerta").css("display", "");
                        setTimeout(function () {
                            window.location.href = "success.php";
                        }, 1500);
                    } else {
                        $("#alerta").html('<div class="alert alert-danger"><button class="close" data-dismiss="alert"></button><a href="#" class="link"><i class="fa fa-exclamation-circle"></i> Upsss.</a> ' + msj + '.</div>');
                    }
                },
                error: function (msj) {
                    $("#alerta").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><a href="#" class="link">Error: </a> Ha ocurrido un error durante la ejecución ' + msj + '</div>');
                }
            });
           
        }
    });
});


