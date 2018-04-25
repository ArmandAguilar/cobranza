<?php
ini_set('session.auto_start()','On');
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
	<!--SCRIPT-->
	<!--=================================================-->
	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="plugins/pace/pace.min.css" rel="stylesheet">
	<script src="plugins/pace/pace.min.js"></script>
	<!--Bootstrap Table [ OPTIONAL ]-->
	<link href="plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
	<!--X-editable [ OPTIONAL ]-->
	<link href="plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">

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
  <form id="frmDetalle" name="frmDetalle" action="detalle.php" method="post">
    <input type="hidden" name="txtFactura" id="txtFactura" value="">
    <input type="hidden" name="txtNoProyecto" id="txtNoProyecto" value="">
    <input type="hidden" name="txtProyecto" id="txtProyecto" value="">
    <input type="hidden" name="txtImporte" id="txtImporte" value="">
    <input type="hidden" name="txtEstado" id="txtEstado" value="">
    <input type="hidden" name="txtIdUsuario" id="txtIdUsuario" value="<?php echo $_SESSION[IdUsuario]; ?>">
    <input type="hidden" name="txtIdPerfil" id="txtPerfil" value="<?php echo $_SESSION[CobranzaPerfil]; ?>">
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
						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle push" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
						-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Navigation toogle button-->
						<!--Notification dropdown fa-tasks,fa-rotate-right-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <?php include("menu.php"); ?>

						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End notifications dropdown-->
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
					<div id="DEnvudo" class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Embudo</h3>
						</div>
            <div id="load_enbudo"><img src="img/pageloader.gif"/></div>
						<div class="panel-body" id="rows-enbudo">


						</div>
					</div>

					<!--===================================================-->
					<!--Basic Lista-->
					<!--===================================================-->
					<div id="DLista" class="panel" style="display:none">

						<div class="panel-heading">
							<h3 class="panel-title">Lista</h3>
						</div>
						<div class="panel-body">
							<table data-toggle="table"
								   data-url="scripts/datajson.php"
                   data-search="true"
								   data-show-refresh="true"
								   data-show-toggle="true"
								   data-show-columns="true"
								   data-page-list="[20, 30, 60]"
								   data-page-size="15"
								   data-pagination="true" data-show-pagination-switch="true">
								<thead>
									<tr>
                    <th data-field="id" data-switchable="false">No Fila</th>
                    <th data-field="NumMaestro" data-switchable="false">Num. Maestro</th>
                    <th data-field="NumProyecto" data-switchable="false">Num. Proyecto</th>
                    <th data-field="NomProyecto" data-switchable="false">Proyetco</th>
                    <th data-field="Empresa" data-switchable="false">Empresa</th>
                    <th data-field="FacturaForta" data-switchable="false">Factura</th>
                    <th data-field="Estatus" data-switchable="false">Estado</th>
                    <th data-field="FechaFactura" data-switchable="false">Fecha Factura</th>
                    <th data-field="FechaTentativa" data-switchable="false">Fecha Tentativa</th>
                    <th data-field="FechaRecepcion" data-switchable="false">Fehca Recepción</th>
                    <th data-field="MontoAntesIva" data-switchable="false">Monto</th>
                    <th data-field="IVA" data-switchable="true">Iva</th>
                    <th data-field="MontoCIVA" data-switchable="true">Monto Con Iva</th>
                    <th data-field="SumaAbono" data-switchable="true">Suma a Abono</th>
                    <th data-field="SaldoPorCobrar" data-switchable="true">Saldo por Cobrar</th>
                    <th data-field="TrimestreFactura" data-switchable="true">Trimestre</th>
                    <th data-field="RFC" data-switchable="true">true</th>
                    <th data-field="SeFacturaA" data-switchable="true">Se Factura A</th>
                    <th data-field="QuienFactura" data-switchable="true">Quien Factura</th>
									</tr>
								</thead>

							</table>
						</div>
					</div>
					<!--===================================================-->
					<!--===================================================-->
					<!--Basic Time Line-->
					<!--===================================================-->
					<div id="DCronograma"class="panel" style="display:none">
						<div class="panel-heading">
							<h3 class="panel-title">Time Line</h3>
						</div>
						<div class="panel-body">

						</div>
					</div>
					<!--===================================================-->
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
										<a href="panel.html">
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
	<script src="js/jquery-2.2.4.min.js"></script>
	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="js/bootstrap.min.js"></script>
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
 <script src="js/scripts.js"></script>
 <script src="js/data.js"></script>
 </form>
 <?php
          if ($_SESSION[CobranzaPerfil]=="Admin") {
            echo "<script>
                      load_enbudo();
                 </script>";
          }
          else{
            echo "<script>
                      load_enbudo_liders($_SESSION[IdUsuario],'$_SESSION[CobranzaPerfil]');
                 </script>";
          }
  ?>
</body>
</html>
