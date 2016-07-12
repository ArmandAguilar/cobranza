<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/conexion.php");


function LiderNombre($id)
{
      #Obtenemos el avatar
      $Nombre = "";
      $objAvatar = new poolConnecion();
      $Sql="SELECT [Nombre],[Apellidos] FROM [Northwind].[dbo].[Usuarios] Where Id='$id'";
      $con=$objAvatar->ConexionSQLNorthwind();
      $RSet=$objAvatar->QuerySQLNorthwind($Sql,$con);
       while($filaA=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
             {
                $Nombre = $filaA[Nombre];
                $Nombre = $filA[Apellidos];
             }
       if (!empty($Nombre)) {

       }
       else {
         $Nombre = "No Asigando";
       }
      return $Nombre;
}
$contador = 0;
$arr = array();
$objPaso2 = new poolConnecion();
$Sql="SELECT
      [SAP].[dbo].[RelacionMaestrosEsclavos].[NumMaestro] As NumMaestro,
      [SAP].[dbo].[RelacionMaestrosEsclavos].[NumProyecto] As NumProyecto,
      [SAP].[dbo].[RelacionMaestrosEsclavos].[LP] As IdLider,
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

                $Lider = LiderNombre($fila[IdLider]);


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
