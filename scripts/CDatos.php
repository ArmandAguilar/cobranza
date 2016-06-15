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

                     $row_col1.= "<div class=\"row\" onclick="load_add_factura($fila[NumProyecto])">
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
       $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Provisionada'";
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
                       $Fecha = $fila[FechaPago];
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
                                                     <small class=\"text-thin\">$Fecha</small>
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
        $ContadorElaborada = 0;
        $objPaso3 = new poolConnecion();
        $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Elaborada'";
        $con=$objPaso3->ConexionSQLSAP();
        $RSet=$objPaso3->QuerySQLSAP($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {

                      if(!empty($fila[NumProyecto]))
                      {
                        $Importe = number_format($fila[Importe], 2, '.', ',');
                        $TotalElaborada += $fila[Importe];
                        $Proyecto =  substr($fila[NomProyecto], 0, 15);
                        $ContadorElaborada ++;
                        $Fecha = $fila[FechaPago];
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
                                                      <small class=\"text-thin\">$Fecha</small>
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
         $ContadorRecibida = 0;
         $objPaso4 = new poolConnecion();
         $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago  FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Recibida'";
         $con=$objPaso4->ConexionSQLSAP();
         $RSet=$objPaso4->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {

                         if(!empty($fila[NumProyecto]))
                         {
                           $Importe = number_format($fila[Importe], 2, '.', ',');
                           $TotalRecibida += $fila[Importe];
                           $Proyecto =  substr($fila[NomProyecto], 0, 15);
                           $ContadorRecibida ++;
                           $Fecha = $fila[FechaPago];
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
                                                         <small class=\"text-thin\">$Fecha</small>
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
          $ContadorAprobada = 0;
          $objPaso5 = new poolConnecion();
          $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago  FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Aprobada'";
          $con=$objPaso5->ConexionSQLSAP();
          $RSet=$objPaso5->QuerySQLSAP($Sql,$con);
           while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                 {

                        if(!empty($fila[NumProyecto]))
                        {
                          $Importe = number_format($fila[Importe], 2, '.', ',');
                          $TotalAprobada += $fila[Importe];
                          $Proyecto =  substr($fila[NomProyecto], 0, 15);
                          $ContadorAprobada ++;
                          $Fecha = $fila[FechaPago];
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
                                                        <small class=\"text-thin\">$Fecha</small>
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
           $ContadorEnEsperaDePago = 0;
           $objPaso6 = new poolConnecion();
           $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago  FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='EnEsperaDePago'";
           $con=$objPaso6->ConexionSQLSAP();
           $RSet=$objPaso6->QuerySQLSAP($Sql,$con);
            while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                  {

                         if(!empty($fila[NumProyecto]))
                         {
                           $Importe = number_format($fila[Importe], 2, '.', ',');
                           $TotalEnEsperaDePago += $fila[Importe];
                           $Proyecto =  substr($fila[NomProyecto], 0, 15);
                           $ContadorEnEsperaDePago ++;
                           $Fecha = $fila[FechaPago];
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
                                                         <small class=\"text-thin\">$Fecha</small>
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
                      <p class=\"text-1x mar-no text-thin\">Proyectos ($contadorPoyectos)</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalGral </p>

                    </div>
              </div>
              $row_col1
          </div>
          <div class=\"col-sm-2\" >
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\"  onclick=\"order('Provisionada');\" style=\"cursor:pointer\">
                      <p class=\"text-1x mar-no text-thin\">Provisionada ($ContadorProvisionada)</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalProvisionada</p>
                      <input type=\"hidden\" name=\"txthProvisionadaOrder\" id=\"txthProvisionadaOrder\" value=\"asc\">
                    </div>
              </div>
              <div id=\"divcol2L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
              <div id=\"divcolProvisionada\">$row_col2</div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\"  onclick=\"order('Elaborada');\" style=\"cursor:pointer\">
                      <p class=\"text-1x mar-no text-thin\">Elaborada ($ContadorElaborada)</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalElaborada</p>
                      <input type=\"hidden\" name=\"txthElaboradaOrder\" id=\"txthElaboradaOrder\" value=\"asc\">
                    </div>
              </div>
              <div id=\"divcol3L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
              <div id=\"divcolElaborada\">$row_col3</div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\"  onclick=\"order('Recibida');\" style=\"cursor:pointer\">
                      <p class=\"text-1x mar-no text-thin\">Recibida ($ContadorRecibida)</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalRecibida</p>
                      <input type=\"hidden\" name=\"txthRecibidaOrder\" id=\"txthRecibidaOrder\" value=\"asc\">
                    </div>
              </div>
              <div id=\"divcol4L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
              <div id=\"divcolRecibida\">$row_col4</div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\"  onclick=\"order('Aprobada');\" style=\"cursor:pointer\">
                      <p class=\"text-1x mar-no text-thin\">Aprobada ($ContadorAprobada)</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalAprobada</p>
                      <input type=\"hidden\" name=\"txthAprobadaOrder\" id=\"txthAprobadaOrder\" value=\"asc\">
                    </div>
              </div>
              <div id=\"divcol5L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
              <div id=\"divcolAprobada\">$row_col5</div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\"  onclick=\"order('EnEsperaDePago');\" style=\"cursor:pointer\">
                      <p class=\"text-1x mar-no text-thin\">Es. de pago ($ContadorEnEsperaDePago)</p>
                      <p class=\"text-1x mar-no text-thin\">$ $TotalEnEsperaDePago</p>
                      <input type=\"hidden\" name=\"txthEsdepagoOrder\" id=\"txthEsdepagoOrder\" value=\"asc\">
                    </div>
              </div>
              <div id=\"divcol6L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
              <div id=\"divcolEnEsperaDePago\">$row_col6</div>
          </div>

      </div>";
                  return  $row;
    }
  function filtro_estado($Edo,$Orden)
      {
                  #Paso Filtro
                  $Importe = 0;
                  $ContadorProvisionada = 0;
                  $objPasoEdo = new poolConnecion();
                  $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='$Edo' order by  FechaPago $Orden";
                  $con=$objPasoEdo->ConexionSQLSAP();
                  $RSet=$objPasoEdo->QuerySQLSAP($Sql,$con);
                   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                         {

                                if(!empty($fila[NumProyecto]))
                                {
                                  $Importe = number_format($fila[Importe], 2, '.', ',');
                                  $TotalProvisionada += $fila[Importe];
                                  $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                  $ContadorProvisionada ++;
                                  $Fecha = $fila[FechaPago];
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
                                                                <small class=\"text-thin\">$Fecha</small>
                                                              </div>
                                                            </div>

                                                      </div>
                                                   </div>
                                               </div>";
                               }
                          }
                   $objPasoEdo->CerrarSQLSAP($RSet,$con);
                   return $row_col2;
      }

}
 ?>
