<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<?php
$Cantid = $_REQUEST['cant'];
$Total  =  $Cantid * 4000;
$Impuesto = $Total * 0.19;
$Sudtotal = ($Cantid * 4000) - $Impuesto;
?>

<body style="Background:#ffffff;">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h5 class="text-center">Recuerda Que Esta Información Se Utilizará Para Contactarte.</h5>
                <div id="alerta"></div>
                <div class="form-floating" style="margin-top:23px;">
                    <input type="text" value="" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico">
                    <label for="">Correo Electrónico</label>
                </div>               
                <div class="form-floating" style="margin-top:23px;">
                    <input type="text" value="" class="form-control" id="nombre" name="nombre" placeholder="Password">
                    <label for="">Nombres Y Apellidos</label>
                </div>
                <div class="form-floating" style="margin-top:23px;">
                    <input type="text" value="" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                    <label for="">Dirección</label>
                </div>
                <div class="form-floating" style="margin-top:23px;">
                    <input type="number" value=""  min="1" class="form-control" id="number" name="number" placeholder="Password">
                    <label for="">Número de Celular</label>
                    <p><b><em>Por favor, colocar numero de celular correctamente</em></b></p>
                </div>
                <div class="d-grid gap-2">
                    <button id="btnGuarda" style="margin-top:30px; color:#fff;" class="btn btn-lg btn-success" type="button"><b>GENERAR NUMEROS</b></button>
                </div>
            </div>

            <div class="col-sm-1"></div>
            <br>
            <div class="col-lg-4">               
                <div class="p-30 mb-5">
                    <div class="border-bottom">
                        <br><br>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $Cantid; ?> x Boletas</p>
                            <input value="<?php echo $Cantid; ?>" id="cant" id="cant" type="text" disable hidden>
                            <p>$4,000</p>
                        </div>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal:</h6>
                            <h6 id="sudtotal" >$<?php echo number_format($Sudtotal); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Impuesto:</h6>
                            <h6  id="impues" class="font-weight-medium">$<?php echo number_format($Impuesto); ?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total:</h5>
                            <h5 id="total">$<?php echo number_format($Total); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/checkout.js"></script>
    <script src="js/sweetalert-dev.js"></script>
</body>

</html>