<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEmpresas.php");
$obj =  new empresa();

switch ($_GET[o]) {
  case '1':
            echo $obj->detalle($_POST[id]);
    break;
  default:
    # code...
    break;
}
 ?>
