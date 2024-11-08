<?php require "class/ConexionClass.php"; ?>
<?php require "class/CheckoutClass.php"; ?>
<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletas</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div class="fondo-fuegos">
        <video autoplay muted loop class="video-fondo">
            <source src="img/fugo.mp4" type="video/mp4">
            Tu navegador no soporta videos.
        </video>
        <div class="container">
            <center>
                <h1 class="titulo">Números De La Suerte</h1>
            </center>
            <div class="row este">


                <?php
                $numCel = $_REQUEST['search'];
                $Resu = Checkout::Bar("Search", $numCel); ?>
                <?php if ($Resu) {
                    foreach ($Resu as $Num):
                        ?>
                            <div class="col-md-4 imagen-con-texto" style="margin-top: 25px; margin-bottom:60px;">
                                <img src="img/boleta.png" width="350">
                                <div class="texto"><b><?php echo $Num['numbers']; ?></b></div>
                            </div>
                        <?php endforeach; ?>

              <?php  } else { ?>
                        <br>
                       <center><h2 style="color:green;"><b>No Hay Voletas Registradas Con Ese Numero De Celular : <?php echo $numCel; ?></b></h2></center> 
              <?php  } ?>

              




                <div class="col-md-6" style="margin-top: 35px; margin-bottom:40px;">
                    <center><a href="index.php" class="btn btn-danger btn-lg"><-- Pagina Principal</a></center>
                    
                </div>
                
                <div class="col-md-6" style="margin-top: 35px; margin-bottom:40px;">
                    <center><a href="list.php" class="btn btn-primary btn-lg">Lista De Clientes</a></center>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>