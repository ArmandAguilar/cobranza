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
                                        <td>$fila[Abono]</td>
                                        <td>$fila[Cargo]</td>
                                        <td>$fila[Saldo]</td>
                                        <td>$fila[CategoriaCargo]</td>
                                        <td>$fila[CategoriaAbono]</td>
                                        <td>$fila[CategoriaCosto]</td>
                                        <td>$fila[Cuenta]</td>
                                        <td>$fila[MesAnio]</td>
                                        <td>$fila[Iva]</td>
                                        <td>$fila[Empresa]</td>
                                        <td>$fila[Referencia]</td>
                                        <td>$fila[Ctarc]</td>
                                        <td>$fila[RFC]</td>
                                    </tr>";
                     }
               $objOperaciones->CerrarSQLSAP($RSet,$con);

               echo $TFilas;
      break;

    default:
    break;
  }

?>
