<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CEmpresa.php");
include("$path/scripts/CFactura.php");
$objE =  new empresa();
$objF = new factura();

switch ($_GET[o]) {
  case '1':
            echo $objE->detalle_empresa_factura($_POST[idEmpresa]);
    break;

  case '2':
            $Factura = "$_POST[txtFactura] $_POST[txtFacturaNo] $_POST[cboTipoFactura]";

            $info->Factura = $Factura;
            $info->NumProyecto = $_POST[txtNoProyecto];
            $info->CONCEPTO_FACTURA = $_POST[txtConcepto];
            $info->MontoAntesdeIVA = $_POST[txtCantidad];
            $info->IVA = $_POST[cboIva];
            $info->QuienFactura = $_POST[cboTipoFactura];
            $info->EmpresaSolicitante = $_POST[cboEmpresa];
            $info->SeFacturaA = $_POST[txtRasonSocial];
            $info->RFC = $_POST[txtRFC];
            $info->DirFiscal = $_POST[txtDir];

            echo $objF->ingresar_factura($info);
  break;
  default:
    # code...
    break;
}
 ?>
