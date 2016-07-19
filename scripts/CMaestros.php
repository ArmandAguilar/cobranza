<?php
class Maestro extends poolConnecion
{

   function guardar_maestro($info)
    {
        $NumMaestro=$info->NumMaestro;
        $NomMaestro=$info->NomMaestro;
       $d=date(d);
       $m=date(m);
       $y=date(y);
       $H=date(H);
       $M=date(i);
       $S=date(s);

        $Sql="INSERT INTO [SAP].[dbo].[ProyectoMaestro] VALUES ('$NumMaestro','$NomMaestro','0' ,'-','-','-' ,'-' ,'-' ,'-','-' ,'-','-','0' ,'0','$y-$m-$y $H:$M:$S','1')";
        $obj = new poolConnecion();
        $con=$obj->ConexionSQLSAP();
        $RSet=$obj->QuerySQLSAP($Sql,$con);
        $obj->CerrarSQLSAP($RSet,$con);


        return $Sql;
    }
   function guardar_relacion($info)
    {
        $Proyecto=$info->NoProyecto;
        $NumMaestro=$info->NumMaestro;
        $Sql2="INSERT INTO [SAP].[dbo].[RelacionMaestrosEsclavos] VALUES ('$NumMaestro' ,'$Proyecto','-')";
        $obj = new poolConnecion();
        $con=$obj->ConexionSQLSAP();
        $RSet=$obj->QuerySQLSAP($Sql2,$con);
        $obj->CerrarSQLSAP($RSet,$con);
        return $Sql2;

    }

}
?>
