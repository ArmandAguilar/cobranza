<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CFactura.php");
switch ($_GET[o]) {
    case '1':
              if ($_POST[txtBusqurdaxOper] == 'Si') {
                $Sql="SELECT [Id],[Id_Cobro],[FacturaForta],[OperacionAbono],[ImporteOperacion] FROM [SAP].[dbo].[CobrosConsulting] Where [ImporteOperacion] like '%$_POST[txtSearch]%'";
              }
              else {
                    $Sql="SELECT [Id],[Id_Cobro],[FacturaForta],[OperacionAbono],[ImporteOperacion] FROM [SAP].[dbo].[CobrosConsulting] Where FacturaForta like '%$_POST[txtSearch]%'";
              }

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
                                        <td><div data-target=\"#modal-mFactura\" data-toggle=\"modal\" style=\"cursor:pointer\" onclick=\"setValoreMsj($fila[Id],'$fila[FacturaForta]','$fila[OperacionAbono]');\">Cancelar operacion</div></td>
                                    </tr>";
                     }
               $objOperaciones->CerrarSQLSAP($RSet,$con);
               echo $Sql;
      break;
      case '2':
                $Sql="DELETE FROM [SAP].[dbo].[CobrosConsulting] WHERE Id='$_POST[Id]' and FacturaForta = '$_POST[FacturaForta]' and OperacionAbono = '$_POST[OperacionAbono]'";
                $objOperaciones = new poolConnecion();
                $con=$objOperaciones->ConexionSQLSAP();
                $RSet=$objOperaciones->QuerySQLSAP($Sql,$con);
                $objOperaciones->CerrarSQLSAP($RSet,$con);

      break;
      case '3':
              $info->Factura = $_POST[txtSearch];
              $objFactura = new facturas();
              echo $objFactura->searchBills($info);

          break;
    case '4':
              $info->Id = $_POST[Id];
              $objFactura = new facturas();
              echo $objFactura->del_bills($info);
          break;

    default:
    break;
  }

?>
