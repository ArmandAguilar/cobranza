<?php

class panel extends poolConnecion
{

  function enbudo()
    {

      #Paso 1
      $objPaso1 = new poolConnecion();
      $Sql="SELECT [NumProyecto],[NomProyecto],[ImporteFinal]  FROM [SAP].[dbo].[RVEdoCtaGeneral]";
      $con=$objPaso1->ConexionSQLSAP();
      $RSet=$objPaso1->QuerySQLSAP($Sql,$con);
       while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
             {
               $ImporteFinal = number_format($fila[ImporteFinal], 2, '.', ',');
               if(!empty($fila[NumProyecto]))
               {
                 $row_col1.= "<div class=\"row\">
                                 <div class=\"col-lg-*\">
                                   <div class=\"panel panel-purple panel-colorful\">
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
       $objPaso2 = new poolConnecion();
       $Sql="SELECT [NumProyecto],[NomProyecto],[MontoCIVA] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Provisionada'";
       $con=$objPaso2->ConexionSQLSAP();
       $RSet=$objPaso2->QuerySQLSAP($Sql,$con);
        while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
              {
                 $MontoCIVA = number_format($fila[MontoCIVA], 2, '.', ',');
                 if(!empty($fila[NumProyecto]))
                 {
                    $row_col2.= "<div class=\"row\">
                                    <div class=\"col-lg-*\">
                                      <div class=\"panel panel-purple panel-colorful\">
                                             <div class=\"pad-all media\">
                                               <div class=\"media-left\">
                                                 <span class=\"icon-wrap icon-wrap-xs\">
                                                   <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                 </span>
                                               </div>
                                               <div class=\"media-body\">
                                                 <p class=\"h4 text-thin media-heading\">$MontoCIVA</p>
                                                 <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                               </div>
                                             </div>

                                       </div>
                                    </div>
                                </div>";
                }
               }
        $objPaso2->CerrarSQLSAP($RSet,$con);
        #Paso 3
        $objPaso3 = new poolConnecion();
        $Sql="SELECT [NumProyecto],[NomProyecto],[MontoCIVA] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Elaborada'";
        $con=$objPaso3->ConexionSQLSAP();
        $RSet=$objPaso3->QuerySQLSAP($Sql,$con);
         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
               {
                  $MontoCIVA = number_format($fila[MontoCIVA], 2, '.', ',');
                  if(!empty($fila[NumProyecto]))
                  {
                     $row_col3.= "<div class=\"row\">
                                     <div class=\"col-lg-*\">
                                       <div class=\"panel panel-purple panel-colorful\">
                                              <div class=\"pad-all media\">
                                                <div class=\"media-left\">
                                                  <span class=\"icon-wrap icon-wrap-xs\">
                                                    <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                  </span>
                                                </div>
                                                <div class=\"media-body\">
                                                  <p class=\"h4 text-thin media-heading\">$MontoCIVA</p>
                                                  <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                </div>
                                              </div>

                                        </div>
                                     </div>
                                 </div>";
                 }
                }
         $objPaso3->CerrarSQLSAP($RSet,$con);
         #Paso 4
         $objPaso4 = new poolConnecion();
         $Sql="SELECT [NumProyecto],[NomProyecto],[MontoCIVA] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='Recivida'";
         $con=$objPaso4->ConexionSQLSAP();
         $RSet=$objPaso4->QuerySQLSAP($Sql,$con);
          while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                {
                   $MontoCIVA = number_format($fila[MontoCIVA], 2, '.', ',');
                   if(!empty($fila[NumProyecto]))
                   {
                      $row_col4.= "<div class=\"row\">
                                      <div class=\"col-lg-*\">
                                        <div class=\"panel panel-purple panel-colorful\">
                                               <div class=\"pad-all media\">
                                                 <div class=\"media-left\">
                                                   <span class=\"icon-wrap icon-wrap-xs\">
                                                     <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                   </span>
                                                 </div>
                                                 <div class=\"media-body\">
                                                   <p class=\"h4 text-thin media-heading\">$MontoCIVA</p>
                                                   <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                 </div>
                                               </div>

                                         </div>
                                      </div>
                                  </div>";
                  }
                 }
          $objPaso4->CerrarSQLSAP($RSet,$con);
          #Paso 5
          $objPaso5 = new poolConnecion();
          $Sql="SELECT [NumProyecto],[NomProyecto],[MontoCIVA] FROM [SAP].[dbo].[EstadoDeFacturasActivasxCobrar] Where Estatus='EnEsperaDePago'";
          $con=$objPaso5->ConexionSQLSAP();
          $RSet=$objPaso5->QuerySQLSAP($Sql,$con);
           while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                 {
                    $MontoCIVA = number_format($fila[MontoCIVA], 2, '.', ',');
                    if(!empty($fila[NumProyecto]))
                    {
                       $row_col5.= "<div class=\"row\">
                                       <div class=\"col-lg-*\">
                                         <div class=\"panel panel-purple panel-colorful\">
                                                <div class=\"pad-all media\">
                                                  <div class=\"media-left\">
                                                    <span class=\"icon-wrap icon-wrap-xs\">
                                                      <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                                    </span>
                                                  </div>
                                                  <div class=\"media-body\">
                                                    <p class=\"h4 text-thin media-heading\">$MontoCIVA</p>
                                                    <small class=\"text-uppercase\">$fila[NumProyecto] .- $fila[NomProyecto]</small>
                                                  </div>
                                                </div>

                                          </div>
                                       </div>
                                   </div>";
                   }
                  }
           $objPaso5->CerrarSQLSAP($RSet,$con);
      $row = "<div class=\"row\">
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Proyectos</p>
                    </div>
              </div>
              $row_col1
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Provisionada</p>
                    </div>
              </div>
              $row_col2
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Elaborada</p>
                    </div>
              </div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Recibida</p>
                    </div>
              </div>
              $row_col3
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Aprovada</p>
                    </div>
              </div>
              $row_col4
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-1x mar-no text-thin\">Espera de pago</p>
                    </div>
              </div>
              $row_col5
          </div>
      </div>";
                  return  $row;
    }


}
 ?>
