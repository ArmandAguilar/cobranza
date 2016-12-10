<?php

class panel extends poolConnecion
{

  function primera_columna($info)
  {
          #buscamo todos los años para formar los cuadros
          $WhereRVEdoCtaGeneral = "";
          $WhereRVEdoCtaGeneralYear = "";
          $ListaOR = "";
          $IdUser = $info->IdUser;
          $Perfil = $info->Perfil ;
          if($IdUser>0)
          {
                $WhereRVEdoCtaGeneralYear = " Where [LP] = '$IdUser'";
                $WhereRVEdoCtaGeneral = " and [LP] = '$IdUser'";

                $objListaDeProyectos = new poolConnecion();
                $SqlListaProyectos="SELECT [NumProyecto] FROM [SAP].[dbo].[RelacionMaestrosEsclavos] Where [LP]='$IdUser'";
                $con=$objListaDeProyectos->ConexionSQLSAP();
                $RSet=$objListaDeProyectos->QuerySQLSAP($SqlListaProyectos,$con);
                 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                       {
                         $Proy = $fila[NumProyecto];
                         $ListaOR .= "NumProyecto='$Proy' or ";
                       }
                $objListaDeProyectos->CerrarSQLSAP($RSet,$con);
                $ListaOR = substr($ListaOR, 0, -3);
                $BuscarListaWhere = "Where $ListaOR";

          }
          $i = 0;
          $objYears = new poolConnecion();
          $SqlYear="SELECT DISTINCT Years FROM [SAP].[dbo].[RVEdoCtaGeneral] $WhereRVEdoCtaGeneralYear order by Years desc";
          $con=$objYears->ConexionSQLSAP();
          $RSet=$objYears->QuerySQLSAP($SqlYear,$con);
           while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                 {
                      $array[$i] = $fila[Years];
                      $i++;
                 }
          $objYears->CerrarSQLSAP($RSet,$con);
          foreach ($array as $key => $value)
           {
                  if (!empty($value))
                  {
                                  $contadorPoyectosYears = 0;
                                  $objForYear = new poolConnecion();
                                  $Sql="SELECT [NumProyecto],[NomProyecto],[Cuentas por facturar AIVA]  As ImporteFinal FROM [SAP].[dbo].[RVEdoCtaGeneral] Where Years = '$value' $WhereRVEdoCtaGeneral";
                                  $con=$objForYear->ConexionSQLSAP();
                                  $RSet=$objForYear->QuerySQLSAP($Sql,$con);
                                   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                         {
                                                     if(!empty($fila[NumProyecto]))
                                                     {
                                                       $ImporteFinalYears = number_format($fila[ImporteFinal], 2, '.', ',');
                                                       $TotalGralYears += $fila[ImporteFinal];
                                                       $TotalGral += $fila[ImporteFinal];
                                                       $contadorPoyectos ++;
                                                       $contadorPoyectosYears ++;

                                                          $row_col1.= "<div class=\"row\" onclick=\"load_add_factura($fila[NumProyecto])\" style=\"cursor:pointer\">
                                                                          <div class=\"col-lg-*\">
                                                                            <div class=\"panel panel-warning panel-colorful\">
                                                                                   <div class=\"pad-all media\">
                                                                                     <div class=\"media-left\">
                                                                                       <span class=\"icon-wrap icon-wrap-xs\">
                                                                                         <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                       </span>
                                                                                     </div>
                                                                                     <div class=\"media-body\">
                                                                                       <p class=\"h4 text-thin media-heading\">$ImporteFinalYears</p>
                                                                                       <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                                                     </div>
                                                                                   </div>

                                                                             </div>
                                                                          </div>
                                                                      </div>";
                                                     }
                                         }
                                  $objForYear->CerrarSQLSAP($RSet,$con);
                                  $TotalGralYearsF = number_format($TotalGralYears, 2, '.', ',');
                                  $rowFinal .="<div class=\"panel panel-dark panel-colorful media pad-all\">
                                                    <div class=\"media-body\">
                                                        <p class=\"text-1x mar-no text-thin\">Proyectos ($contadorPoyectosYears) - $value</p>
                                                        <p class=\"text-1x mar-no text-thin\">$ $TotalGralYearsF </p>
                                                    </div>
                                              </div>
                                              $row_col1";
                                  $row_col1 ="";
                  }
           }
           #Super modificacion
           $ImporteProvisionada = 0;
           $ContadorProvisionada = 0;
           $TotalProvisionada = 0;
           $ImporteElaborada = 0;
           $TotalElaborada = 0;
           $ContadorElaborada = 0;
           $ImporteRecibida = 0;
           $TotalRecibida = 0;
           $ContadorRecibida = 0;
           $ImporteAprobada = 0;
           $TotalAprobada = 0;
           $ContadorAprobada = 0;
           $ImporteEnEsperaDePago = 0;
           $TotalEnEsperaDePago = 0;
           $ContadorEnEsperaDePago = 0;
           $objPaso2 = new poolConnecion();
           $colorFill =  "panel-primary";
           $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago,[Estatus],DATEDIFF(dd, [Fecha TENTATIVA de pago], GetDate())  As DiasTrascurridos FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] $BuscarListaWhere  order by [Fecha TENTATIVA de pago] asc";
           $con=$objPaso2->ConexionSQLSAP();
           $RSet=$objPaso2->QuerySQLSAP($Sql,$con);
            while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                  {
                          if(!empty($fila[NumProyecto]))
                          {
                               $DiasTrascurridos = $fila[DiasTrascurridos];
                               if ($DiasTrascurridos>0) {
                                 $colorFill =  "panel-danger";
                               }
                               else {
                                 $colorFill =  "panel-primary";
                               }
                               $Estatus = $fila[Estatus];
                               switch ($Estatus) {
                                 case 'Provisionada':
                                                     $ImporteProvisionada = number_format($fila[Importe], 2, '.', ',');
                                                     $TotalProvisionada += $fila[Importe];
                                                     $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                     $ContadorProvisionada ++;
                                                     $Fecha = $fila[FechaPago];
                                                     $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                     $row_col2New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteProvisionada','Provisionada');\" style=\"cursor:pointer\">
                                                                     <div class=\"col-lg-*\">
                                                                       <div class=\"panel $colorFill panel-colorful\">
                                                                              <div class=\"pad-all media\">
                                                                                <div class=\"media-left\">
                                                                                  <span class=\"icon-wrap icon-wrap-xs\">
                                                                                    <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                  </span>
                                                                                </div>
                                                                                <div class=\"media-body\">
                                                                                  <p class=\"h4 text-thin media-heading\">$ImporteProvisionada</p>
                                                                                  <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                                                  <small class=\"text-thin\">$Fecha</small>
                                                                                </div>
                                                                              </div>

                                                                        </div>
                                                                     </div>
                                                                 </div>";
                                   break;
                                   case 'Elaborada':

                                                       $ImporteElaborada = number_format($fila[Importe], 2, '.', ',');
                                                       $TotalElaborada += $fila[Importe];
                                                       $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                       $ContadorElaborada ++;
                                                       $Fecha = $fila[FechaPago];
                                                       $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                        $row_col3New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteElaborada','Elaborada');\" style=\"cursor:pointer\">
                                                                        <div class=\"col-lg-*\">
                                                                          <div class=\"panel $colorFill panel-colorful\">
                                                                                 <div class=\"pad-all media\">
                                                                                   <div class=\"media-left\">
                                                                                     <span class=\"icon-wrap icon-wrap-xs\">
                                                                                       <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                     </span>
                                                                                   </div>
                                                                                   <div class=\"media-body\">
                                                                                     <p class=\"h4 text-thin media-heading\">$ImporteElaborada</p>
                                                                                     <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                                                     <small class=\"text-thin\">$Fecha</small>
                                                                                   </div>
                                                                                 </div>

                                                                           </div>
                                                                        </div>
                                                                    </div>";
                                     break;
                                   case 'Recibida':

                                                   $ImporteRecibida = number_format($fila[Importe], 2, '.', ',');
                                                   $TotalRecibida += $fila[Importe];
                                                   $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                   $ContadorRecibida ++;
                                                   $Fecha = $fila[FechaPago];
                                                   $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                    $row_col4New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteRecibida','Recibida');\" style=\"cursor:pointer\">
                                                                    <div class=\"col-lg-*\">
                                                                      <div class=\"panel $colorFill panel-colorful\">
                                                                             <div class=\"pad-all media\">
                                                                               <div class=\"media-left\">
                                                                                 <span class=\"icon-wrap icon-wrap-xs\">
                                                                                   <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                 </span>
                                                                               </div>
                                                                               <div class=\"media-body\">
                                                                                 <p class=\"h4 text-thin media-heading\">$ImporteRecibida</p>
                                                                                 <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                                                 <small class=\"text-thin\">$Fecha</small>
                                                                               </div>
                                                                             </div>

                                                                       </div>
                                                                    </div>
                                                                </div>";
                                     break;
                                   case 'Aprobada':

                                                 $ImporteAprobada = number_format($fila[Importe], 2, '.', ',');
                                                 $TotalAprobada += $fila[Importe];
                                                 $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                 $ContadorAprobada ++;
                                                 $Fecha = $fila[FechaPago];
                                                 $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                  $row_col5New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteAprobada','Aprobada');\" style=\"cursor:pointer\">
                                                                  <div class=\"col-lg-*\">
                                                                    <div class=\"panel $colorFill panel-colorful\">
                                                                           <div class=\"pad-all media\">
                                                                             <div class=\"media-left\">
                                                                               <span class=\"icon-wrap icon-wrap-xs\">
                                                                                 <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                               </span>
                                                                             </div>
                                                                             <div class=\"media-body\">
                                                                               <p class=\"h4 text-thin media-heading\">$ImporteAprobada</p>
                                                                               <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $NomProyecto</small>
                                                                               <small class=\"text-thin\">$Fecha</small>
                                                                             </div>
                                                                           </div>

                                                                     </div>
                                                                  </div>
                                                              </div>";
                                     break;
                                   case 'EnEsperaDePago':

                                                   $ImporteEnEsperaDePago = number_format($fila[Importe], 2, '.', ',');
                                                   $TotalEnEsperaDePago += $fila[Importe];
                                                   $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                   $ContadorEnEsperaDePago ++;
                                                   $Fecha = $fila[FechaPago];
                                                   $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                   if ($colorFill == "panel-primary") {
                                                         $colorFill="panel-success";
                                                   }
                                                    $row_col6New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteEnEsperaDePago','EnEsperaDePago');\" style=\"cursor:pointer\">
                                                                    <div class=\"col-lg-*\">
                                                                      <div class=\"panel $colorFill panel-colorful\">
                                                                             <div class=\"pad-all media\">
                                                                               <div class=\"media-left\">
                                                                                 <span class=\"icon-wrap icon-wrap-xs\">
                                                                                   <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                 </span>
                                                                               </div>
                                                                               <div class=\"media-body\">
                                                                                 <p class=\"h4 text-thin media-heading\">$ImporteEnEsperaDePago</p>
                                                                                 <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $NomProyecto</small>
                                                                                 <small class=\"text-thin\">$Fecha</small>
                                                                               </div>
                                                                             </div>

                                                                       </div>
                                                                    </div>
                                                                </div>";
                                     break;

                                 default:
                                   # code...
                                   break;
                               }
                           }

                   }
            $objPaso2->CerrarSQLSAP($RSet,$con);

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
                           <p class=\"text-1x mar-no text-thin\">$ $TotalGral</p>
                          <p class=\"text-1x mar-no text-thin\">Monto antes de iva</p>
                         </div>
                   </div>
                   $rowFinal
               </div>
               <div class=\"col-sm-2\" >
                 <div class=\"panel panel-dark panel-colorful media pad-all\">
                         <div class=\"media-body\"  onclick=\"order('Provisionada');\" style=\"cursor:pointer\">
                           <p class=\"text-1x mar-no text-thin\">Provisionada ($ContadorProvisionada)</p>
                           <p class=\"text-1x mar-no text-thin\">$ $TotalProvisionada</p>
                           <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                           <input type=\"hidden\" name=\"txthProvisionadaOrder\" id=\"txthProvisionadaOrder\" value=\"asc\">
                         </div>
                   </div>
                   <div id=\"divcol2L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                   <div id=\"divcolProvisionada\">$row_col2New</div>
               </div>
               <div class=\"col-sm-2\">
                 <div class=\"panel panel-dark panel-colorful media pad-all\">
                         <div class=\"media-body\"  onclick=\"order('Elaborada');\" style=\"cursor:pointer\">
                           <p class=\"text-1x mar-no text-thin\">Elaborada ($ContadorElaborada)</p>
                           <p class=\"text-1x mar-no text-thin\">$ $TotalElaborada</p>
                           <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                           <input type=\"hidden\" name=\"txthElaboradaOrder\" id=\"txthElaboradaOrder\" value=\"asc\">
                         </div>
                   </div>
                   <div id=\"divcol3L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                   <div id=\"divcolElaborada\">$row_col3New</div>
               </div>
               <div class=\"col-sm-2\">
                 <div class=\"panel panel-dark panel-colorful media pad-all\">
                         <div class=\"media-body\"  onclick=\"order('Recibida');\" style=\"cursor:pointer\">
                           <p class=\"text-1x mar-no text-thin\">Recibida ($ContadorRecibida)</p>
                           <p class=\"text-1x mar-no text-thin\">$ $TotalRecibida</p>
                           <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                           <input type=\"hidden\" name=\"txthRecibidaOrder\" id=\"txthRecibidaOrder\" value=\"asc\">
                         </div>
                   </div>
                   <div id=\"divcol4L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                   <div id=\"divcolRecibida\">$row_col4New</div>
               </div>
               <div class=\"col-sm-2\">
                 <div class=\"panel panel-dark panel-colorful media pad-all\">
                         <div class=\"media-body\"  onclick=\"order('Aprobada');\" style=\"cursor:pointer\">
                           <p class=\"text-1x mar-no text-thin\">Aprobada ($ContadorAprobada)</p>
                           <p class=\"text-1x mar-no text-thin\">$ $TotalAprobada</p>
                           <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                           <input type=\"hidden\" name=\"txthAprobadaOrder\" id=\"txthAprobadaOrder\" value=\"asc\">
                         </div>
                   </div>
                   <div id=\"divcol5L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                   <div id=\"divcolAprobada\">$row_col5New</div>
               </div>
               <div class=\"col-sm-2\">
                 <div class=\"panel panel-dark panel-colorful media pad-all\">
                         <div class=\"media-body\"  onclick=\"order('EnEsperaDePago');\" style=\"cursor:pointer\">
                           <p class=\"text-1x mar-no text-thin\">Es. de pago ($ContadorEnEsperaDePago)</p>
                           <p class=\"text-1x mar-no text-thin\">$ $TotalEnEsperaDePago</p>
                           <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                           <input type=\"hidden\" name=\"txthEsdepagoOrder\" id=\"txthEsdepagoOrder\" value=\"asc\">
                         </div>
                   </div>
                   <div id=\"divcol6L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                   <div id=\"divcolEnEsperaDePago\">$row_col6New</div>
               </div>

