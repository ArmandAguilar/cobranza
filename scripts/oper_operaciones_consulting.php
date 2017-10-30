<?php
include("../sis.php");
include("$path/libs/conexion.php");

switch ($_GET[o]) {
    case '':
              $Sql="Select Id_Oper,CONVERT(Varchar(255),Fecha) As Fecha,Abono,Cargo,Saldo,Concepto,CategoriaCargo,CategoriaAbono,Cuenta,CategoriaCosto,[Mes-Anio] As MesAnio,Iva,Empresa,Referencia,Ctarc,RFC From OperacionesConsulting Where Id_Oper like '%$_GET[txtSearch]%'";

      break;

    default:
    break;
  }

?>
