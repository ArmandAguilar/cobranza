<?php

class empresa extends poolConnecion
{

  function detalle($id)
  {
            #Obtenemos el IdEmpresa de presupuestos
            $objPresupuestos = new poolConnecion();
            $Sql1="SELECT [IdEmpresa] FROM [SAP].[dbo].[presupuestos] Where NoProyecto='$id'";
            $con=$objPresupuestos->ConexionSQLSAP();
            $RSet=$objPresupuestos->QuerySQLSAP($Sql1,$con);
             while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                   {

                       $IdEmpresa = $fila[IdEmpresa];
                   }
             $objPresupuestos->CerrarSQLSAP($RSet,$con);

            $arr = array();
            #Detalle Empresa
            $objEmpresa = new poolConnecion();
            $Sql="SELECT IdEmpresa,Empresa,RazonSocial,RFC,Giro,Web,TipoCuenta,OrigenCliente,Revenue,TamanoCliente,DireccionFiscal FROM empresas Where IdEmpresa='$IdEmpresa'";
            $con=$objEmpresa->ConexionSQLSAP();
            $RSet=$objEmpresa->QuerySQLSAP($Sql,$con);
             while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                   {
                      $Empresa = $fila[Empresa];
                      $RazonSocial = $fila[RazonSocial];
                      $RFC = $fila[RFC];
                      $Giro = $fila[Giro];
                      $Web = $fila[Web];
                      $TipoCuenta = $fila[TipoCuenta];
                      $OrigenCliente = $fila[OrigenCliente];
                      $Revenue = $fila[Revenue];
                      $TamanoCliente = $fila[TamanoCliente];
                      $DireccionFiscal = $fila[DireccionFiscal];
                       $arr[] = array('Empresa' => $Empresa,
                                      'RazonSocial' => $RazonSocial,
                                      'RFC' => $RFC,
                                      'Giro' => $Giro,
                                      'Web' => $Web,
                                      'TipoCuenta' => $TipoCuenta,
                                      'OrigenCliente' => $OrigenCliente,
                                      'Revenue' => $Revenue,
                                      'TamanoCliente' => $TamanoCliente,
                                      'DireccionFiscal' => $DireccionFiscal
                                    );
                   }
             $objEmpresa->CerrarSQLSAP($RSet,$con);
             return json_encode($arr);

  }
  function detalle_empresa_factura($IdEmpresa)
  {
          $arr = array();
          #Detalle Empresa
          $objEmpresa = new poolConnecion();
          $Sql="SELECT Empresa,RazonSocial,RFC,DireccionFiscal FROM empresas Where IdEmpresa='$IdEmpresa'";
          $con=$objEmpresa->ConexionSQLSAP();
          $RSet=$objEmpresa->QuerySQLSAP($Sql,$con);
           while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                 {
                    $Empresa = $fila[Empresa];
                    $RazonSocial = $fila[RazonSocial];
                    $RFC = $fila[RFC];
                    $DireccionFiscal = $fila[DireccionFiscal];
                     $arr[] = array('Empresa' => $Empresa,
                                    'RazonSocial' => $RazonSocial,
                                    'RFC' => $RFC,
                                    'DireccionFiscal' => $DireccionFiscal
                                  );
                 }
           $objEmpresa->CerrarSQLSAP($RSet,$con);
           return json_encode($arr);
  }
}

?>
