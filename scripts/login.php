<?php
ini_set('session.auto_start()','On');
session_start();
include("../sis.php");
include("$path/libs/poolConnecion.php");

        $Redirecionar=0;
        $objLogin = new poolConnecion();
        $Sql="Select Id,Nombre,Apellidos,Idinternet From Usuarios Where Nombre='$_POST[txtUser]' And Pwd='$_POST[txtPwd]'";
        $con=$objLogin->ConexionSQLNorthwind();
        $RSet=$objLogin->QuerySQLNorthwind($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {
                  $Redirecionar=1;
                  $_SESSION["Usuario"]="$fila[Nombre] $fila[Apellidos]";
                  $_SESSION["IdUsuario"]="$fila[Id]";
                  $_SESSION["IdInternet"]="$fila[Idinternet]";
                }
         $objLogin->CerrarSQLNorthwind($RSet,$con);
 echo $Redirecionar;
?>
