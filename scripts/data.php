<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CDatos.php");
$obj =  new panel();

switch ($_GET[v]) {
  case 'enbudo':
            echo $obj->enbudo();
    break;
  default:
    # code...
    break;
}
 ?>
