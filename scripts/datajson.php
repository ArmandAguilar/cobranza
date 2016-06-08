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

          if(!empty($fila[NumProyecto]))
          {
              $contador++;
              $arr[] = array('id' => $contador,
                                'noproyecto' => $fila[NumProyecto],
                                'proyecto' => $fila[NomProyecto],
                                'estado' =>$fila[Estatus],
                                'vendedor' =>$fila[Vendedor],
                                'empresa' =>$fila[Empresa],
                                'montoantesdeiva' =>$fila[Monto Antes de IVA],
                                'iva' =>$fila[IVA]
                    );
          }
        }
echo json_encode($arr);
?>
