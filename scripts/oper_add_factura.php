<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEmpresa.php");
include("$path/scripts/CFactura.php");
$objE =  new empresa();
$objF = new facturas();
$objB = new blog();

switch ($_GET[o]) {
  case '1':
            echo $objE->detalle_empresa_factura($_POST[idEmpresa]);
    break;

  case '2':
            $Factura = "$_POST[txtFactura]-$_POST[txtFacturaNo]-$_POST[cboTipoFactura]";

            $info->Factura = $Factura;
            $info->NumProyecto = $_POST[txtNoProyecto];
            $info->CONCEPTO_FACTURA = $_POST[txtConcepto];
            $info->MontoAntesdeIVA = $_POST[txtCantidad];
            $info->IVA = $_POST[txtImporteTotal];
            $info->QuienFactura = $_POST[cboTipoFactura];
            $info->EmpresaSolicitante = $_POST[cboEmpresa];
            $info->SeFacturaA = $_POST[txtRasonSocial];
            $info->RFC = $_POST[txtRFC];
            $info->DirFiscal = $_POST[txtDir];
            $info->DateFactura = $_POST[txtDateFactura];
            $info->DateTentativa = $_POST[txtDateTentativa];
            $info->DateRecepcion = $_POST[txtDateRecepcion];

            echo $objF->ingresar_factura($info);
  break;
  case '3':
            $info->IdFactura=$_POST[IdFactura];
            $info->NoProyecto=$_POST[txtProyecto];
            $info->Usuario=$_POST[txtUsuario];
            $info->Comentario=$_POST[txtMensaje];
            $info->Estado=$_POST[txtEstado];
            echo $objB->insert_blog($info);
  break;
  default:
    # code...
    break;
}
 ?>
