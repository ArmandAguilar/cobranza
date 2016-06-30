<?php
include("../sis.php");
include("$path/libs/conexion.php");


$contador = 0;
$arr = array();
$objPaso2 = new poolConnecion();
$Sql="SELECT
      [NumProyecto]
      ,[NumMaestro]
      ,[NomProyecto]
      ,[Empresa]
      ,[FacturaForta]
      ,[Estatus]
      ,Convert(varchar(11),[Fecha Factura]) As FechaFactura
      ,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaTentativa
      ,Convert(varchar(11),[Fecha de recepción]) As FechaRecepcion
      ,[Monto Antes de IVA] AS MontoAntesIva
      ,[IVA]
      ,[MontoCIVA]
      ,[SumaDeAbono a factura] As SumaAbono
      ,[Saldo por cobrar] As SaldoPorCobrar
      ,[Trimestre Factura] As TrimestreFactura
      ,[RFC]
      ,[SeFacturaA]
      ,[QuienFactura]
      FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar]";
#$Sql="SELECT [NumProyecto],[NomProyecto],[Estatus],[Vendedor],[Empresa] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar]";
$con=$objPaso2->ConexionSQLSAP();
$RSet=$objPaso2->QuerySQLSAP($Sql,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {
         $NumMaestro = $fila[NumMaestro];
         $NumProyecto = $fila[NumProyecto];
         $NomProyecto = $fila[NomProyecto];
         $Empresa = $fila[Empresa];
         $FacturaForta = $fila[FacturaForta];
         $Estatus = $fila[Estatus];
         $FechaFactura = $fila[FechaFactura];
         $FechaTentativa = $fila[FechaTentativa];
         $FechaRecepcion = $fila[FechaRecepcion];
         $MontoAntesIva = number_format($fila[MontoAntesIva], 2, '.', ',');
         $IVA = number_format($fila[IVA], 2, '.', ',');
         $MontoCIVA = number_format($fila[MontoCIVA], 2, '.', ',');
         $SumaAbono = number_format($fila[SumaAbono], 2, '.', ',');
         $SaldoPorCobrar = number_format($fila[SaldoPorCobrar], 2, '.', ',');
         $TrimestreFactura = $fila[TrimestreFactura];
         $RFC = $fila[RFC];
         $SeFacturaA = $fila[SeFacturaA];
         $QuienFactura = $fila[QuienFactura];

          if(!empty($fila[NumProyecto]))
          {
              $contador++;
              $arr[] = array('id' => "<a href='#'>$contador</a>",
                              'NumMaestro' => "$NumMaestro",
                              'NumProyecto' => "$NumProyecto",
                              'NomProyecto' => "$NomProyecto",
                              'Empresa' => "$Empresa",
                              'FacturaForta' => "$FacturaForta",
                              'Estatus' => "$Estatus",
                              'FechaFactura' => "$FechaFactura",
                              'FechaTentativa' => "$FechaTentativa",
                              'FechaRecepcion' => "$FechaRecepcion",
                              'MontoAntesIva' => "$MontoAntesIva",
                              'IVA' => "$ $IVA",
                              'MontoCIVA' => "$ $MontoCIVA",
                              'SumaAbono' => "$ $SumaAbono",
                              'SaldoPorCobrar' => "$ $SaldoPorCobrar",
                              'TrimestreFactura' => "$TrimestreFactura",
                              'RFC' => "$RFC",
                              'SeFacturaA' => "$SeFacturaA",
                              'QuienFactura' => "$QuienFactura"
                    );
          }
        }
echo json_encode($arr);

?>
