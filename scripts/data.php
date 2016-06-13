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
  case 'Elaborada':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden]);
      break;
  case 'Recibida':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden]);
        break;
  case 'Aprobada':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden]);
        break;
  case 'EnEsperaDePago':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden]);
              break;
  default:
    # code...
    break;
}
 ?>
