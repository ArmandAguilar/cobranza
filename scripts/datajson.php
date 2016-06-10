<?php
include("../sis.php");
include("$path/libs/conexion.php");


$contador = 0;
$arr = array();
$objPaso2 = new poolConnecion();
$Sql="SELECT [NumProyecto],[NomProyecto],[Estatus],[Vendedor],[Empresa] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar]";
$con=$objPaso2->ConexionSQLSAP();
$RSet=$objPaso2->QuerySQLSAP($Sql,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {
         $NumProyecto = $fila[NumProyecto];
         $NomProyecto = $fila[NomProyecto];
         $Estatus = $fila[Estatus];
         $Vendedor = $fila[Vendedor];
         $Empresa = $fila[Empresa];
         $IVA = $fila[IVA];
          if(!empty($fila[NumProyecto]))
          {
              $contador++;
              $arr[] = array('id' => $contador,
                                'noproyecto' => $NumProyecto,
                                'proyecto' => $NomProyecto,
                                'estado' =>$Estatus,
                                'vendedor' =>$Vendedor,
                                'empresa' =>$Empresa,
                                'iva' =>$IVA
                    );
          }
        }
echo json_encode($arr);

?>
