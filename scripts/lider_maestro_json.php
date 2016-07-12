<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/conexion.php");

$contador = 0;
$arr = array();
$objPaso2 = new poolConnecion();
$Sql="SELECT
      [SAP].[dbo].[RelacionMaestrosEsclavos].[NumMaestro] As NumMaestro,
      [SAP].[dbo].[RelacionMaestrosEsclavos].[NumProyecto] As NumProyecto,
      [SAP].[dbo].[Presupuestos].[Proyecto] As NomProyecto
      FROM
      [SAP].[dbo].[RelacionMaestrosEsclavos],
      [SAP].[dbo].[Presupuestos]
      Where
      [SAP].[dbo].[RelacionMaestrosEsclavos].[NumProyecto] = [SAP].[dbo].[Presupuestos].[NoProyecto]";
#$Sql="SELECT [NumProyecto],[NomProyecto],[Estatus],[Vendedor],[Empresa] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar]";
$con=$objPaso2->ConexionSQLSAP();
$RSet=$objPaso2->QuerySQLSAP($Sql,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {

              $NumMaestro = $fila[NumMaestro];
              $NumProyecto = $fila[NumProyecto];
              $NomProyecto = $fila[NomProyecto];
              $Lider = "Lider";
              $contador++;
              $arr[] = array('id' => "$contador",
                              'NumMaestro' => "$NumMaestro",
                              'NumProyecto' => "$NumProyecto",
                              'NomProyecto' => "$NomProyecto",
                              'Lider' => "$Lider"
                    );

        }
echo json_encode($arr);

?>
