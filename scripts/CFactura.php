<?php
ini_set('session.auto_start()','On');
session_start();
class facturas extends poolConnecion
{


function ingresar_factura($info)
{

  $Ac=$_SESSION[Acronimo];
  $Factura = $info->Factura;
  $NumProyecto = $info->NumProyecto;
  $CONCEPTO_FACTURA =  $info->CONCEPTO_FACTURA;
  $Fecha_Factura = $info->DateFactura;
  $MontoAntesdeIVA = $info->MontoAntesdeIVA;
  $IVA = $info->IVA;
  $Fecha_Factura = $info->DateFactura;
  $Fecha_recepcion = $info->DateRecepcion;
  $Fecha_TENTATIVA_de_pago = $info->DateTentativa;
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

    $sql = "INSERT INTO [SAP].[dbo].[FacturacionConsulting] VALUES ('$Ac-$Factura','$NumProyecto','$CONCEPTO_FACTURA','$Fecha_Factura' ,'Provisionada','$MontoAntesdeIVA','$IVA','$Fecha_recepcion','$Fecha_TENTATIVA_de_pago','$Notas','$Trimestre','$Producto','$Entrego_Factura','$ImporteLetra','$QuienFactura','$EmpresaSolicitante','$SeFacturaA','$RFC','$DirFiscal','$TelefonoEmpresa','$MotivoCancelacion','$CondicionesDePago')";

    #Guradamos Factura
    $objGurdar = new poolConnecion();
    $con=$objGurdar->ConexionSQLSAP();
    $RSet=$objGurdar->QuerySQLSAP($sql,$con);
    sqlsrv_next_result($RSet);
    $IDs=$objGurdar->CerrarSQLSAP($RSet,$con);

  /*buscamos last id */
  $objLastId = new poolConnecion();
  $SqlID="SELECT [IdFacturacion] FROM [SAP].[dbo].[FacturacionConsulting] order by [IdFacturacion] asc";
  $con=$objLastId->ConexionSQLSAP();
  $RSet=$objLastId->QuerySQLSAP($SqlID,$con);
   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
  			 {
  					 $IdFacturacion = $fila[IdFacturacion];
  			 }
   $objLastId->CerrarSQLSAP($RSet,$con);
    return $IdFacturacion;
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
    $QuienFactura = $info->TipoFactura;
    $sql="UPDATE [SAP].[dbo].[FacturacionConsulting] Set [FacturaForta]='$Factura',[Monto Antes de IVA]='$Monto',[IVA]='$IVA',[CONCEPTO FACTURA]='$Concepto',[Trimestre]='$Trimestre',[QuienFactura] = '$QuienFactura'  Where IdFacturacion='$IdFacturacion'";
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
  $objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sql,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);
  return $sql;
}
function cancelar_factura($info)
{

    $IdFacturacion = $info->IdFacturacion;
    $Factura = $info->Factura;
    $Motivo = $info->Motivo;
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
      ,'Cancelada'
      ,(-1 * [Monto Antes de IVA])
      ,(-1 * [IVA])
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
      ,[CondicionesDePago]
  FROM [SAP].[dbo].[FacturacionConsulting]
  Where IdFacturacion = '$IdFacturacion'";

  $objGurdar1 = new poolConnecion();
  $con=$objGurdar1->ConexionSQLSAP();
  $RSet=$objGurdar1->QuerySQLSAP($SqlCrearCancelada,$con);
  $objGurdar1->CerrarSQLSAP($RSet,$con);


#Cancelamos el modlo original

  $sqlCancelar="UPDATE [SAP].[dbo].[FacturacionConsulting] Set [Estatus]='Cancelada',[FacturaForta] = '*$Factura' ,[MotivoCancelacion]='$Motivo' Where IdFacturacion='$IdFacturacion'";

  $objGurdar2 = new poolConnecion();
  $con=$objGurdar2->ConexionSQLSAP();
  $RSet=$objGurdar2->QuerySQLSAP($sqlCancelar,$con);
  $objGurdar2->CerrarSQLSAP($RSet,$con);
  return "$SqlCrearCancelada + $sqlCancelar";
}

