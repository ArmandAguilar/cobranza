<?php

class empresa extends poolConnecion
{

  function detalle($id)
  {
            #Obtenemos el IdEmpresa de presupuestos
            $objPresupuestos = new poolConnecion();
            $Sql1="SELECT IdEmpresa,Empresa,RazonSocial,RFC FROM empresas Where IdEmpresa='4144'";
            $con=$objPresupuestos->ConexionSQLSAP();
            $RSet=$objPresupuestos->QuerySQLSAP($Sql1,$con);
             while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                   {

                       $IdEmpresa = $fila[IdEmpresa];
                   }
             $objPresupuestos->CerrarSQLSAP($RSet,$con);

            //$arr = array();
            #Detalle Empresa
            /*$objEmpresa = new poolConnecion();
            $Sql="SELECT IdEmpresa,Empresa,RazonSocial,RFC FROM empresas Where IdEmpresa='4144'";
            $con=$objEmpresa->ConexionSQLSAP();
            $RSet=$objEmpresa->QuerySQLSAP($Sql,$con);
             while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                   {

                       $arr[] = array('Empresa' => $fila[IdEmpresa],
                                      'RazonSocial' => $fila[RazonSocial],
                                      'RFC' => $fila[RFC]
                                    );
                   }
             $objEmpresa->CerrarSQLSAP($RSet,$con);
             //return json_encode($arr);*/
             return "$fila[IdEmpresa] $Sql1";
  }
}

?>
