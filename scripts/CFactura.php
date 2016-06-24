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
    $sql="UPDATE [SAP].[dbo].[FacturacionConsulting] Set [FacturaForta]='$Factura',[Monto Antes de IVA]='$Monto',[IVA]='$IVA',[CONCEPTO FACTURA]='$Concepto',[Trimestre]='$Trimestre'  Where IdFacturacion='$IdFacturacion'";
    #Modificamos Factura
    $objGurdar = new poolConnecion();
    $con=$objGurdar->ConexionSQLSAP();
    $RSet=$objGurdar->QuerySQLSAP($sql,$con);
    $objGurdar->CerrarSQLSAP($RSet,$con);
    return $sql;
}
function modificar_estado($info)
{
  $IdFacturacion = $info->IdFacturacion;
  $Estado = $info->Estado;
  $sql="UPDATE [SAP].[dbo].[FacturacionConsulting] Set [Estatus]='$Estado'  Where IdFacturacion='$IdFacturacion'";

  #Modificamos Factura
  /*$objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sql,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);*/
  return $sql;
}
function cancelar_factura($IdFacturacion,$Factura)
{

  #Creamos la factura  con *
   $SqlCrearCancelada="INSERT INTO [SAP].[dbo].[FacturacionConsulting]
           ([FacturaForta]
           ,[NumProyecto]
           ,[CONCEPTO FACTURA]
           ,[Fecha Factura]
           ,[Estatus]
           ,[Monto Antes de IVA]
           ,[IVA]
           ,[Fecha de recepción]
           ,[Fecha TENTATIVA de pago]
           ,[Notas adicionales]
           ,[Trimestre]
           ,[Producto]
           ,[Entrego Factura]
           ,[ImporteLetra]
           ,[QuienFactura]
           ,[EmpresaSolicitante]
           ,[SeFacturaA]
           ,[RFC]
           ,[DirFiscal]
           ,[TelefonoEmpresa]
           ,[MotivoCancelacion]
           ,[CondicionesDePago])
           SELECT ( '*' + [FacturaForta])
      ,[NumProyecto]
      ,[CONCEPTO FACTURA]
      ,[Fecha Factura]
      ,[Estatus]
      ,('-' + [Monto Antes de IVA])
      ,('-' + [IVA])
      ,[Fecha de recepción]
      ,[Fecha TENTATIVA de pago]
      ,[Notas adicionales]
      ,[Trimestre]
      ,[Producto]
      ,[Entrego Factura]
      ,('-' + [ImporteLetra])
      ,[QuienFactura]
      ,[EmpresaSolicitante]
      ,[SeFacturaA]
      ,[RFC]
      ,[DirFiscal]
      ,[TelefonoEmpresa]
      ,[MotivoCancelacion]
      ,[CondicionesDePago]
  FROM [SAP].[dbo].[FacturacionConsulting]
  Where IdFacturacion = '$IdFacturacion'";

  /*$objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($SqlCrearCancelada,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);*/


#Cancelamos el modlo original

  $sqlCancelar="UPDATE [SAP].[dbo].[FacturacionConsulting] Set [Estatus]='Cancelada',[FacturaForta] = '*$Factura'  Where IdFacturacion='$IdFacturacion'";

  /*$objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sqlCancelar,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);*/
  return "$SqlCrearCancelada + $sqlCancelar";
}

function relacionar_factura($info)
{

  $FacturaForta=$info->FacturaForta;
  $OperacionAbono=$info->OperacionAbono;
  $ImporteOperacion=$info->ImporteOperacion;
  $sql = "INSERT INTO [SAP].[dbo].[CobrosConsulting] VALUES ('0','$FacturaForta','$OperacionAbono','$ImporteOperacion')";

  /*$objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sql,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);*/

  return $sql;
}
function modificar_fecha($info)
{

  $txtIdFacturacion = $info->txtIdFacturacion;
  $txtDateFactura = $info->txtDateFactura;
  $txtDateTentativa = $info->txtDateTentativa;
  $txtDateRecepcion = $info->txtDateRecepcion;
  $sqlUpdate="UPDATE [SAP].[dbo].[FacturacionConsulting] SET [Fecha Factura] = '$txtDateFactura',[Fecha de recepción] = '$txtDateTentativa',[Fecha TENTATIVA de pago] = '$txtDateRecepcion' Where IdFacturacion='$txtIdFacturacion'";

  /*$objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sqlUpdate,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);*/
  return $sqlUpdate;
}


}
 ?>