function relacionar_factura($info)
{

  $FacturaForta=$info->FacturaForta;
  $OperacionAbono=$info->OperacionAbono;
  $ImporteOperacion=$info->ImporteOperacion;
  $sql = "INSERT INTO [SAP].[dbo].[CobrosConsulting] VALUES ('0','$FacturaForta','$OperacionAbono','$ImporteOperacion')";

  $objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sql,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);

  return $sql;
}
function modificar_fecha($info)
{

  $txtIdFacturacion = $info->txtIdFacturacion;
  $txtDateFactura = $info->txtDateFactura;
  $txtDateTentativa = $info->txtDateTentativa;
  $txtDateRecepcion = $info->txtDateRecepcion;
  $sqlUpdate="UPDATE [SAP].[dbo].[FacturacionConsulting] SET [Fecha Factura] = '$txtDateFactura',[Fecha de recepción] = '$txtDateRecepcion',[Fecha TENTATIVA de pago] = '$txtDateTentativa' Where IdFacturacion='$txtIdFacturacion'";

  $objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sqlUpdate,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);
  return $sqlUpdate;
}
function relacionar_usuarios($info)
{

  $Id=$info->Id;
  $IdLider=$info->IdLider;

  $sqlUpdate="UPDATE [SAP].[dbo].[RelacionMaestrosEsclavos] SET [LP] = '$IdLider' WHERE IdMaestroEsclavo='$Id'";
  $objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sqlUpdate,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);
  return $sqlUpdate;

}
function modificar_datos_facturacion($info)
{

  $IdEmpresa = $info->IdEmpresa;
  $IdFacturacion = $info->IdFacturacion;
  $RasonSocial  = $info->RasonSocial;
  $RFC  = $info->RFC;
  $Dir  = $info->Dir;

  $objCboEmpresas = new poolConnecion();
  $SqlEmpreas="SELECT [Empresa] FROM [SAP].[dbo].[empresas] Where IdEmpresa='$IdEmpresa'";
  $con=$objCboEmpresas->ConexionSQLSAP();
  $RSet=$objCboEmpresas->QuerySQLSAP($SqlEmpreas,$con);
   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
  			 {
  					 $Empresa = $fila[Empresa];
  			 }
   $objCboEmpresas->CerrarSQLSAP($RSet,$con);
   $sqlUpdate="UPDATE [SAP].[dbo].[FacturacionConsulting] SET [EmpresaSolicitante] = '$Empresa', [SeFacturaA] = '$RasonSocial'  ,[RFC] = '$RFC',[DirFiscal] = '$Dir'  Where IdFacturacion='$IdFacturacion'";

  $objGurdar = new poolConnecion();
  $con=$objGurdar->ConexionSQLSAP();
  $RSet=$objGurdar->QuerySQLSAP($sqlUpdate,$con);
  $objGurdar->CerrarSQLSAP($RSet,$con);
  return $sqlUpdate;
}
function registar_evento($info)
{

        $IdFacturacion = $info->IdFacturacion;
        $IdUsuario = $info->IdUsuario;
        $FechaFacturacion = $info->FechaFacturacion;
        $FechaTentativa = $info->FechaTentativa;
        $FechaModificacion = $info->FechaModificacion;
        $Estado = $info->Estado;
        $Sql = "INSERT INTO [SAP].[dbo].[AAHistoricoMovFacturacion] VALUES ('$IdFacturacion','$IdUsuario','$FechaFacturacion','$FechaTentativa','$FechaModificacion','$Estado')";
        $objGurdar = new poolConnecion();
        $con=$objGurdar->ConexionSQLSAP();
        $RSet=$objGurdar->QuerySQLSAP($Sql,$con);
        $objGurdar->CerrarSQLSAP($RSet,$con);
        return $Sql;
}
function usuario($idusuario)
{

  $objUsuarioActual = new poolConnecion();
  $Sql="Select Nombre,Apellidos From Usuarios Where Id='$idusuario'";
  $con=$objUsuarioActual->ConexionSQLNorthwind();
  $RSet=$objUsuarioActual->QuerySQLNorthwind($Sql,$con);
   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
         {
            $NombreUsuario = "$fila[Nombre] $fila[Apellidos]";
          }
  return $NombreUsuario;
}
function leer_eventos($info)
{
      $IdFacturacion = $info->IdFacturacion;
      $tabla .= "<table class=\"table table-hover table-vcenter\">
        <thead>
          <tr>
            <th class=\"min-width\">Usuario</th>
            <th>Movimientos</th>
            <th class=\"text-center\">Estado</th>
          </tr>
        </thead>
        <tbody>";
        $objEventos = new poolConnecion();
        $con=$objEventos->ConexionSQLSAP();
        $Sql = "SELECT [IdUsuario],Convert(varchar(11),[FechaFacturacion],11) As FechaFacturacion,Convert(varchar(11),[FechaTentativa],11)  As FechaTentativa,Convert(varchar(11),[FechaModificacion]) As FechaModificacion ,[Estado] FROM [SAP].[dbo].[AAHistoricoMovFacturacion] Where IdFacturacion='$IdFacturacion'";
        $RSet=$objEventos->QuerySQLSAP($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {
                    $IdUsuario = $fila[IdUsuario];
                    $FechaFacturacion = $fila[FechaFacturacion];
                    $FechaTentativa = $fila[FechaTentativa];
                    $FechaModificacion = $fila[FechaModificacion];
                    $Estado = $fila[Estado];
                    $Usuario=$this->usuario($IdUsuario);
                 $tabla .= "<tr>
                               <td class=\"text-center\">
                                 <span class=\"text-muted\">$Usuario</span>
                               </td>
                               <td>
                                 <small class=\"text-muted\">Facturacion:$FechaFacturacion</small>
                                 <br>
                                 <small class=\"text-muted\">Tentantiva:$FechaTentativa</small>
                                 <br>
                                 <small class=\"text-muted\">Modificacion:$FechaModificacion</small>
                               </td>
                               <td class=\"text-center\"><span class=\"text-success text-semibold\">$Estado</span></td>
                         </tr>";
               }
            $objEventos->CerrarSQLSAP($RSet,$con);

    $tabla .= "</tbody>
        </table>";
        return $tabla;
}
function last_id()
{
  $objLastId = new poolConnecion();
  $SqlID="SELECT [IdFacturacion] FROM [SAP].[dbo].[FacturacionConsulting] order by [IdFacturacion] asc";
  $con=$objLastId->ConexionSQLSAP();
  $RSet=$objLastId->QuerySQLSAP($SqlID,$con);
   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
  			 {
  					 $IdFacturacion = $fila[IdFacturacion];
  			 }
   $objLastId->CerrarSQLSAP($RSet,$con);
   return $IdFacturacion;
}
function QuienFacura($IdFacturacion)
{
      $arr = array();
      #Detalle Empresa
      $objQuienFactura = new poolConnecion();
      $Sql="SELECT [QuienFactura],[EmpresaSolicitante],[SeFacturaA],[RFC],[DirFiscal] FROM FacturacionConsulting Where IdFacturacion='$IdFacturacion'";
      $con=$objQuienFactura->ConexionSQLSAP();
      $RSet=$objQuienFactura->QuerySQLSAP($Sql,$con);
       while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
             {
                $QuienFactura = $fila[QuienFactura];
                $EmpresaSolicitante = $fila[EmpresaSolicitante];
                $SeFactura = $fila[SeFacturaA];
                $RFC = $fila[RFC];
                $DirFiscal = $fila[DirFiscal];
                 $arr[] = array('QuienFactura' => $QuienFactura,
                                'EmpresaSolicitante' => $EmpresaSolicitante,
                                'SeFactura' => $SeFactura,
                                'RFC' => $RFC,
                                'DirFiscal' => $DirFiscal
                              );
             }
       $objQuienFactura->CerrarSQLSAP($RSet,$con);
       return json_encode($arr);
       //return $Sql;
}
function sumAndUpdateDates($info)
{
  /* Here we need know olddate and new date for make the cal in the dates */
    $txtIdFacturacion = $info->txtIdFacturacion;
    $txtDateFactura = $info->txtDateFactura;
    $txtDateTentativa = $info->txtDateTentativa;
    $txtDateRecepcion = $info->txtDateRecepcion;
    $txtNumProyecto = $info->txtNumProyecto;
    $txtDateTentativaOld = $info->txtDateTentativaOld;

    /* Get the diff betewent Current day  - Old Days */
    /*$objGetDifDate = new poolConnecion();
    $con=$objGetDifDate->ConexionSQLSAP();
    $Sql = "SELECT DATEDIFF(DAY, '$txtDateTentativaOld','$txtDateTentativa') As TotalDays";
    $RSet=$objGetDifDate->QuerySQLSAP($Sql,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
                $Days = $fila[TotalDays];

          }
    $objGetDifDate->CerrarSQLSAP($RSet,$con);*/

   /* Calculate the next dates */
    /*$Sql  = "SELECT  DATEADD(d,$Days,'$txtDateFactura') As txtDateFactura,DATEADD(d,$Days,'$txtDateRecepcion') As txtDateRecepcion";
    $objGetNewDate = new poolConnecion();
    $con=$objGetNewDate->ConexionSQLSAP();
    $RSet=$objGetNewDate->QuerySQLSAP($Sql,$con);
     while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
           {
                $txtDateFacturaNew = $fila[txtDateFactura];
                $txtDateRecepcionNew = $fila[txtDateRecepcion];
          }
    $objGetNewDate->CerrarSQLSAP($RSet,$con);*/

    /*$info->txtIdFacturacion = $txtIdFacturacion;
    $info->txtDateFactura = $txtDateFacturaNew;
    $info->txtDateTentativa = $txtDateTentativa
    $info->txtDateRecepcion = $txtDateRecepcionNew;
    $this->modificar_fecha($info);*/

}


}
 ?>
