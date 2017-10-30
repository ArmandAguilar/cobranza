<?php
include("../sis.php");
include("$path/libs/conexion.php");

switch ($_GET[o]) {
    case '1':
              $Sql="Select Id_Oper,CONVERT(Varchar(255),Fecha) As Fecha,Abono,Cargo,Saldo,Concepto,CategoriaCargo,CategoriaAbono,Cuenta,CategoriaCosto,[Mes-Anio] As MesAnio,Iva,Empresa,Referencia,Ctarc,RFC From OperacionesConsulting Where Id_Oper like '%$_POST[txtSearch]%'";
              $objOperaciones = new poolConnecion();
              $con=$objOperaciones->ConexionSQLSAP();
              $RSet=$objOperaciones->QuerySQLSAP($Sql,$con);
               while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                     {
                          $TFilas .= "<tr>
                                        <td>$fila[Id_Oper]</td>
                                        <td>$fila[Fecha]</td>
                                        <td>Abono</td>
                                        <td>Cargo</td>
                                        <td>Saldo</td>
                                        <td>Cat. Cargo</td>
                                        <td>Cat. Abono</td>
                                        <td>Cat. Costo</td>
                                        <td>Cuenta</td>
                                        <td>MesAnio</td>
                                        <td>Iva</td>
                                        <td>Empresa</td>
                                        <td>Referencia</td>
                                        <td>Ctarc</td>
                                        <td>RFC</td>
                                    </tr>";

                     }
               $objOperaciones->CerrarSQLSAP($RSet,$con);

               echo $Sql;
      break;

    default:
    break;
  }

?>
