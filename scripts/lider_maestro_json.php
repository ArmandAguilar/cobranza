<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/conexion.php");
$BuscarListaWhere == "";
if ($_SESSION[IdUsuario]>0)
{
    if ($_SESSION[CobranzaPerfil]=="Admin")
    {

    }
    else
     {
           $objListaDeProyectos = new poolConnecion();
           $SqlListaProyectos="SELECT [NumProyecto] FROM [SAP].[dbo].[RelacionMaestrosEsclavos] Where [LP]='$_SESSION[IdUsuario]'";
           $con=$objListaDeProyectos->ConexionSQLSAP();
           $RSet=$objListaDeProyectos->QuerySQLSAP($SqlListaProyectos,$con);
            while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                  {
                    $Proy = $fila[NumProyecto];
                    $ListaOR .= "NumProyecto='$Proy' or ";
                  }
           $objListaDeProyectos->CerrarSQLSAP($RSet,$con);
           $ListaOR = substr($ListaOR, 0, -3);
           $BuscarListaWhere = "Where $ListaOR";
    }


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
      FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] $BuscarListaWhere";
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
              $arr[] = array('id' => "$contador",
                              'NumMaestro' => "$NumMaestro",
                              'NumProyecto' => "$NumProyecto",
                              'NomProyecto' => "$NomProyecto",
                              'Empresa' => "$Empresa",
                              'FacturaForta' => "<a href='javascript:void(0);' onclick=\"load_view('$FacturaForta','$NumProyecto','$NomProyecto','$MontoCIVA','$Estatus');\">$FacturaForta</a>",
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
}
?>
