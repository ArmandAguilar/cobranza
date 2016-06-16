<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEmpresa.php");
$objE =  new empresa();

switch ($_GET[o]) {
  case '1':
            echo $objE->detalle_empresa_factura($_POST[idEmpresa]);
    break;
  default:
    # code...
    break;
}
 ?>
