<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CDatos.php");
$obj =  new panel();

switch ($_GET[v]) {
  case 'enbudo':
            $info->IdUser=0;
            echo $obj->enbudo($info);
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
  case 'enbudoUser':
                  $info->IdUser=$_POST[IdUsuario];
                  echo $obj->enbudoUser($info);
  break;
  default:
    # code...
    break;
}
 ?>
