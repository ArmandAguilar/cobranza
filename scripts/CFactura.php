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

    #Guradamos Factura
    $objGurdar = new poolConnecion();
    $con=$objGurdar->ConexionSQLSAP();
    $RSet=$objGurdar->QuerySQLSAP($sql,$con);
    $objGurdar->CerrarSQLSAP($RSet,$con);

    return $RSet;
}
function modificar_datos($info)
{

  #Moficamos factura
    $IdFacturacion = $info->IdFacturacion;
    $Factura = $info->Factura;
    $Monto = $info->Monto;
    $IVA = $info->IVA;
    $Trimestre = $info->Trimestre;
    $Concepto = $info->Concepto;
    $sql="UPDATE Set [FacturaForta]='$Factura',[Monto Antes de IVA]='$Monto',[IVA]='$IVA',[CONCEPTO FACTURA]='$Concepto',[Trimestre]='$Trimestre' from [SAP].[dbo].[FacturacionConsulting] Where IdFacturacion='$IdFacturacion'";
    #Todas las Empresas
    /*$objGurdar = new poolConnecion();
    $con=$objGurdar->ConexionSQLSAP();
    $RSet=$objGurdar->QuerySQLSAP($sql,$con);
    $objGurdar->CerrarSQLSAP($RSet,$con);*/
    return $sql;
}

}
 ?>
