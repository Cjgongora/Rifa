<?php
require_once '../class/ConexionClass.php';
require_once '../class/CheckoutClass.php';
/**********************************************************
 *
 *   Variables
 *   
 **********************************************************/
$Accion         = isset($_POST['accion'])       ? $_POST['accion']       : null;
$Correo         = isset($_POST['correo'])       ? $_POST['correo']       : null;
$Nombre         = isset($_POST['nombre'])       ? $_POST['nombre']       : null;
$Numero         = isset($_POST['number'])       ? $_POST['number']       : null;
$Direccion      = isset($_POST['direccion'])    ? $_POST['direccion']    : null;
$Cantidad       = isset($_POST['cant'])         ? $_POST['cant']         : null;
$Sudtotal       = isset($_POST['sudtotal'])     ? $_POST['sudtotal']     : null;
$Iva            = isset($_POST['impues'])       ? $_POST['impues']       : null;
$Total          = isset($_POST['total'])        ? $_POST['total']        : null;
                  
/**********************************************************
 *
 *   Acciones
 *   
 **********************************************************/
switch ($Accion) {
    case 'INSERTAR':
        $Chek = new Checkout();
        $Chek->set_Accion($Accion);
        $Chek->set_Correo($Correo);
        $Chek->set_Numero_cel($Numero);
        $Chek->set_Nombre($Nombre);
        $Chek->set_Direccion($Direccion);
        $Chek->set_Cantidad($Cantidad);
        $Chek->set_Sudtotal($Sudtotal);
        $Chek->set_Iva($Iva);
        $Chek->set_Total($Total);
        if ($Chek->Gestionar() == true) {
            echo 1;
            exit();
        }
}

