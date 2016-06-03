<?php

class panel extends poolConnecion
{

  function enbudo()
    {


      $objPaso1 = new poolConnecion();
      $Sql="SELECT [ImporteFinal]   FROM [SAP].[dbo].[RVEdoCtaGeneral]";
      $con=$objPaso1->ConexionSQLSAP();
      $RSet=$objPaso1->QuerySQLSAP($Sql,$con);
       while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
             {
               $ImporteFinal = number_format($fila[ImporteFinal], 2, ',', '.');
               $row_col1.= "<div class=\"row\">
                               <div class=\"col-lg-*\">
                                 <div class=\"panel panel-pink panel-colorful\">
                                        <div class=\"pad-all media\">
                                          <div class=\"media-left\">
                                            <span class=\"icon-wrap icon-wrap-xs\">
                                              <i class=\"fa fa-dollar fa-fw fa-2x\"></i>
                                            </span>
                                          </div>
                                          <div class=\"media-body\">
                                            <a href=\"detail_view.html\"><p class=\"h3 text-thin media-heading\">$fila[ImporteFinal]</p></a>
                                            <small class=\"text-uppercase\">Earning</small>
                                          </div>
                                        </div>
                                        <div class=\"progress progress-xs progress-dark-base mar-no\">
                                          <div style=\"width: 37.4%\" class=\"progress-bar progress-bar-light\" aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"37.4\" role=\"progressbar\"></div>
                                        </div>
                                        <div class=\"pad-all text-right\">
                                          <small><span class=\"text-semibold\"><i class=\"fa fa-dollar fa-fw\"></i> 22,675</span> Total Earning</small>
                                        </div>
                                  </div>
                               </div>
                           </div>";

              }
       $objPaso1->CerrarSQLSAP($RSet,$con);
      $row = "<div class=\"row\">
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-2x mar-no text-thin\">Paso 1</p>
                    </div>
              </div>
              $row_col1
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-2x mar-no text-thin\">Paso 2</p>
                    </div>
              </div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-2x mar-no text-thin\">Paso 3</p>
                    </div>
              </div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-2x mar-no text-thin\">Paso 4</p>
                    </div>
              </div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-2x mar-no text-thin\">Paso 5</p>
                    </div>
              </div>
          </div>
          <div class=\"col-sm-2\">
            <div class=\"panel panel-dark panel-colorful media pad-all\">
                    <div class=\"media-body\">
                      <p class=\"text-2x mar-no text-thin\">Paso 6</p>
                    </div>
              </div>
          </div>
      </div>";


                  return  $row;
    }

}
 ?>
