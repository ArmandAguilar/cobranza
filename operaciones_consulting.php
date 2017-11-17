<?php
ini_set('session.auto_start()','On');
session_start();
include("sis.php");
include("$path/libs/conexion.php");
#Todas los maestros
$objCboMaestros = new poolConnecion();
$SqlMaestros="SELECT [SAP].[dbo].[ProyectoMaestro].NumMaestro,[SAP].[dbo].[ProyectoMaestro].NomMaestro,[SAP].[dbo].[RelacionMaestrosEsclavos].NumProyecto,[SAP].[dbo].[RelacionMaestrosEsclavos].IdMaestroEsclavo FROM [SAP].[dbo].[ProyectoMaestro],[SAP].[dbo].[RelacionMaestrosEsclavos] Where [SAP].[dbo].[ProyectoMaestro].NumMaestro = [SAP].[dbo].[RelacionMaestrosEsclavos].NumMaestro order by [SAP].[dbo].[ProyectoMaestro].NumMaestro";
$con=$objCboMaestros->ConexionSQLSAP();
$RSet=$objCboMaestros->QuerySQLSAP($SqlMaestros,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
			 {
           $NumMaestro  = $fila[NumMaestro];
           $NomMaestro  = $fila[NomMaestro];
           $NumProyecto = $fila[NumProyecto];
           $IdMaestroEsclavo =  $fila[IdMaestroEsclavo];
					 $cboMaestros .= "<option value=\"$IdMaestroEsclavo\">$NumMaestro .- $NomMaestro (Proyecto : $NumProyecto)</option>";
			 }
 $objCboMaestros->CerrarSQLSAP($RSet,$con);
 #Todas los lideres
 $objUsuarios = new poolConnecion();
 $SqlUsuarios="Select Id,Nombre,Apellidos From [Northwind].[dbo].[Usuarios] Where CobranzaPerfil ='Admin' or CobranzaPerfil='User' order by Nombre";
 $con=$objUsuarios->ConexionSQLNorthwind();
 $RSet=$objUsuarios->QuerySQLNorthwind($SqlUsuarios,$con);
  while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
        {
            $Nombre = $fila[Nombre];
            $Apellidos = $fila[Apellidos];
            $Id = $fila[Id];
 					  $cboUsuarios .= "<option value=\"$Id\">$Nombre $Apellidos</option>";
 			 }
  $objUsuarios->CerrarSQLSAP($RSet,$con);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/cuadrito-30x30.png" type="image/x-png" />
	<title>Forta Ingenieria | Administración.</title>
  <!--STYLESHEET-->
  <!--=================================================-->

  <!--Open Sans Font [ OPTIONAL ] -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
  <!--Bootstrap Stylesheet [ REQUIRED ]-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--Nifty Stylesheet [ REQUIRED ]-->
  <link href="css/nifty.min.css" rel="stylesheet">
  <!--Font Awesome [ OPTIONAL ]-->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!--Switchery [ OPTIONAL ]-->
  <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
  <!--Bootstrap Select [ OPTIONAL ]-->
  <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
  <!--Bootstrap Tags Input [ OPTIONAL ]-->
  <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
  <!--Chosen [ OPTIONAL ]-->
  <link href="plugins/chosen/chosen.min.css" rel="stylesheet">
  <!--noUiSlider [ OPTIONAL ]-->
  <link href="plugins/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
  <link href="plugins/noUiSlider/jquery.nouislider.pips.min.css" rel="stylesheet">
  <!--Bootstrap Timepicker [ OPTIONAL ]-->
  <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
  <!--Bootstrap Datepicker [ OPTIONAL ]-->
  <link href="plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
  <!--Dropzone [ OPTIONAL ]-->
  <link href="plugins/dropzone/dropzone.css" rel="stylesheet">
  <!--Summernote [ OPTIONAL ]-->
  <link href="plugins/summernote/summernote.min.css" rel="stylesheet">
  <!--Demo [ DEMONSTRATION ]-->
  <link href="css/demo/nifty-demo.min.css" rel="stylesheet">

  <!--Page Load Progress Bar [ OPTIONAL ]-->
  <link href="plugins/pace/pace.min.css" rel="stylesheet">
  <script src="plugins/pace/pace.min.js"></script>
  <!--Bootstrap Table [ OPTIONAL ]-->
  <link href="plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
  <!--X-editable [ OPTIONAL ]-->
  <link href="plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet"


  <!--SCRIPT-->
  <!--=================================================-->

  <!--Page Load Progress Bar [ OPTIONAL ]-->
  <link href="plugins/pace/pace.min.css" rel="stylesheet">
  <script src="plugins/pace/pace.min.js"></script>
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
  <?php
    if(empty($_SESSION[IdUsuario]))
    {
       echo "<script>
                  window.location.href='logout.php'
            </script>";
    }
    if(empty($_SESSION[CobranzaPerfil]))
    {
      echo "<script>
                window.location.href='logout.php'
          </script>";
    }
   ?>
	<div id="container" class="effect mainnav-out">
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">
				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="panel.php" class="navbar-brand">
						<!--<img src="img/logo.png" alt="Nifty Logo" class="brand-icon">-->
						<div class="brand-title">
							<span class="brand-text">FortaIngenieria</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->
				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">
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
							<!--Notification dropdown menu-->

						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End notifications dropdown-->
					</ul>
					</ul>
					<ul class="nav navbar-top-links pull-right">
						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="<?php echo $_SESSION["Avatar"]; ?>" alt="<?php echo $_SESSION["Usuario"]; ?>">
								</span>
								<div class="username hidden-xs"><?php echo $_SESSION["Usuario"]; ?></div>
							</a>
							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
								<div class="pad-all text-right">
									<a href="logout.php" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Logout
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->
					</ul>
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->
			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->
		<div class="boxed">
			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--<div id="page-title">
				</div> -->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Page content-->
				<!--===================================================-->
				<div id="page-content">
					<!--Basic Columns Enbudo-->
					<!--===================================================-->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Operaciones Consulting</h3>
						</div>
						<div class="panel-body">
                      <div col="row">
                         <div col="col-sm-2">
                             <div class="input-group mar-btm">
   											                  <input type="text" placeholder="Search" class="form-control" id="txtSearch" name="txtSearch">
   											                  <span class="input-group-btn"><button class="btn btn-primary btn-labeled fa fa-search" type="button" onclick="buscar_operaciones();">Search</button></span>
   										       </div>
                         </div>

                       </div>
                       <div col="row">
                                <div class="col-md-3 mar-btm">Cuenta:<input type="text" class="form-control" placeholder="Name"></div>
                                <div class="col-md-3 mar-btm">Año-Mes:<input type="text" class="form-control" placeholder="Name"></div>
                        </div>
                        <div col="row">
                            <div class="col-md-3 mar-btm"><button class="btn btn-primary" type="button">Search</button></div>
                        </div>
         </div>
          <div class="panel-footer text-right">

         </div>
					</div>
          <div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
						</div>
						<div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Operación</th>
                        <th>Fecha</th>
                        <th>Abono</th>
                        <th>Cargo</th>
                        <th>Saldo</th>
                        <th>Cat. Cargo</th>
                        <th>Cat. Abono</th>
                        <th>Cat. Costo</th>
                        <th>Cuenta</th>
                        <th>MesAnio</th>
                        <th>Iva</th>
                        <th>Empresa</th>
                        <th>Referencia</th>
                        <th>Ctarc</th>
                        <th>RFC</th>
                      </tr>
                    </thead>
                    <tbody id="CTable">

                    </tbody>
                  </table>
                </div>
         </div>
          <div class="panel-footer text-right">

         </div>
					</div>
					</div>
				</div>
				<!--===================================================-->
				<!--End page content-->
			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">
					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">
								<ul id="mainnav-menu" class="list-group">
									<!--Menu list item-->
									<li>
										<a href="panel.php">
											<i class="fa fa-dashboard"></i>
											<span class="menu-title">
												<strong>Dashboard</strong>
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->

			<!--ASIDE-->
			<!--===================================================-->
			<aside id="aside-container">
				<div id="aside">
					<div class="nano">
						<div class="nano-content">
							<!-- Tabs Content -->
							<!--================================-->
							<div class="tab-content">
							</div>
						</div>
					</div>
				</div>
			</aside>
			<!--===================================================-->
			<!--END ASIDE-->
		</div>
		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">
			<!-- Visible when footer positions are fixed -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="show-fixed pull-right">
				<ul class="footer-list list-inline">
					<li>
						<p class="text-sm">SEO Proggres</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-danger"></div>
						</div>
					</li>

					<li>
						<p class="text-sm">Online Tutorial</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-primary"></div>
						</div>
					</li>
					<li>
						<button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
					</li>
				</ul>
			</div>
			<!-- Visible when footer positions are static -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="hide-fixed pull-right pad-rgt">Administración 1.1</div>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<p class="pad-lft">&#0169; 2016 FortaIngenieria</p>
		</footer>
		<!--===================================================-->
		<!-- END FOOTER -->
		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	<!--JAVASCRIPT-->
	<!--=================================================-->
	<!--jQuery [ REQUIRED ]-->
	<script src="js/jquery-2.1.1.min.js"></script>
	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="js/bootstrap.min.js"></script>
  <!--Bootstrap Select [ OPTIONAL ]-->
	<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
  <!--Switchery [ OPTIONAL ]-->
	<script src="plugins/switchery/switchery.min.js"></script>
  <!--Bootstrap Tags Input [ OPTIONAL ]-->
  <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
  <!--Chosen [ OPTIONAL ]-->
  <script src="plugins/chosen/chosen.jquery.min.js"></script>
  <!--Bootstrap Timepicker [ OPTIONAL ]-->
	<script src="plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

	<!--Fast Click [ OPTIONAL ]-->
	<script src="plugins/fast-click/fastclick.min.js"></script>
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="js/nifty.min.js"></script>
	<!--Switchery [ OPTIONAL ]-->
	<script src="plugins/switchery/switchery.min.js"></script>
	<!--Bootstrap Select [ OPTIONAL ]-->
	<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<!--Demo script [ DEMONSTRATION ]-->
	<script src="js/demo/nifty-demo.min.js"></script>
	<script src="js/demo/layouts.js"></script>
	<!--Bootstrap Table Sample [ SAMPLE ]-->
	<script src="js/demo/tables-bs-table.js"></script>
	<!--X-editable [ OPTIONAL ]-->
	<script src="plugins/x-editable/js/bootstrap-editable.min.js"></script>
	<!--Bootstrap Table [ OPTIONAL ]-->
	<script src="plugins/bootstrap-table/bootstrap-table.min.js"></script>
	<!--Bootstrap Table Extension [ OPTIONAL ]-->
	<script src="plugins/bootstrap-table/extensions/editable/bootstrap-table-editable.js"></script>
 <script src="js/operaciones_consulting.js"></script>
</body>
</html>
