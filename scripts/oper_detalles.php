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
            $info->IdFactura=$_POST[IdFactura];
            $info->NoProyecto=$_POST[txtProyecto];
            $info->Usuario=$_POST[txtUsuario];
            $info->Comentario=$_POST[txtMensaje];
            $info->Estado=$_POST[txtEstado];
            echo $objB->insert_blog($info);
    break;
    case '4':
              echo $objB->linea_tiempo($_POST[IdFactura]);
    break;
    case '5':
              $F=$_POST[Factura];
              $FN=$_POST[FacturaNoModificar];
              $FT=$_POST[cboTipoFactura];
              $Factura = "$F-$FN-$FT";
              $info->IdFacturacion = $_POST[IdFacturacion];
              $info->Factura = $Factura;
              $info->Monto = $_POST[Monto];
              $info->IVA = $_POST[IVA];
              $info->Trimestre = $_POST[Trimestre];
              $info->Concepto = $_POST[Concepto];
              echo $objF->modificar_datos($info);
      break;
      case '6':
                $info->IdFacturacion=$_POST[IdFacturacion];
                $info->Estado=$_POST[Estado];
                echo $objF->modificar_estado($info);
      break;
      case '7':

              $info->IdFacturacion=$_POST[IdFacturacion];
              $info->Factura=$_POST[Factura];
              $info->Motivo=$_POST[Motivo];
              echo $objF->cancelar_factura($info);
      break;
      case '8':
                $info->FacturaForta=$_POST[FacturaForta];
                $info->OperacionAbono=$_POST[OperacionAbono];
                $info->ImporteOperacion=$_POST[ImporteOperacion];
                echo $objF->relacionar_factura($info);
      break;
      case '9':
                $info->txtIdFacturacion = $_POST[txtIdFacturacion];
                $info->txtDateFactura = $_POST[txtDateFactura];
                $info->txtDateTentativa = $_POST[txtDateTentativa];
                $info->txtDateRecepcion = $_POST[txtDateRecepcion];
                echo $objF->modificar_fecha($info);
      break;
      case '10':
              /*$info->IdEmpresa=$_POST[IdEmpresa];
              $info->IdFacturacion=$_POST[IdFacturacion];
              $info->RasonSocial=$_POST[RasonSocial];
              $info->RFC=$_POST[RFC];
              $info->Dir=$_POST[Dir];
              echo $objF->modificar_datos_facturacion($info);*/
      break;

  default:
    # code...
    break;
}
 ?>
