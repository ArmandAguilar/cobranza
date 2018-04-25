<li class="dropdown">
  <?php
  if ($_SESSION[CobranzaPerfil]=="Admin") {
    echo "<a href=\"javascript:void(0);\" onclick=\"load_enbudo();\">
      <i class=\"fa fa-th-large fa-lg\"></i>
    </a>";
  }
  else{
    echo "<a href=\"javascript:void(0);\" onclick=\"load_enbudo_liders($_SESSION[IdUsuario],'$_SESSION[CobranzaPerfil]');\">
      <i class=\"fa fa-th-large fa-lg\"></i>
    </a>";
  }
   ?>

  <a href="javascript:void(0);" onclick="load_lista();">
    <i class="fa fa-tasks fa-lg"></i>
  </a>
  <a href="javascript:void(0);" onclick="load_cronograma();">
    <i class="fa fa-rotate-right fa-lg"></i>
  </a>
  <?php if ($_SESSION[CobranzaPerfil]=="Admin") {
  ?>
  <a href="relacionar_lider.php">
    <i class="fa fa-user"></i>
  </a>
  <?php
      }
    else{}
  ?>
  <a href="relacionar_maestros.php">
    <i class="fa fa-building fa-lg"></i>
  </a>
  <?php if ($_SESSION[CobranzaPerfil]=="Admin") {?>
      <a href="operaciones_consulting.php">
        <i class="fa fa-search"></i>
      </a>
  <?php } else {} ?>
  <?php if ($_SESSION[CobranzaPerfil]=="Admin") {?>
      <a href="facturacion_consulting.php">
        <i class="fa fa-dollar"></i>
      </a>
  <?php } else {} ?>
  <?php if ($_SESSION[CobranzaPerfil]=="Admin") {?>
      <a href="destruir_factura.php">
        <i class="fa fa-file-text"></i>
      </a>
  <?php } else {} ?>
  <!--Notification dropdown menu-->

</li>
