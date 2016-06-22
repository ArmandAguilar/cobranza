<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEmpresa.php");
include("$path/scripts/CCliente.php");
include("$path/scripts/CBlog.php");
include("$path/scripts/CFactura.php");
$objE =  new empresa();
$objC = new cliente();
$objB = new blog();
$objF = new facturas();
switch ($_GET[o]) {
  case '1':
            echo $objE->detalle($_POST[id]);
    break;
  case '2':
            echo $objC->detalle($_POST[id]);
      break;
  case '3':
            $info->Factura=$Factura;
            $info->NoProyecto=$_POST[txtProyecto];
            $info->Usuario=$_POST[txtUsuario];
            $info->Comentario=$_POST[txtMensaje];
            $info->Estado=$_POST[txtEstado];
            echo $objB->insert_blog($info);
    break;
    case '4':
              echo $objB->linea_tiempo($_POST[Factura]);
    break;
    case '5':
              $F=$_POST[Factura];
              $FN=$_POST[FacturaNoModificar];
              $FT=$_POST[cboTipoFactura];
              $Factura = "$F-$FN-$FT";
              $info->IdFacturacion = $_POST[IdFacturacion];
              $info->Factura = $_POST[Factura];
              $info->Monto = $_POST[Monto];
              $info->IVA = $_POST[IVA];
              $info->Trimestre = $_POST[Trimestre];
              $info->Concepto = $_POST[Concepto];
              echo $objF->modificar_datos($info);
      break;

  default:
    # code...
    break;
}
 ?>
