<!DOCTYPE html>
<html lang="en">
    <?php include 'class/CheckoutClass.php'; ?>
    <?php include 'class/ConexionClass.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifas Prueba</title>

    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <style>
        .sticky-container {
            padding: 0px;
            margin: 0px;
            position: fixed;
            right: -130px;
            top: 230px;
            width: 210px;
            z-index: 1100;
        }

        .sticky li {
            list-style-type: none;
            background-color: #fff;
            color: #efefef;
            height: 50px;
            padding: 0px;
            margin: 0px 0px 1px 0px;
            -webkit-transition: all 0.25s ease-in-out;
            -moz-transition: all 0.25s ease-in-out;
            -o-transition: all 0.25s ease-in-out;
            transition: all 0.25s ease-in-out;
            cursor: pointer;
        }

        .sticky li:hover {
            margin-left: -115px;
        }

        .sticky li img {
            float: left;
            margin: 5px 4px;
            margin-right: 5px;
        }

        .sticky li p {
            padding-top: 5px;
            margin: 0px;
            line-height: 16px;
            font-size: 11px;
        }

        .sticky li p a {
            text-decoration: none;
            color: #2C3539;
        }

        .sticky li p a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

</head>

<body style="Background:#000000;">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <CENTER>
                    <h1 style="color:#ffffff; margin-top:30px;">SORTEOS CARLOS GONGORA</h1>
                </CENTER>
            </div>
            <div class="col-md-12">
                <div class="d-grid gap-2">
                    <button style="margin-top:10px; background:#d20a35; color:#fff;" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <h4>ESCOGER BOLETAS</h4>
                    </button>
                </div>
            </div>
            <div class="col-sm-12">
                <CENTER>
                    <h1 style="color:#ffffff; margin-top:30px;">BARRA DE PROGRESO</h1>
                </CENTER>
            </div>

            <div class="container" style="margin-top: 15px;">
                <div class="col-md-12">
                    <div class="progress" style="height:45px" role="progressbar" aria-label="Warning striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <?php  $Porcent = Checkout::Bar("Bar");?>
                        <div class="progress-bar progress-bar-striped bg-warning" style="width: <?php echo intval($Porcent); ?>%"><h3><?php echo intval($Porcent);?>%</h3></div>                    
                    </div>
                </div>
            </div>



            <div class="col-md-12" style="margin-bottom: 35px;">
                <img style="margin-top:30px;" src="img/banner1.jpg" class="img-fluid" alt="...">
            </div>
        </div>
       
        <div class="sticky-container">
            <ul class="sticky">
                <a href="https://www.facebook.com/programacionnet" target="_blank">
                    <li>
                        <img src="img/facebook.png" width="32" height="32">
                        <p>VISITANOS<br>Facebook
                </a></p>
                </li>

                <a href="https://twitter.com/noprog" target="_blank">
                    <li>
                        <img src="img/Instagram.webp" width="32" height="32">
                        <p>VISITANOS<br>Instagram
                </a></p>
                </li>
                <a href="https://plus.google.com/programacionnet" target="_blank">
                    <li>
                        <img src="img/whatsapp.png" width="32" height="32">
                        <p>VISITANOS<br>Whatsapp
                </a></p>
                </li>
            </ul>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comprar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <center>
                            <div id="alerta"></div>
                        </center>
                        <h5>Valor De Rifa: <span id="precioUnitario">0.00</span></h5>
                        <input class="form-control" type="number" value="3" id="cantidad" name="cantidad" min="3" max="100" onKeyUp="calcularTotal()" onChange="calcularTotal()">

                        <div class="row" style="margin-top:12px;">
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button2" style="background:#f7a82e; color:white;" type="button" class="btn btn-Warning">3</button>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button3" style="background:#f48c06; color:white;" type="button" class="btn btn-Warning">5</button>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button4" style="background:#f48c06; color:white;" type="button" class="btn btn-Warning">6</button>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button5" style="background:#9d0208; color:white;" type="button" class="btn btn-danger">10</button>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button6" style="background:#9d0208; color:white;" type="button" class="btn btn-danger">30</button>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button7" style="background:#9d0208; color:white;" type="button" class="btn btn-danger">50</button>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button id="button8" style="background:#6a040f; color:white;" type="button" class="btn btn-danger">100</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin-top:28px;">
                            <div class="col-md-2" style="margin-bottom:12px;">
                                <div style="margin-top:5px;" class="d-grid gap-2">
                                    <h5>Comprar :</h5>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-bottom:12px;">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success vali" id="total">4000</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/sweetalert-dev.js"></script>

</body>

</html>