<li class="dropdown">
  <a href="panel.php">
    <i class="fa fa-home"></i>
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
