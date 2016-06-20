<?php

class facturas extends poolConnecion
{


function ingresar_factura($info)
{

 $D = date(d);
 $M = date(m);
 $Y = date(Y);

  $Factura = $info->Factura;
  $NumProyecto = $info->NumProyecto;
  $CONCEPTO_FACTURA =  $info->CONCEPTO_FACTURA;
  $Fecha_Factura = "$D/$M/$Y";
  $MontoAntesdeIVA = $info->MontoAntesdeIVA;
  $IVA = $info->IVA;
  $Fecha_recepcion = "01/01/1900";
  $Fecha_TENTATIVA_de_pago = "01/01/1900";
  $Notas = "";
  $Trimestre = "";
  $Producto = "";
  $Entrego_Factura = "";
  $ImporteLetra = "";
  $QuienFactura = $info->QuienFactura;
  $EmpresaSolicitante = $info->EmpresaSolicitante;
  $SeFacturaA = $info->SeFacturaA;
  $RFC = $info->RFC;
  $DirFiscal = $info->DirFiscal;
  $TelefonoEmpresa = "";
  $MotivoCancelacion = "";
  $CondicionesDePago = "";

    $sql = "INSERT INTO [SAP].[dbo].[FacturacionConsulting] VALUES ('$Factura','$NumProyecto','$CONCEPTO_FACTURA','$Fecha_Factura' ,'Provisionada','$MontoAntesdeIVA','$IVA','$Fecha_recepcion','$Fecha_TENTATIVA_de_pago','$Notas','$Trimestre','$Producto','$Entrego_Factura','$ImporteLetra','$QuienFactura','$EmpresaSolicitante','$SeFacturaA','$RFC','$DirFiscal','$TelefonoEmpresa','$MotivoCancelacion','$CondicionesDePago')";

    #Todas las Empresas
    $objGurdar = new poolConnecion();
    $con=$objGurdar->ConexionSQLSAP();
    $RSet=$objGurdar->QuerySQLSAP($sql,$con);
    $objGurdar->CerrarSQLSAP($RSet,$con);

    return $sql;
}

}
 ?>
