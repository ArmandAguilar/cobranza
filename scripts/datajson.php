<?php
include("../sis.php");
include("$path/libs/conexion.php");

$strJson = "[";
$contador = 0;
$objPaso2 = new poolConnecion();
$Sql="SELECT [NumProyecto],[NomProyecto],[Estatus],[Vendedor],[Empresa] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar]";
$con=$objPaso2->ConexionSQLSAP();
$RSet=$objPaso2->QuerySQLSAP($Sql,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {

          if(!empty($fila[NumProyecto]))
          {
              $contador++;
             $strJson .= "{
                        \"id\": \"$contador\",
                        \"noproyecto\": \"$fila[NumProyecto]\",
                        \"proyecto\": \"$fila[NomProyecto]\",
                        \"estado\": \"$fila[Estatus]\",
                        \"vendedor\": \"$fila[Vendedor]\",
                        \"empresa\": \"$fila[Empresa]\"
                      },";
          }
        }
$strJson .= "]";
echo $strJson;
?>
