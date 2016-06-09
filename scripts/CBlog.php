<?php

class blog extends poolConnecion
{
    function insert_blog($info)
    {
      $Factura=$info->Factura;
      $NoProyecto=$info->NoProyecto;
      $Usuario=$info->Usuario;
      $d=date(d);
      $m=date(m);
      $y=date(Y);
      $Fecha="$d/$m/$y";
      $Comentario=$info->Comentario;
      #Obtenemos el IdEmpresa de presupuestos
      $objBlog = new poolConnecion();
      $Sql="INSERT INTO [SAP].[dbo].[AACobranzaBlog] VALUES ('$Factura','$NoProyecto','$Usuario','$Fecha','$Comentario')";
      $con=$objBlog->ConexionSQLSAP();
      $RSet=$objBlog->QuerySQLSAP($Sql,$con);
       $objBlog->CerrarSQLSAP($RSet,$con);
       return $Sql;
    }
    function linea_tiempo($Factura)
    {
                    $TimeLine = "<div class=\"timeline-header\">
                                      <div class=\"timeline-header-title bg-info\">Ahora</div>
                                    </div>";
                      #Obtenemos el IdEmpresa de presupuestos
                      $objTimeLine = new poolConnecion();
                      $Sql="SELECT * FROM [SAP].[dbo].[AACobranzaBlog] Where Factura='$Factura'";
                      $con=$objTimeLine->ConexionSQLSAP();
                      $RSet=$objTimeLine->QuerySQLSAP($Sql,$con);
                       while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                             {

                                 $TimeLine .= "<div class=\"timeline-entry\">
                                                   <div class=\"timeline-stat\">
                                                     <div class=\"timeline-icon\"><img src=\"https://lh3.googleusercontent.com/H5-LYU_c351B_sG6gZD4v6kGzsgBMkeN9xTMuOW2QO5oujgvi3ir8zDNTJX13oE-5XpKvx7aTw=w5120-h3200-rw-no\" alt=\"$fila[Usuario]\">
                                                     </div>
                                                     <div class=\"timeline-time\">$fila[Fecha]</div>
                                                   </div>
                                                   <div class=\"timeline-label\">
                                                     <p>$fila[Mensaje]</p>
                                                   </div>
                                                 </div>";
                             }
                       $objTimeLine->CerrarSQLSAP($RSet,$con);

        return $TimeLine;
    }
}

?>
