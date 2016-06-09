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
      $Fecha="$d/$m/$y"
      $Comentario=$info->Comentario;
      #Obtenemos el IdEmpresa de presupuestos
      $objBlog = new poolConnecion();
      $Sql="INSERT INTO [SAP].[dbo].[AABlogCobranza] VALUES ('$Factura','$NoProyecto','$Usuario','$Fecha','$Comentario')";
      $con=$objBlog->ConexionSQLSAP();
      $RSet=$objBlog->QuerySQLSAP($Sql,$con);
       $objBlog->CerrarSQLSAP($RSet,$con);
       return $Sql;
    }
}

?>