           </div>";
                       return $row;
   }
/* Segunda Columan */
function segunda_columna($info)
{
        #buscamo todos los años para formar los cuadros
        $WhereRVEdoCtaGeneral = "";
        $WhereRVEdoCtaGeneralYear = "";
        $ListaOR = "";
        $IdUser = $info->IdUser;
        $Perfil = $info->Perfil ;
        if($IdUser>0)
        {
              $WhereRVEdoCtaGeneralYear = " Where [LP] = '$IdUser'";
              $WhereRVEdoCtaGeneral = " and [LP] = '$IdUser'";

              $objListaDeProyectos = new poolConnecion();
              $SqlListaProyectos="SELECT [NumProyecto] FROM [SAP].[dbo].[RelacionMaestrosEsclavos] Where [LP]='$IdUser'";
              $con=$objListaDeProyectos->ConexionSQLSAP();
              $RSet=$objListaDeProyectos->QuerySQLSAP($SqlListaProyectos,$con);
               while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                     {
                       $Proy = $fila[NumProyecto];
                       $ListaOR .= "NumProyecto='$Proy' or ";
                     }
              $objListaDeProyectos->CerrarSQLSAP($RSet,$con);
              $ListaOR = substr($ListaOR, 0, -3);
              $BuscarListaWhere = "Where $ListaOR";

        }
        #Obtenemos Años para Proyectos
        $i = 0;

        $objYears = new poolConnecion();
        $SqlYear="SELECT DISTINCT Years FROM [SAP].[dbo].[RVEdoCtaGeneral] $WhereRVEdoCtaGeneralYear order by Years desc";
        $con=$objYears->ConexionSQLSAP();
        $RSet=$objYears->QuerySQLSAP($SqlYear,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {
                    $array[$i] = $fila[Years];
                    $i++;
               }
        $objYears->CerrarSQLSAP($RSet,$con);
        foreach ($array as $key => $value)
         {
                if (!empty($value))
                {
                                $contadorPoyectosYears = 0;
                                $objForYear = new poolConnecion();
                                $Sql="SELECT [NumProyecto],[NomProyecto],[Cuentas por facturar AIVA]  As ImporteFinal FROM [SAP].[dbo].[RVEdoCtaGeneral] Where Years = '$value' $WhereRVEdoCtaGeneral";
                                $con=$objForYear->ConexionSQLSAP();
                                $RSet=$objForYear->QuerySQLSAP($Sql,$con);
                                 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                       {
                                                   if(!empty($fila[NumProyecto]))
                                                   {
                                                     $ImporteFinalYears = number_format($fila[ImporteFinal], 2, '.', ',');
                                                     $TotalGralYears += $fila[ImporteFinal];
                                                     $TotalGral += $fila[ImporteFinal];
                                                     $contadorPoyectos ++;
                                                     $contadorPoyectosYears ++;

                                                        $row_col1.= "<div class=\"row\" onclick=\"load_add_factura($fila[NumProyecto])\" style=\"cursor:pointer\">
                                                                        <div class=\"col-lg-*\">
                                                                          <div class=\"panel panel-warning panel-colorful\">
                                                                                 <div class=\"pad-all media\">
                                                                                   <div class=\"media-left\">
                                                                                     <span class=\"icon-wrap icon-wrap-xs\">
                                                                                       <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                     </span>
                                                                                   </div>
                                                                                   <div class=\"media-body\">
                                                                                     <p class=\"h4 text-thin media-heading\">$ImporteFinalYears</p>
                                                                                     <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                                                   </div>
                                                                                 </div>

                                                                           </div>
                                                                        </div>
                                                                    </div>";
                                                   }
                                       }
                                $objForYear->CerrarSQLSAP($RSet,$con);
                                $TotalGralYearsF = number_format($TotalGralYears, 2, '.', ',');
                                $rowFinal .="<div class=\"panel panel-dark panel-colorful media pad-all\">
                                                  <div class=\"media-body\">
                                                      <p class=\"text-1x mar-no text-thin\">Proyectos ($contadorPoyectosYears) - $value</p>
                                                      <p class=\"text-1x mar-no text-thin\">$ $TotalGralYearsF </p>
                                                  </div>
                                            </div>
                                            $row_col1";
                                $row_col1 ="";
                }
         }
         /* Aqui Corremos otra vez los años para calcular los cuadros negros */
         #Buscamos años para provisondas
         $j = 0;
         $objYearsProvicion = new poolConnecion();
         $SqlYearP="SELECT  DISTINCT [Año Factura] As Year FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where ([Estatus] = 'Provisionada')";
         $con=$objYearsProvicion->ConexionSQLSAP();
         $RSet=$objYearsProvicion->QuerySQLSAP($SqlYearP,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                     $arrayYears[$i] = $fila[Years];
                     $i++;
                }
         $objYearsProvicion->CerrarSQLSAP($RSet,$con);

         foreach ($arrayYears as $key => $value)
          {
                 if (!empty($value))
                 {
                         $SqlProvicionadas="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago,[Estatus],DATEDIFF(dd, [Fecha TENTATIVA de pago], GetDate())  As DiasTrascurridos FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where ([Estatus] = 'Provisionada') and  ([Fecha TENTATIVA de pago] >= '01/01/$value' and [Fecha TENTATIVA de pago]<='31/12/$value') ";
                         $contadorPoyectosYears = 0;
                         $objForYear = new poolConnecion();
                         $con=$objForYear->ConexionSQLSAP();
                         $RSet=$objForYear->QuerySQLSAP($SqlProvicionadas,$con);
                          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                {
                                            if(!empty($fila[NumProyecto]))
                                            {
                                              $ImporteFinalYears = number_format($fila[Importe], 2, '.', ',');
                                              $TotalGralYears += $fila[Importe];
                                              $TotalGral += $fila[Importe];
                                              $contadorPoyectos ++;
                                              $contadorPoyectosYears ++;

                                                 $row_col2.= "<div class=\"row\" onclick=\"load_add_factura($fila[NumProyecto])\" style=\"cursor:pointer\">
                                                                 <div class=\"col-lg-*\">
                                                                   <div class=\"panel panel-blue panel-colorful\">
                                                                          <div class=\"pad-all media\">
                                                                            <div class=\"media-left\">
                                                                              <span class=\"icon-wrap icon-wrap-xs\">
                                                                                <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                              </span>
                                                                            </div>
                                                                            <div class=\"media-body\">
                                                                              <p class=\"h4 text-thin media-heading\">$ImporteFinalYears</p>
                                                                              <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                                            </div>
                                                                          </div>

                                                                    </div>
                                                                 </div>
                                                             </div>";
                                            }
                                }
                         $objForYear->CerrarSQLSAP($RSet,$con);
                         $TotalGralYearsF = number_format($TotalGralYears, 2, '.', ',');
                         $rowFinalProviciones .="<div class=\"panel panel-dark panel-colorful media pad-all\">
                                           <div class=\"media-body\">
                                               <p class=\"text-1x mar-no text-thin\">Proyectos ($contadorPoyectosYears) - $value</p>
                                               <p class=\"text-1x mar-no text-thin\">$ $TotalGralYearsF </p>
                                           </div>
                                     </div>
                                     $row_col2";
                         $row_col2 ="";
                 }
         }

         /*Aqui esta el flujo normal del script panel */
         #Super modificacion
         $ImporteProvisionada = 0;
         $ContadorProvisionada = 0;
         $TotalProvisionada = 0;
         $ImporteElaborada = 0;
         $TotalElaborada = 0;
         $ContadorElaborada = 0;
         $ImporteRecibida = 0;
         $TotalRecibida = 0;
         $ContadorRecibida = 0;
         $ImporteAprobada = 0;
         $TotalAprobada = 0;
         $ContadorAprobada = 0;
         $ImporteEnEsperaDePago = 0;
         $TotalEnEsperaDePago = 0;
         $ContadorEnEsperaDePago = 0;
         $objPaso2 = new poolConnecion();
         $colorFill =  "panel-primary";
         $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago,[Estatus],DATEDIFF(dd, [Fecha TENTATIVA de pago], GetDate())  As DiasTrascurridos FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] $BuscarListaWhere  order by [Fecha TENTATIVA de pago] asc";
         $con=$objPaso2->ConexionSQLSAP();
         $RSet=$objPaso2->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                        if(!empty($fila[NumProyecto]))
                        {
                             $DiasTrascurridos = $fila[DiasTrascurridos];
                             if ($DiasTrascurridos>0) {
                               $colorFill =  "panel-danger";
                             }
                             else {
                               $colorFill =  "panel-primary";
                             }
                             $Estatus = $fila[Estatus];
                             switch ($Estatus) {
                               case 'Provisionada':
                                                   $ImporteProvisionada = number_format($fila[Importe], 2, '.', ',');
                                                   $TotalProvisionada += $fila[Importe];
                                                   $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                   $ContadorProvisionada ++;
                                                   $Fecha = $fila[FechaPago];
                                                   $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                   $row_col2New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteProvisionada','Provisionada');\" style=\"cursor:pointer\">
                                                                   <div class=\"col-lg-*\">
                                                                     <div class=\"panel $colorFill panel-colorful\">
                                                                            <div class=\"pad-all media\">
                                                                              <div class=\"media-left\">
                                                                                <span class=\"icon-wrap icon-wrap-xs\">
                                                                                  <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                </span>
                                                                              </div>
                                                                              <div class=\"media-body\">
                                                                                <p class=\"h4 text-thin media-heading\">$ImporteProvisionada</p>
                                                                                <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                                                <small class=\"text-thin\">$Fecha</small>
                                                                              </div>
                                                                            </div>

                                                                      </div>
                                                                   </div>
                                                               </div>";
                                 break;
                                 case 'Elaborada':

                                                     $ImporteElaborada = number_format($fila[Importe], 2, '.', ',');
                                                     $TotalElaborada += $fila[Importe];
                                                     $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                     $ContadorElaborada ++;
                                                     $Fecha = $fila[FechaPago];
                                                     $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                      $row_col3New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteElaborada','Elaborada');\" style=\"cursor:pointer\">
                                                                      <div class=\"col-lg-*\">
                                                                        <div class=\"panel $colorFill panel-colorful\">
                                                                               <div class=\"pad-all media\">
                                                                                 <div class=\"media-left\">
                                                                                   <span class=\"icon-wrap icon-wrap-xs\">
                                                                                     <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                                   </span>
                                                                                 </div>
                                                                                 <div class=\"media-body\">
                                                                                   <p class=\"h4 text-thin media-heading\">$ImporteElaborada</p>
                                                                                   <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                                                   <small class=\"text-thin\">$Fecha</small>
                                                                                 </div>
                                                                               </div>

                                                                         </div>
                                                                      </div>
                                                                  </div>";
                                   break;
                                 case 'Recibida':

                                                 $ImporteRecibida = number_format($fila[Importe], 2, '.', ',');
                                                 $TotalRecibida += $fila[Importe];
                                                 $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                 $ContadorRecibida ++;
                                                 $Fecha = $fila[FechaPago];
                                                 $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                  $row_col4New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteRecibida','Recibida');\" style=\"cursor:pointer\">
                                                                  <div class=\"col-lg-*\">
                                                                    <div class=\"panel $colorFill panel-colorful\">
                                                                           <div class=\"pad-all media\">
                                                                             <div class=\"media-left\">
                                                                               <span class=\"icon-wrap icon-wrap-xs\">
                                                                                 <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                               </span>
                                                                             </div>
                                                                             <div class=\"media-body\">
                                                                               <p class=\"h4 text-thin media-heading\">$ImporteRecibida</p>
                                                                               <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $Proyecto</small>
                                                                               <small class=\"text-thin\">$Fecha</small>
                                                                             </div>
                                                                           </div>

                                                                     </div>
                                                                  </div>
                                                              </div>";
                                   break;
                                 case 'Aprobada':

                                               $ImporteAprobada = number_format($fila[Importe], 2, '.', ',');
                                               $TotalAprobada += $fila[Importe];
                                               $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                               $ContadorAprobada ++;
                                               $Fecha = $fila[FechaPago];
                                               $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                $row_col5New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteAprobada','Aprobada');\" style=\"cursor:pointer\">
                                                                <div class=\"col-lg-*\">
                                                                  <div class=\"panel $colorFill panel-colorful\">
                                                                         <div class=\"pad-all media\">
                                                                           <div class=\"media-left\">
                                                                             <span class=\"icon-wrap icon-wrap-xs\">
                                                                               <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                             </span>
                                                                           </div>
                                                                           <div class=\"media-body\">
                                                                             <p class=\"h4 text-thin media-heading\">$ImporteAprobada</p>
                                                                             <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $NomProyecto</small>
                                                                             <small class=\"text-thin\">$Fecha</small>
                                                                           </div>
                                                                         </div>

                                                                   </div>
                                                                </div>
                                                            </div>";
                                   break;
                                 case 'EnEsperaDePago':

                                                 $ImporteEnEsperaDePago = number_format($fila[Importe], 2, '.', ',');
                                                 $TotalEnEsperaDePago += $fila[Importe];
                                                 $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                                 $ContadorEnEsperaDePago ++;
                                                 $Fecha = $fila[FechaPago];
                                                 $NomProyecto=str_replace('"','', $fila[NomProyecto]);
                                                 if ($colorFill == "panel-primary") {
                                                       $colorFill="panel-success";
                                                 }
                                                  $row_col6New.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$NomProyecto','$ImporteEnEsperaDePago','EnEsperaDePago');\" style=\"cursor:pointer\">
                                                                  <div class=\"col-lg-*\">
                                                                    <div class=\"panel $colorFill panel-colorful\">
                                                                           <div class=\"pad-all media\">
                                                                             <div class=\"media-left\">
                                                                               <span class=\"icon-wrap icon-wrap-xs\">
                                                                                 <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                                               </span>
                                                                             </div>
                                                                             <div class=\"media-body\">
                                                                               <p class=\"h4 text-thin media-heading\">$ImporteEnEsperaDePago</p>
                                                                               <small class=\"text-uppercase\">($fila[FacturaForta]) $fila[NumProyecto] .- $NomProyecto</small>
                                                                               <small class=\"text-thin\">$Fecha</small>
                                                                             </div>
                                                                           </div>

                                                                     </div>
                                                                  </div>
                                                              </div>";
                                   break;

                               default:
                                 # code...
                                 break;
                             }
                         }

                 }
          $objPaso2->CerrarSQLSAP($RSet,$con);

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
                         <p class=\"text-1x mar-no text-thin\">$ $TotalGral</p>
                        <p class=\"text-1x mar-no text-thin\">Monto antes de iva</p>
                       </div>
                 </div>
                 $rowFinal
             </div>
             <div class=\"col-sm-2\" >
               <div class=\"panel panel-dark panel-colorful media pad-all\">
                       <div class=\"media-body\"  onclick=\"order('Provisionada');\" style=\"cursor:pointer\">
                         <p class=\"text-1x mar-no text-thin\">Provisionada ($ContadorProvisionada)</p>
                         <p class=\"text-1x mar-no text-thin\">$ $TotalProvisionada</p>
                         <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                         <input type=\"hidden\" name=\"txthProvisionadaOrder\" id=\"txthProvisionadaOrder\" value=\"asc\">
                       </div>
                 </div>
                 <div id=\"divcol2L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                 <div id=\"divcolProvisionada\">$row_col2New</div>
                 m $rowFinalProviciones m
             </div>
             <div class=\"col-sm-2\">
               <div class=\"panel panel-dark panel-colorful media pad-all\">
                       <div class=\"media-body\"  onclick=\"order('Elaborada');\" style=\"cursor:pointer\">
                         <p class=\"text-1x mar-no text-thin\">Elaborada ($ContadorElaborada)</p>
                         <p class=\"text-1x mar-no text-thin\">$ $TotalElaborada</p>
                         <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                         <input type=\"hidden\" name=\"txthElaboradaOrder\" id=\"txthElaboradaOrder\" value=\"asc\">
                       </div>
                 </div>
                 <div id=\"divcol3L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                 <div id=\"divcolElaborada\">$row_col3New</div>
             </div>
             <div class=\"col-sm-2\">
               <div class=\"panel panel-dark panel-colorful media pad-all\">
                       <div class=\"media-body\"  onclick=\"order('Recibida');\" style=\"cursor:pointer\">
                         <p class=\"text-1x mar-no text-thin\">Recibida ($ContadorRecibida)</p>
                         <p class=\"text-1x mar-no text-thin\">$ $TotalRecibida</p>
                         <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                         <input type=\"hidden\" name=\"txthRecibidaOrder\" id=\"txthRecibidaOrder\" value=\"asc\">
                       </div>
                 </div>
                 <div id=\"divcol4L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                 <div id=\"divcolRecibida\">$row_col4New</div>
             </div>
             <div class=\"col-sm-2\">
               <div class=\"panel panel-dark panel-colorful media pad-all\">
                       <div class=\"media-body\"  onclick=\"order('Aprobada');\" style=\"cursor:pointer\">
                         <p class=\"text-1x mar-no text-thin\">Aprobada ($ContadorAprobada)</p>
                         <p class=\"text-1x mar-no text-thin\">$ $TotalAprobada</p>
                         <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                         <input type=\"hidden\" name=\"txthAprobadaOrder\" id=\"txthAprobadaOrder\" value=\"asc\">
                       </div>
                 </div>
                 <div id=\"divcol5L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                 <div id=\"divcolAprobada\">$row_col5New</div>
             </div>
             <div class=\"col-sm-2\">
               <div class=\"panel panel-dark panel-colorful media pad-all\">
                       <div class=\"media-body\"  onclick=\"order('EnEsperaDePago');\" style=\"cursor:pointer\">
                         <p class=\"text-1x mar-no text-thin\">Es. de pago ($ContadorEnEsperaDePago)</p>
                         <p class=\"text-1x mar-no text-thin\">$ $TotalEnEsperaDePago</p>
                         <p class=\"text-1x mar-no text-thin\">&nbsp;</p>
                         <input type=\"hidden\" name=\"txthEsdepagoOrder\" id=\"txthEsdepagoOrder\" value=\"asc\">
                       </div>
                 </div>
                 <div id=\"divcol6L\" style=\"display:none\"><img src=\"img/load_col.gif\"/></div>
                 <div id=\"divcolEnEsperaDePago\">$row_col6New</div>
             </div>

         </div>";
                     return $row;
 }

