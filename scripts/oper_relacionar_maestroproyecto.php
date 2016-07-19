<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CMaestros.php");
$objM = new Maestro();
switch ($_GET[o]) {
  case '1':

            $info->NumMaestro=$_POST[txtNoMaestro];
            $info->NomMaestro=$_POST[txtMaestro];
            //echo $objM->guardar_maestro($info);
    break;
    case '2':
              $info->NoProyecto=$_POST[cboProyecto];
              $info->NumMaestro=$_POST[cboMaestro];
              //echo $objM->guardar_relacion($info)
    break;

    default:
    break;
  }

 ?>
