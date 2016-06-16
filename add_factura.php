<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.themeon.net/nifty/v2.2/layouts-offcanvas-navigation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:44:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forta Ingenieria | Cobranza.</title>
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




  <!--SCRIPT-->
  <!--=================================================-->

  <!--Page Load Progress Bar [ OPTIONAL ]-->
  <link href="plugins/pace/pace.min.css" rel="stylesheet">
  <script src="plugins/pace/pace.min.js"></script>
<?php
	if(empty($_SESSION[IdUsuario]))
	{
		 /*echo "<script>
		 						window.location.href='logout.php'
					</script>		";*/
	}
 ?>
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
  <form id="frmDetalle" name="frmDetalle" action="detalle.php" method="post">
    <input type="hidden" name="txtFactura" id="txtFactura" value="">
    <input type="hidden" name="txtNoProyecto" id="txtNoProyecto" value="">
    <input type="hidden" name="txtProyecto" id="txtProyecto" value="">
    <input type="hidden" name="txtImporte" id="txtImporte" value="">
    <input type="hidden" name="txtEstado" id="txtEstado" value="">
	<div id="container" class="effect mainnav-out">
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">
				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="panel.html" class="navbar-brand">
						<!--<img src="img/logo.png" alt="Nifty Logo" class="brand-icon">-->
						<div class="brand-title">
							<span class="brand-text">Cobranza</span>
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
																			<input type="text" class="form-control" placeholder="Factura"> -
																	</div>
																	<div class="col-md-2">
																			<input type="text" class="form-control" placeholder="Numero"> -
																	</div>
                                    <div class="col-md-2">
                                      <select class="selectpicker" title="Seleciona tipo de factura" data-width="100%">
                                        <option value="0">------</option>
                                        <option value="C&I">C&I</option>
                                        <option value="CeI">CeI</option>
                                      </select>
                                    </div>
                                    <div class="col-md-1">
                                        <p class="text-bold">Proyecto</p>
                                    </div>
                                    <div class="col-md-4">
                                      		<p class="text-bold"><?php echo $_POST[NoProyecto]; ?></p>
                                    </div>
                        </div>
                        <hr>
                        <div class="row">
                              <div class="col-md-1">
                                  <p class="text-bold">Cantidad</p>
                              </div>
                              <div class="col-md-2">
                                      <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                                        <input type="text" class="form-control">
                                      </div>
                              </div>
                              <div class="col-md-1">
                                  <p class="text-bold">Tipo IVA</p>
                              </div>
                              <div class="col-md-2">
                                <select class="selectpicker" multiple title="Tipo Iva" data-width="100%">
                                  <option>Family</option>
                                  <option>Friend</option>
                                  <option>Partner</option>
                                </select>
                              </div>
                              <div class="col-md-1">
                                  <p class="text-bold">Importe Total</p>
                              </div>
                              <div class="col-md-2">
                                      <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                                        <input type="text" class="form-control">
                                      </div>
                              </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-md-1">
                                    <p class="text-bold">Empresa</p>
                                </div>
                                <div class="col-md-6">
                                  <select class="selectpicker"  title="Seleciona una empresa" data-width="100%">
                                    <option>Family</option>
                                    <option>Friend</option>
                                    <option>Partner</option>
                                  </select>
                                </div>
                      </div>
                      <div class="row">
                            <div class="col-md-1">
                                <p class="text-bold">R. Social:</p>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" id="demo-readonly-input" class="form-control" placeholder="Readonly input here..." readonly="">
                                    </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-md-1">
                                <p class="text-bold">RFC:</p>
                            </div>
                            <div class="col-md-4">
                                  <div class="form-group">
                                      <input type="text" id="demo-readonly-input" class="form-control" placeholder="Readonly input here..." readonly="">
                                    </div>
                            </div>
                      </div>
                      <div cass="row">
                        <div class="col-md-1">
                            <p class="text-bold">Dirección Fiscal</p>
                        </div>
                        <div class="col-md-8">
                          <textarea rows="9" class="form-control" placeholder="Your content here.." disabled=""></textarea>
                        </div>
                      </div>

						</div>
					</div>
          <div class="panel">
    						<div class="panel-heading">
    							<h3 class="panel-title">Notificar</h3>
    						</div>
    						<div class="panel-body">
                    <div class="row">
                          <div class="col-md-3 checkbox">
                              <label class="form-checkbox form-icon active form-text"><input type="checkbox"/>a.aguilar@fortaingenieria.com</label>
                          </div>
                          <div class="col-md-3">
                              <label class="form-checkbox form-icon active form-text"><input type="checkbox"/>a.aguilar@fortaingenieria.com</label>
                          </div>
                          <div class="col-md-3">
                              <label class="form-checkbox form-icon active form-text"><input type="checkbox"/>a.aguilar@fortaingenieria.com</label>
                          </div>

                    </div>
                    <p>&nbsp;</p>
                  <div class="row">
                       <div class="col-md-2">
                            <label class="col-md-* control-label" for="demo-textarea-input">Textarea</label>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-8">
                        <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Your content here.."></textarea>
                      </div>
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
			<div class="hide-fixed pull-right pad-rgt">Cobranza 1.0</div>
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
 <script src="js/scripts.js"></script>
 <script src="js/data.js"></script>
 </form>
</body>
</html>
