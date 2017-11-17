<?php
include("../sis.php");
include("$path/libs/conexion.php");

switch ($_GET[o]) {
    case '1':
              $Sql="SELECT [Id],[Id_Cobro],[FacturaForta],[OperacionAbono],[ImporteOperacion] FROM [SAP].[dbo].[CobrosConsulting]";
              $objOperaciones = new poolConnecion();
              $con=$objOperaciones->ConexionSQLSAP();
              $RSet=$objOperaciones->QuerySQLSAP($Sql,$con);
               while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                     {
                          $ImporteOperacion = number_format($fila[ImporteOperacion], 2, '.', ',');
                          $TFilas .= "<tr>
                                        <td>$fila[Id]</td>
                                        <td>$fila[Id_Cobro]</td>
                                        <td>$fila[FacturaForta]</td>
                                        <td>$fila[OperacionAbono]</td>
                                        <td>$ $ImporteOperacion</td>
                                        <td>Cancelar operacion</td>
                                    </tr>";
                     }
               $objOperaciones->CerrarSQLSAP($RSet,$con);
               echo $TFilas;
      break;
      case '2':


      break;

    default:
    break;
  }

?>
