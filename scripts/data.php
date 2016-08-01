<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/CDatos.php");
$obj =  new panel();

switch ($_GET[v]) {
  case 'enbudo':
            $info->IdUser=0;
            $info->Perfil="Admin";
            echo $obj->primera_columna($info);
    break;
  case 'Provisionada':
                    echo $obj->filtro_estado($_GET[v],$_POST[Orden],$_POST[IdUsuario]);
    break;
  case 'Elaborada':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden],$_POST[IdUsuario]);
      break;
  case 'Recibida':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden],$_POST[IdUsuario]);
        break;
  case 'Aprobada':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden],$_POST[IdUsuario]);
        break;
  case 'EnEsperaDePago':
                      echo $obj->filtro_estado($_GET[v],$_POST[Orden],$_POST[IdUsuario]);
              break;
  case 'enbudoUser':
                  $info->IdUser=$_POST[IdUsuario];
                  $info->Perfil = $_POST[Perfil];
                  echo $obj->primera_columna($info);
  break;
  default:
    # code...
    break;
}
 ?>
