<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CDatos.php");
$obj =  new panel();

switch ($_GET[v]) {
  case 'enbudo':
            echo $obj->enbudo();
    break;
  case 'Provisionada':
                    echo $obj->filtro_estado($_GET[v],$_POST[Orden]);
    break;
  case 'OrdenZ':

      beak;
  default:
    # code...
    break;
}
 ?>
