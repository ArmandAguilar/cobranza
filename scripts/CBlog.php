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
    function linea_tiempo()
    {
      $TimeLine = "<div class=\"timeline-header\">
                        <div class=\"timeline-header-title bg-info\">Ahora</div>
                      </div>";

      $TimeLine .= "<div class=\"timeline-entry\">
                        <div class=\"timeline-stat\">
                          <div class=\"timeline-iconº"><img src=\"https://lh3.googleusercontent.com/H5-LYU_c351B_sG6gZD4v6kGzsgBMkeN9xTMuOW2QO5oujgvi3ir8zDNTJX13oE-5XpKvx7aTw=w5120-h3200-rw-no\" alt=\"Profile picture\">
                          </div>
                          <div class=\"timeline-time\">2 Hours ago</div>
                        </div>
                        <div class=\"timeline-label\">
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                        </div>
                      </div>";
        return $TimeLine;              
    }
}

?>
