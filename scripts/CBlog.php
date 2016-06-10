<?php
ini_set('session.auto_start()','On');
session_start();
class blog extends poolConnecion
{
    function insert_blog($info)
    {
      $Factura=$info->Factura;
      $NoProyecto=$info->NoProyecto;
      $Usuario=$info->Usuario;
      $IdUsuario=$_SESSION[IdUsuario];
      $d=date(d);
      $m=date(m);
      $y=date(Y);
      $Fecha="$d/$m/$y";
      $Comentario=$info->Comentario;
      #Obtenemos el IdEmpresa de presupuestos
      $objBlog = new poolConnecion();
      $Sql="INSERT INTO [SAP].[dbo].[AACobranzaBlog] VALUES ('$Factura','$NoProyecto','$Usuario','$Fecha','$Comentario','$IdUsuario')";
      $con=$objBlog->ConexionSQLSAP();
      $RSet=$objBlog->QuerySQLSAP($Sql,$con);
       $objBlog->CerrarSQLSAP($RSet,$con);
       return $Sql;
    }
    function avatar($Id)
    {
          #Obtenemos el avatar
          $objAvatar = new poolConnecion();
          $Sql="SELECT Avatar FROM [SAP].[dbo].[Usuarios] Where Id='$Id'";
          $con=$objAvatar->ConexionSQLNorthwind();
          $RSet=$objAvatar->QuerySQLNorthwind($Sql,$con);
           while($filaA=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                 {
                    $Av = $filaA[Avatar];
                 }
          return $Av;


    }
    function linea_tiempo($Factura)
    {
                    $TimeLine = "<div class=\"timeline-header\">
                                      <div class=\"timeline-header-title bg-info\">Ahora</div>
                                    </div>";
                      #Obtenemos los blogs
                      $objTimeLine = new poolConnecion();
                      $Sql="SELECT * FROM [SAP].[dbo].[AACobranzaBlog] Where Factura='$Factura'";
                      $con=$objTimeLine->ConexionSQLSAP();
                      $RSet=$objTimeLine->QuerySQLSAP($Sql,$con);
                       while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                             {

                                $Mensaje = $fila[Mensaje];
                                $Usuario = $fila[Usuarios];
                                $Fecha = $fila[Fecha];
                                $IdUsuario = $fila[IdUsuario];
                                $Avatar = this->avatar($IdUsuario);
                                 $TimeLine .= "<div class=\"timeline-entry\">
                                                   <div class=\"timeline-stat\">
                                                     <div class=\"timeline-icon\"><img src=\"$Avatar\" alt=\"$Usuario\">
                                                     </div>
                                                     <div class=\"timeline-time\">$Fecha</div>
                                                   </div>
                                                   <div class=\"timeline-label\">
                                                     <p>$Mensaje</p>
                                                   </div>
                                                 </div>";
                             }
                       $objTimeLine->CerrarSQLSAP($RSet,$con);

        return $TimeLine;
    }
}

?>
