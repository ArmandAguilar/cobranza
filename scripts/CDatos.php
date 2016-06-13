<?php

class panel extends poolConnecion
{

  function enbudo()
    {

      #Paso 1
      $contadorPoyectos = 0;
      $objPaso1 = new poolConnecion();
      $Sql="SELECT [NumProyecto],[NomProyecto],[ImporteFinal]  FROM [SAP].[dbo].[RVEdoCtaGeneral]";
      $con=$objPaso1->ConexionSQLSAP();
      $RSet=$objPaso1->QuerySQLSAP($Sql,$con);
       while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
             {

                   if(!empty($fila[NumProyecto]))
                   {
                     $ImporteFinal = number_format($fila[ImporteFinal], 2, '.', ',');
                     $TotalGral += $fila[ImporteFinal];
                     $contadorPoyectos ++;
                     $row_col1.= "<div class=\"row\">
                                     <div class=\"col-lg-*\">
                                       <div class=\"panel panel-warning panel-colorful\">
                                              <div class=\"pad-all media\">
                                                <div class=\"media-left\">
                                                  <span class=\"icon-wrap icon-wrap-xs\">
                                                    <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                  </span>
                                                </div>
                                                <div class=\"media-body\">
                                                  <p class=\"h4 text-thin media-heading\">$ImporteFinal</p>
                                                  <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                </div>
                                              </div>

                                        </div>
                                     </div>
                                 </div>";
                   }


              }
       $objPaso1->CerrarSQLSAP($RSet,$con);
       #Paso 2
       $Importe = 0;
       $ContadorProvisionada = 0;
       $objPaso2 = new poolConnecion();
       $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,[Fecha TENTATIVA de pago] As FechaPago FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Provisionada'";
       $con=$objPaso2->ConexionSQLSAP();
       $RSet=$objPaso2->QuerySQLSAP($Sql,$con);
        while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
              {

                     if(!empty($fila[NumProyecto]))
                     {
                       $Importe = number_format($fila[Importe], 2, '.', ',');
                       $TotalProvisionada += $fila[Importe];
                       $Proyecto =  substr($fila[NomProyecto], 0, 15);
                       $ContadorProvisionada ++;
                        $row_col2.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$fila[NomProyecto]','$Importe','Provisionada');\" style=\"cursor:pointer\">
                                        <div class=\"col-lg-*\">
                                          <div class=\"panel panel-purple panel-colorful\">
                                                 <div class=\"pad-all media\">
                                                   <div class=\"media-left\">
                                                     <span class=\"icon-wrap icon-wrap-xs\">
                                                       <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                     </span>
                                                   </div>
                                                   <div class=\"media-body\">
                                                     <p class=\"h4 text-thin media-heading\">$Importe</p>
                                                     <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                   </div>
                                                 </div>

                                           </div>
                                        </div>
                                    </div>";
                    }
               }
        $objPaso2->CerrarSQLSAP($RSet,$con);
        #Paso 3
        $Importe = 0;
        $objPaso3 = new poolConnecion();
        $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,[Fecha TENTATIVA de pago] As FechaPago FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Elaborada'";
        $con=$objPaso3->ConexionSQLSAP();
        $RSet=$objPaso3->QuerySQLSAP($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {

                      if(!empty($fila[NumProyecto]))
                      {
                        $Importe = number_format($fila[Importe], 2, '.', ',');
                        $TotalElaborada += $fila[Importe];
                        $Proyecto =  substr($fila[NomProyecto], 0, 15);
                         $row_col3.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$fila[NomProyecto]','$Importe','Elaborada');\" style=\"cursor:pointer\">
                                         <div class=\"col-lg-*\">
                                           <div class=\"panel panel-purple panel-colorful\">
                                                  <div class=\"pad-all media\">
                                                    <div class=\"media-left\">
                                                      <span class=\"icon-wrap icon-wrap-xs\">
                                                        <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                      </span>
                                                    </div>
                                                    <div class=\"media-body\">
                                                      <p class=\"h4 text-thin media-heading\">$Importe</p>
                                                      <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                    </div>
                                                  </div>

                                            </div>
                                         </div>
                                     </div>";
                     }
                }
         $objPaso3->CerrarSQLSAP($RSet,$con);
         #Paso 4
         $Importe = 0;
         $objPaso4 = new poolConnecion();
         $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,[Fecha TENTATIVA de pago] As FechaPago  FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Recibida'";
         $con=$objPaso4->ConexionSQLSAP();
         $RSet=$objPaso4->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {

                         if(!empty($fila[NumProyecto]))
                         {
                           $Importe = number_format($fila[Importe], 2, '.', ',');
                           $TotalRecibida += $fila[Importe];
                           $Proyecto =  substr($fila[NomProyecto], 0, 15);
                            $row_col4.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$fila[NomProyecto]','$Importe','Recibida');\" style=\"cursor:pointer\">
                                            <div class=\"col-lg-*\">
                                              <div class=\"panel panel-purple panel-colorful\">
                                                     <div class=\"pad-all media\">
                                                       <div class=\"media-left\">
                                                         <span class=\"icon-wrap icon-wrap-xs\">
                                                           <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                         </span>
                                                       </div>
                                                       <div class=\"media-body\">
                                                         <p class=\"h4 text-thin media-heading\">$Importe</p>
                                                         <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                       </div>
                                                     </div>

                                               </div>
                                            </div>
                                        </div>";
                        }
                 }
          $objPaso4->CerrarSQLSAP($RSet,$con);
          #Paso 5
          $Importe = 0;
          $objPaso5 = new poolConnecion();
          $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,[Fecha TENTATIVA de pago] As FechaPago  FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Aprobada'";
          $con=$objPaso5->ConexionSQLSAP();
          $RSet=$objPaso5->QuerySQLSAP($Sql,$con);
           while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                 {

                        if(!empty($fila[NumProyecto]))
                        {
                          $Importe = number_format($fila[Importe], 2, '.', ',');
                          $TotalAprobada += $fila[Importe];
                          $Proyecto =  substr($fila[NomProyecto], 0, 15);
                           $row_col5.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$fila[NomProyecto]','$Importe','Aprobada');\" style=\"cursor:pointer\">
                                           <div class=\"col-lg-*\">
                                             <div class=\"panel panel-purple panel-colorful\">
                                                    <div class=\"pad-all media\">
                                                      <div class=\"media-left\">
                                                        <span class=\"icon-wrap icon-wrap-xs\">
                                                          <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                        </span>
                                                      </div>
                                                      <div class=\"media-body\">
                                                        <p class=\"h4 text-thin media-heading\">$Importe</p>
                                                        <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                      </div>
                                                    </div>

                                              </div>
                                           </div>
                                       </div>";
                       }
                  }
           $objPaso5->CerrarSQLSAP($RSet,$con);
           #Paso 6
           $Importe = 0;
           $objPaso6 = new poolConnecion();
           $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,[Fecha TENTATIVA de pago] As FechaPago  FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='EnEsperaDePago'";
           $con=$objPaso6->ConexionSQLSAP();
           $RSet=$objPaso6->QuerySQLSAP($Sql,$con);
            while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                  {

                         if(!empty($fila[NumProyecto]))
                         {
                           $Importe = number_format($fila[Importe], 2, '.', ',');
                           $TotalEnEsperaDePago += $fila[Importe];
                           $Proyecto =  substr($fila[NomProyecto], 0, 15);
                            $row_col6.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$fila[NomProyecto]','$Importe','EnEsperaDePago');\" style=\"cursor:pointer\">
                                            <div class=\"col-lg-*\">
                                              <div class=\"panel panel-purple panel-colorful\">
                                                     <div class=\"pad-all media\">
                                                       <div class=\"media-left\">
                                                         <span class=\"icon-wrap icon-wrap-xs\">
                                                           <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                         </span>
                                                       </div>
                                                       <div class=\"media-body\">
                                                         <p class=\"h4 text-thin media-heading\">$Importe</p>
                                                         <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                       </div>
                                                     </div>

                                               </div>
                                            </div>
                                        </div>";
                        }
                   }
            $objPaso6->CerrarSQLSAP($RSet,$con);
        $TotalGral = number_format($TotalGral, 2, '.', ',');
        $TotalProvisionada  = number_format($TotalProvisionada, 2, '.', ',');
        $TotalElaborada  = number_format($TotalElaborada, 2, '.', ',');
        $TotalRecibida  = number_format($TotalRecibida, 2, '.', ',');
        $TotalAprobada  = number_format($TotalAprobada, 2, '.', ',');
        $TotalEnEsperaDePago  = number_format($TotalEnEsperaDePago, 2, '.', ',');
      $row = "<div class=\"row\">
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Proyectos </p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalGral </p>
                      <p class=\"text-1x mar-no text-thin\">$contadorPoyectos</p>
                    </div>
              </div>
              $row_col1
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Provisionada</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalProvisionada</p>
                      <p class=\"text-1x mar-no text-thin\">$contadorPoyectos</p>
                    </div>
              </div>
              <div id=\"divProvisionada\">$row_col2</div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Elaborada</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalElaborada</p>
                      <p class=\"text-1x mar-no text-thin\">$contadorPoyectos</p>
                    </div>
              </div>
              $row_col3
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Recibida</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalRecibida</p>
                      <p class=\"text-1x mar-no text-thin\">$contadorPoyectos</p>
                    </div>
              </div>
              $row_col4
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Aprobada</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalAprobada</p>
                      <p class=\"text-1x mar-no text-thin\">$contadorPoyectos</p>
                    </div>
              </div>
              $row_col5
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Es. de pago</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalEnEsperaDePago</p>
                      <p class=\"text-1x mar-no text-thin\">$contadorPoyectos</p>
                    </div>
              </div>
              $row_col6
          </div>

      </div>";
                  return  $row;
    }


}
 ?>
