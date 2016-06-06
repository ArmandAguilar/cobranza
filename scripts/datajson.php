<?php
include("../sis.php");
include("$path/libs/conexion.php");

$strJson = "[";
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
             /*$strJson .= "{
                        \"id\": \"$contador\",
                        \"noproyecto\": \"$fila[NumProyecto]\",
                        \"proyecto\": \"$fila[NomProyecto]\",
                        \"estado\": \"$fila[Estatus]\",
                        \"vendedor\": \"$fila[Vendedor]\",
                        \"empresa\": \"$fila[Empresa]\"
                      },";
                      <th data-field="contribucionbruta" data-visible="false">Contribucion Bruta</th>
                      <th data-field="montofacturadoaiva" data-visible="false">Monto Facturado A IVA</th>
                      <th data-field="cuentasporfacturaraiva" data-visible="false">Cuentas por facturar AIVA</th>*/
          }
        }
$strJson .= "]";
echo json_encode($arr);
?>
