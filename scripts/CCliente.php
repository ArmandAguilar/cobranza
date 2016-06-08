<?php

class cliente extends poolConnecion
{

  function detalle($id)
  {
        #Obtenemos el IdEmpresa de presupuestos
        $objPresupuestos = new poolConnecion();
        $Sql="SELECT IdCliente FROM [SAP].[dbo].[presupuestos] Where NoProyecto='$id'";
        $con=$objPresupuestos->ConexionSQLSAP();
        $RSet=$objPresupuestos->QuerySQLSAP($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {

                   $IdCliente = $fila[IdCliente];
               }
         $objPresupuestos->CerrarSQLSAP($RSet,$con);

         $arr = array();
         #Detalle Clientes
         $objCliente = new poolConnecion();
         $Sql="SELECT [Nombre],[Telefono],[Celular],[Email],[Puesto],[Tratamiento] FROM [SAP].[dbo].[Clientes] Where Id='$IdCliente'";
         $con=$objCliente->ConexionSQLSAP();
         $RSet=$objCliente->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                    $Traramiento = $fila[Tratamiento];
                    $Nombre = $fila[Nombre];
                    $Cliente = "$Tratamiento $Nombre";
                    $Telefono = $fila[Telefono];
                    $Celular = $fila[Celular];
                    $Email = $fila[Email];
                    $Puesto = $fila[Puesto];

                    $arr[] = array('Nombre' => $Cliente,
                                   'Telefono' => $Telefono,
                                   'Celular' => $RFC,
                                   'Email' => $Giro
                                   'Puesto' => $Puesto
                                 );
                }
          $objCliente->CerrarSQLSAP($RSet,$con);
          return json_encode($arr);
  }
}