/* end Segunda Columna */

  function filtro_estado($Edo,$Orden,$IdUser,$Perfil)
      {

                $ListaOR = "";
                  if($IdUser>0)
                  {
                    if ($Perfil ==  "Admin") {

                    }
                    else {
                              $WhereRVEdoCtaGeneralYear = " Where [LP] = '$IdUser'";
                              $WhereRVEdoCtaGeneral = " [LP] = '$IdUser'";

                              $objListaDeProyectos = new poolConnecion();
                              $SqlListaProyectos="SELECT [NumProyecto] FROM [SAP].[dbo].[RelacionMaestrosEsclavos] Where [LP]='$IdUser'";
                              $con=$objListaDeProyectos->ConexionSQLSAP();
                              $RSet=$objListaDeProyectos->QuerySQLSAP($SqlListaProyectos,$con);
                               while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                     {
                                       $Proy = $fila[NumProyecto];
                                       $ListaOR .= "NumProyecto='$Proy' or ";
                                     }
                              $objListaDeProyectos->CerrarSQLSAP($RSet,$con);
                              $ListaOR = substr($ListaOR, 0, -3);
                              $BuscarListaWhere = "And $ListaOR";
                        }
                  }
                  #Paso Filtro
                  $Importe = 0;
                  $ContadorProvisionada = 0;
                  $objPasoEdo = new poolConnecion();
                  $Sql="SELECT [NumProyecto],[NomProyecto],[FacturaForta],[MontoCIVA] As Importe,Convert(varchar(11),[Fecha TENTATIVA de pago]) As FechaPago,DATEDIFF(dd, [Fecha TENTATIVA de pago], GetDate())  As DiasTrascurridos FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='$Edo' $BuscarListaWhere order by  [Fecha TENTATIVA de pago] $Orden";
                  $con=$objPasoEdo->ConexionSQLSAP();
                  $RSet=$objPasoEdo->QuerySQLSAP($Sql,$con);
                   while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                         {

                                if(!empty($fila[NumProyecto]))
                                {
                                  $DiasTrascurridos = $fila[DiasTrascurridos];
                                  if ($DiasTrascurridos>0) {
                                    $colorFill =  "panel-danger";
                                  }
                                  else {
                                    $colorFill =  "panel-primary";
                                  }
                                  $Importe = number_format($fila[Importe], 2, '.', ',');
                                  $TotalProvisionada += $fila[Importe];
                                  $Proyecto =  substr($fila[NomProyecto], 0, 15);
                                  $ContadorProvisionada ++;
                                  $Fecha = $fila[FechaPago];
                                   $row_col2.= "<div class=\"row\" onclick=\"load_view('$fila[FacturaForta]','$fila[NumProyecto]','$fila[NomProyecto]','$Importe','Provisionada');\" style=\"cursor:pointer\">
                                                   <div class=\"col-lg-*\">
                                                     <div class=\"panel $colorFill panel-colorful\">
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
