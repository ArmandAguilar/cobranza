<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CFactuar.php");
$objF =  new facturas();
switch ($_GET[o]) {
  case '1':
            $info->Id=$_POST[cboIdMaestro];
            $info->IdLider=$_POST[cboUsuario];
            echo $objF ->relacionar_usuarios($info);
    break;

    default:
    break;
  }
?>
