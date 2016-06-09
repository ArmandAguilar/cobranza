<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEmpresa.php");
include("$path/scripts/CCliente.php");
include("$path/scripts/CBlog.php");
$objE =  new empresa();
$objC = new cliente();
$objB = new blog();
switch ($_GET[o]) {
  case '1':
            echo $objE->detalle($_POST[id]);
    break;
  case '2':
            echo $objC->detalle($_POST[id]);
      break;
  case '3':

            $info->Factura=$_POST[txtFactura];
            $info->NoProyecto=$_POST[txtNoProyecto]=;
            $info->Usuario=$_POST[txtUsuario];
            $info->Comentario=$_POST[txtComentario];
            echo $objB->insert_blog($info);
    break;
  default:
    # code...
    break;
}
 ?>
