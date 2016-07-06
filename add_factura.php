<?php
ini_set('session.auto_start()','On');
session_start();
include("sis.php");
include("$path/libs/conexion.php");

#Todas las Empresas
$objCboEmpresas = new poolConnecion();
$SqlEmpreas="SELECT [IdEmpresa],[Empresa] FROM [SAP].[dbo].[empresas] order by empresa";
$con=$objCboEmpresas->ConexionSQLSAP();
$RSet=$objCboEmpresas->QuerySQLSAP($SqlEmpreas,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
			 {
					 $IdEmpresa = $fila[IdEmpresa];
					 $Empresa = $fila[Empresa];
					 $cbo .= "<option value=\"$IdEmpresa\">$Empresa</option>";
			 }
 $objCboEmpresas->CerrarSQLSAP($RSet,$con);

#Datos del Proyecto

 $objProyecto = new poolConnecion();
 $SqlProyecto="SELECT [Proyecto] FROM [SAP].[dbo].[presupuestos] Where NoProyecto = '$_GET[NoProyecto]'";
 $con=$objProyecto->ConexionSQLSAP();
 $RSet=$objProyecto->QuerySQLSAP($SqlProyecto,$con);
  while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
 			{
 					$Proyecto = $fila[Proyecto];
 			}
  $objProyecto->CerrarSQLSAP($RSet,$con);

  $D = date(d);
  $M = date(m);
  $Y = date(Y);

  $Fecha_Factura = "$D/$M/$Y";
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
  <!--Animate.css [ OPTIONAL ]-->
  <link rel="stylesheet" href="js/uikit/css/components/datepicker.min.css" />

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
  <form id="frmDetalle" name="frmDetalle" action="detalle.php" method="post" class="uk-form">
    <input type="hidden" name="txtNoProyecto" id="txtNoProyecto" value="<?php echo $_GET[NoProyecto]; ?>">

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
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Crear Factura</h3>
						</div>
						<div class="panel-body">
                        <div class="row">
																	<div class="col-md-2">
                                      <div id="DivtxtFactura" class="form-group has-feedback">
																			    <input type="text" id="txtFactura" name="txtFactura" class="form-control" placeholder="Factura">
                                    </div>
																	</div>
																	<div class="col-md-1">
                                      <div id="DivtxtFacturaNo" class="form-group has-feedback">
																			    <input type="text" id="txtFacturaNo" name="txtFacturaNo" class="form-control" placeholder="Numero">
                                     </div>
																	</div>
                                    <div class="col-md-2">
                                            <select id="cboTipoFactura" name="cboTipoFctura" class="selectpicker" title="Seleciona tipo de factura" data-width="100%">
                                              <option value="0" selected>------</option>
                                              <option value="C&I">C&I</option>
                                              <option value="CeI">CeI</option>
                                              <option value="P">P</option>
                                            </select>
                                    </div>
                                    <div class="col-md-1">
                                        <p class="text-bold">Proyecto</p>
                                    </div>
                                    <div class="col-md-*">
                                      		<p class="text-bold"><?php echo "$_GET[NoProyecto].- $Proyecto"; ?></p>
                                    </div>
                        </div>
                        <hr>
                        <div class="row">
                              <div class="col-md-1">
                                  <p class="text-bold">Cantidad</p>
                              </div>
                              <div class="col-md-2">
                                  <div id="DivtxtCantidad" class="form-group has-feedback">
                                      <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                                        <input type="text" id="txtCantidad" name="txtCantidad" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-1">
                                  <p class="text-bold">Tipo IVA</p>
                              </div>
                              <div class="col-md-2">
                                <select class="selectpicker"  id="cboIva" name="cboIva" title="Tipo Iva" data-width="100%" onchange="sumar_iva();">
																		  <option value="2" selected>----</option>
		                                  <option value="0">0%</option>
		                                  <option value="0.16">16%</option>
                                </select>
                              </div>
                              <div class="col-md-1">
                                  <p class="text-bold">Importe Total</p>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group has-feedback">
                                      <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                                        <input type="text" id="txtImporteTotal" name="txtImporteTotal" class="form-control" readonly="">
                                      </div>
                                    </div>
                              </div>
                        </div>
                        <hr>
                          <div cols="row">
                            <div class="col-lg-1">
                                Facturación
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group date">
                                    <input type="text" id="txtDateFactura" name="txtDateFactura" class="form-control" data-uk-datepicker="{format:'DD-MM-YYYY'}" value="<?php echo $Fecha_Factura; ?>">
                                  </div>
                            </div>

                            <div class="col-lg-1">
                              Tentativa
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group date">
                                    <input type="text" id="txtDateTentativa" name="txtDateTentativa" class="form-control" data-uk-datepicker="{format:'DD-MM-YYYY'}" value="<?php echo $Fecha_Factura; ?>">
                                  </div>
                            </div>


                            <div class="col-lg-1">
                                Recepción
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group date">
                                    <input type="text" id="txtDateRecepcion" name="txtDateRecepcion" class="form-control" data-uk-datepicker="{format:'DD-MM-YYYY'}" value="<?php echo $Fecha_Factura; ?>">
                                  </div>
                            </div>
                          </div>
                          <hr>

                        <div class="row">
                            <div class="col-md-8">
                              <div id="DivtxtConcepto" class="form-group has-feedback">
                              <textarea id="txtConcepto" name="txtConcepto" rows="9" class="form-control" placeholder="Concepto aqui.."></textarea>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-md-1">
                                    <p class="text-bold">Empresa</p>
                                </div>
                                <div class="col-md-6">
                                  <select class="selectpicker" id="cboEmpresa" name="txtImporteTotal" title="Seleciona una empresa" data-width="100%" onchange="datos_empresa();">
																			 <option value="0" selected>------</option>
                                    		<?php echo $cbo; ?>
                                  </select>
                                </div>
                      </div>
                      <div class="row">
                            <div class="col-md-1">
                                <p class="text-bold">R. Social:</p>
                            </div>
                            <div class="col-md-6">
                                  <div id="DivtxtRasonSocial" class="form-group has-feedback">
                                      <input type="text" id="txtRasonSocial" name="txtRasonSocial" class="form-control" placeholder="Readonly input here...">
                                  </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-md-1">
                                <p class="text-bold">RFC:</p>
                            </div>
                            <div class="col-md-4">
                                  <div id="DivtxtRFC" class="form-group has-feedback">
                                      <input type="text" id="txtRFC" name="txtRFC" class="form-control" placeholder="Readonly input here...">
                                    </div>
                            </div>
                      </div>
                      <div cass="row">
                        <div class="col-md-1">
                            <p class="text-bold">Dirección Fiscal</p>
                        </div>
                        <div class="col-md-8">
                            <div id="DivtxtDir" class="form-group has-feedback">
                                <textarea rows="9" id="txtDir" name="txtDir" class="form-control" placeholder="Your content here.."></textarea>
                            </div>
                        </div>
                      </div>

						</div>
					</div>
          <div class="panel">
    						<div class="panel-heading">
    							<h3 class="panel-title">Notificar (No Disponible)</h3>
    						</div>
    						<div class="panel-body">
                  <?php
                            $contandor = 1;
                            $objUsuarios = new poolConnecion();
                            $SqlUsuarios="Select Nombre From [Northwind].[dbo].[Usuarios] Where CobranzaPerfil ='Admin' or CobranzaPerfil='User'";
                            $con=$objUsuarios->ConexionSQLNorthwind();
                            $RSet=$objUsuarios->QuerySQLNorthwind($SqlUsuarios,$con);
                             while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                   {

                                      $Nombre = $fila[Nombre];
                                        switch ($contandor)
                                         {
                                              case 1:
                                                            $row .= "<div class=\"row\">
                                                                      <div class=\"col-md-3 checkbox\">
                                                                          <label class=\"form-checkbox form-icon active form-text\"><input type=\"checkbox\"/>$Nombre</label>
                                                                      </div>";
                                                          $contandor = 2;
                                              break;

                                              case 2:
                                                          $row .= "<div class=\"col-md-3\">
                                                                      <label class=\"form-checkbox form-icon active form-text\"><input type=\"checkbox\"/>$Nombre</label>
                                                                  </div>";
                                                          $contandor = 3;
                                              break;

                                              case 3:
                                                            $row .= "<div class=\"col-md-3\">
                                                                                <label class=\"form-checkbox form-icon active form-text\"><input type=\"checkbox\"/>$Nombre</label>
                                                                            </div>
                                                                      </div>";

                                                          $contandor = 1;
                                              break;

                                        }
                                    }
                             $objUsuarios->CerrarSQLNorthwind($RSet,$con);
                             if($contandor == 1)
                             {
                               $row .="</div>";
                             }
                             else{
                               if ($contandor == 2) {
                                  $row .="</div>";
                               }
                             }
                            echo $row;
                             ?>


                    <p>&nbsp;</p>
                  <div class="row">
                       <div class="col-md-2">
                            <label class="col-md-* control-label" for="demo-textarea-input">Mensaje</label>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-8">
                        <textarea id="txtMensaje" name="txtMensaje" rows="9" class="form-control" placeholder="Tu mensaje aqui.."></textarea>
                      </div>
                  </div>
              </div>
              <div class="panel-footer text-right">
                          <div id="msjOk" class="alert alert-success fade in" style="display:none">
                                    <button class="close" data-dismiss="alert"><span>×</span></button>
                                    <strong>Oka</strong> Factura Creada con exito.
                          </div>
                          <div id="msjError" class="alert alert-danger fade in" style="display:none">
										              <button class="close" data-dismiss="alert"><span>×</span></button>
										              <strong>Oh!</strong> Verifique los datos de su factura
									        </div>
                          <input type="button" value="Crear Factura" class="btn btn-primary" onclick="validar_datos();"/>
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
			<div class="hide-fixed pull-right pad-rgt">Administración 1.0</div>
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
  <script src="js/uikit/js/uikit.min.js"></script>
  <script src="js/uikit/js/components/datepicker.js"></script>
   <script src="js/uikit/js/components/form-select.js"></script>
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
 <script src="js/add_factura.js"></script>
 </form>
</body>
</html>
