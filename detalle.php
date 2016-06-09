<?php
ini_set('session.auto_start()','On');
session_start();
 ?>
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
			 echo "<script>
			 						window.location.href='logout.php'
						</script>		";
		}
	 ?>
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
  <input type="hidden" name="txtFactura" id="txtFactura" value="<?php echo $_POST[txtFactura]; ?>"/>
  <input type="hidden" name="txtProyecto" id="txtProyecto" value="<?php echo $_POST[txtNoProyecto]; ?>"/>
  <input type="hidden" name="txtUsuario" id="txtUsuario" value="<?php echo $_SESSION[Usuario]; ?>"/>
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
							<span class="brand-text">Cobranza</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->
				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">

					<ul class="nav navbar-top-links pull-right">
						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs"><?php echo $_SESSION["Usuario"]; ?></div>
							</a>
							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
								<div class="pad-all text-right">
									<a href="login.html" class="btn btn-primary">
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
        <div class="panel">
									<div class="panel-body">
										<h2><?php echo $_POST[txtNoProyecto]; ?> .- <?php echo $_POST[txtProyecto]; ?></h2>
										<div class="row">

												<div class="col-lg-3">
														<p class="text-2x mar-no text-thin">Factura : <?php echo $_POST[txtFactura]; ?></p><p class="text-2x mar-no text-thin">Monto : $ <?php echo $_POST[txtImporte]; ?></p>
												</div>
												<div class="col-lg-3">
                          <?php echo $_POST[txtEstado]; ?>
																<div class="btn-group">
																						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
																							<?php echo $_POST[txtEstado]; ?> <i class="dropdown-caret fa fa-caret-down"></i>
																						</button>
																						<ul class="dropdown-menu dropdown-menu-right">

																							<li><a href="javascript:void(0)">Provisionada</a></li>
																							<li><a href="javascript:void(0)">Elaborada</a></li>
																							<li><a href="javascript:void(0)">Recibida</a></li>
																							<li><a href="javascript:void(0)">Aprovada</a></li>
																							<li><a href="javascript:void(0)">Es. de pago</a></li>
																						</ul>
																</div>
												</div>
										</div>

									</div>
			</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Page content-->
				<!--===================================================-->
				<div id="page-content">
          <div class="row">
              <div class="col-lg-4">
                <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">Empresa</h3>
                  </div>
                  <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Empresa</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblEmpresa" name="lblEmpresa"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Rason Social</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblRasonSocial" name="lblRasonSocial" ></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">RFC</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblRFC" name="lblRFC"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Giro</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblGiro"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Web</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblWeb"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Tipo Cuenta</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblTipoCuenta"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Origen Cliente</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblOrigenCliente"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Revenue</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblRevenue"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-bold">Tamaño cliente</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-*">
                                <p class="text-thin" id="lblTamanoCliente"></p>
                            </div>
                        </div>
											<address>
												<strong>Dirección</strong><br>
												<div id="lblDir"></div><br>
											</address>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">Clientes</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-2">
                          <p class="text-bold">Puesto</p>
                        </div>
                   </div>
                   <div class="row">
                     <div class="col-sm-*">
                       <p class="text-thin" id="lblPuesto" name="lblPuesto"></p>
                     </div>
                   </div>
													<div class="row">
															<div class="col-sm-2">
																<p class="text-bold">Nombre</p>
															</div>
												 </div>
                         <div class="row">
                           <div class="col-sm-*">
                             <p class="text-thin" id="lblCliente" name="lblCliente"></p>
                           </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-2">
                               <p class="text-bold">Teléfono</p>
                             </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-*">
                            <p class="text-thin" id="lblTelefono" name="lblTelefono"></p>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                              <p class="text-bold">Celular</p>
                            </div>
                       </div>
                       <div class="row">
                         <div class="col-sm-*">
                           <p class="text-thin" id="lblCelular" name="lblCelular"></p>
                         </div>
                       </div>
                       <div class="row">
                           <div class="col-sm-2">
                             <p class="text-bold">Emial</p>
                           </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-*">
                          <p class="text-thin" id="lblEmail" name="lblEmail"></p>
                        </div>
                      </div>

									</div>
                </div>
								<div class="panel">
                  <div class="panel-heading">
                    <h3 class="panel-title">Colaboradores</h3>
                  </div>
                  <div class="panel-body">
													<div class="row">
															<div class="col-lg-5">
																<p class="text-bold">Armando Aguilar</p>
																<p class="text-bold">Armando Aguilar</p>
																<p class="text-bold">Armando Aguilar</p>
																<p class="text-bold">Armando Aguilar</p>
															</div>
												 </div>

									</div>
                </div>
              </div>
                <div class="col-lg-8">
                  <div class="panel">
                    <div class="panel-heading">
                      <h3 class="panel-title">Comentar</h3>
                    </div>
                    <div class="panel-body">
                      <!--Summernote-->
                      <!--===================================================-->
                      <textarea placeholder="Message" rows="13" class="form-control"></textarea>
											<div class="panel-footer text-right">
										<button class="btn btn-primary" onclick="agregar_comentario();">Comentar</button>
									</div>
                      <!--===================================================-->
                      <!-- End Summernote -->
                    </div>
                  </div>
                  <div class="panel">
                            <div class="panel-heading">
                              <h3 class="panel-title">Historico</h3>
                            </div>
                            <div class="panel-body">
                              <!-- Timeline -->
                              <!--===================================================-->
                              <div class="timeline">

                                <!-- Timeline header -->
                                <div class="timeline-header">
                                  <div class="timeline-header-title bg-info">Now</div>
                                </div>

                                <div class="timeline-entry">
                                  <div class="timeline-stat">
                                    <div class="timeline-icon bg-danger"><i class="fa fa-building fa-lg"></i>
                                    </div>
                                    <div class="timeline-time">2 Hours ago</div>
                                  </div>
                                  <div class="timeline-label">
                                    <h4 class="mar-no pad-btm"><a href="#" class="text-danger">Job Meeting</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                  </div>
                                </div>
                                <div class="timeline-entry">
                                  <div class="timeline-stat">
                                    <div class="timeline-icon"><img src="img/av4.png" alt="Profile picture">
                                    </div>
                                    <div class="timeline-time">3 Hours ago</div>
                                  </div>
                                  <div class="timeline-label">
                                    <p class="mar-no pad-btm"><a href="#" class="btn-link text-semibold">Lisa D.</a> commented on <a href="#">The Article</a>
                                    </p>
                                    <blockquote class="bq-sm bq-open">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</blockquote>
                                  </div>
                                </div>
                                <div class="timeline-entry">
                                  <div class="timeline-stat">
                                    <div class="timeline-icon bg-purple"><i class="fa fa-check fa-lg"></i>
                                    </div>
                                    <div class="timeline-time">5 Hours ago</div>
                                  </div>
                                  <div class="timeline-label">
                                    <img class="img-xs img-circle" src="img/av3.png" alt="Profile picture">
                                    <a href="#" class="btn-link text-semibold">Bobby Marz</a> followed you.
                                  </div>
                                </div>
                                <div class="timeline-entry">
                                  <div class="timeline-stat">
                                    <div class="timeline-icon"></div>
                                    <div class="timeline-time">11:27</div>
                                  </div>
                                  <div class="timeline-label">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                  </div>
                                </div>
                              </div>
                              <!--===================================================-->
                              <!-- End Timeline -->
                            </div>
                          </div>

                </div>

          </div>
			</div>
      <!--End page content-->
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

							<!--Nav tabs-->
							<!--================================-->
							<ul class="nav nav-tabs nav-justified">
								<li class="active">
									<a href="#demo-asd-tab-1" data-toggle="tab">
										<i class="fa fa-comments"></i>
										<span class="badge badge-purple">7</span>
									</a>
								</li>
								<li>
									<a href="#demo-asd-tab-2" data-toggle="tab">
										<i class="fa fa-info-circle"></i>
									</a>
								</li>
								<li>
									<a href="#demo-asd-tab-3" data-toggle="tab">
										<i class="fa fa-wrench"></i>
									</a>
								</li>
							</ul>
							<!--================================-->
							<!--End nav tabs-->
							<!-- Tabs Content -->
							<!--================================-->
							<div class="tab-content">

								<!--First tab (Contact list)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade in active" id="demo-asd-tab-1">
									<h4 class="pad-hor text-thin">
										<span class="pull-right badge badge-warning">3</span> Family
									</h4>

									<!--Family-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av2.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Stephen Tran</div>
												<span class="text-muted">Availabe</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av4.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Brittany Meyer</div>
												<span class="text-muted">I think so</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av3.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Donald Brown</div>
												<span class="text-muted">Lorem ipsum dolor sit amet.</span>
											</div>
										</a>
									</div>


									<hr>
									<h4 class="pad-hor text-thin">
										<span class="pull-right badge badge-info">4</span> Friends
									</h4>

									<!--Friends-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av5.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Betty Murphy</div>
												<span class="text-muted">Bye</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av6.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Olivia Spencer</div>
												<span class="text-muted">Thank you!</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av4.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Sarah Ruiz</div>
												<span class="text-muted">2 hours ago</span>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left">
												<img class="img-circle img-xs" src="img/av3.png" alt="Profile Picture">
											</div>
											<div class="media-body">
												<div class="text-lg">Paul Aguilar</div>
												<span class="text-muted">2 hours ago</span>
											</div>
										</a>
									</div>


									<hr>
									<h4 class="pad-hor text-thin">
										<span class="pull-right badge badge-success">Offline</span> Works
									</h4>

									<!--Works-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-pink badge-icon badge-fw pull-left"></span> Lucy Moon
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
										</a>
									</div>

								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--End first tab (Contact list)-->


								<!--Second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-2">

									<!--Monthly billing-->
									<div class="pad-all">
										<h4 class="text-lg mar-no">Monthly Billing</h4>
										<p class="text-sm">January 2015</p>
										<button class="btn btn-block btn-success mar-top">Pay Now</button>
									</div>


									<hr>

									<!--Information-->
									<div class="text-center clearfix pad-top">
										<div class="col-xs-6">
											<span class="h4">4,327</span>
											<p class="text-muted text-uppercase"><small>Sales</small></p>
										</div>
										<div class="col-xs-6">
											<span class="h4">$ 1,252</span>
											<p class="text-muted text-uppercase"><small>Earning</small></p>
										</div>
									</div>


									<hr>

									<!--Simple Menu-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item"><span class="label label-danger pull-right">Featured</span>Edit Password</a>
										<a href="#" class="list-group-item">Email</a>
										<a href="#" class="list-group-item"><span class="label label-success pull-right">New</span>Chat</a>
										<a href="#" class="list-group-item">Reports</a>
										<a href="#" class="list-group-item">Transfer Funds</a>
									</div>


									<hr>

									<div class="text-center">Questions?
										<p class="text-lg text-semibold"> (415) 234-53454 </p>
										<small><em>We are here 24/7</em></small>
									</div>
								</div>
								<!--End second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--Third tab (Settings)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-3">
									<ul class="list-group bg-trans">
										<li class="list-header">
											<h4 class="text-thin">Account Settings</h4>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											<p>Show my personal status</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											<p>Show offline contact</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox">
											</div>
											<p>Invisible mode </p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
										</li>
									</ul>
									<hr>
									<ul class="list-group bg-trans">
										<li class="list-header"><h4 class="text-thin">Public Settings</h4></li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											Online status
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox" checked>
											</div>
											Show offline contact
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="demo-switch" type="checkbox">
											</div>
											Show my device icon
										</li>
									</ul>
									<hr>
									<h4 class="pad-hor text-thin">Task Progress</h4>
									<div class="pad-all">
										<p>Upgrade Progress</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
										</div>
										<small class="text-muted">15% Completed</small>
									</div>
									<div class="pad-hor">
										<p>Database</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
										</div>
										<small class="text-muted">17/23 Database</small>
									</div>
								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--Third tab (Settings)-->
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
  <!--jQuery [ REQUIRED ]-->
	<script src="js/jquery-2.1.1.min.js"></script>
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
	<!--Bootstrap Tags Input [ OPTIONAL ]-->
	<script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<!--Chosen [ OPTIONAL ]-->
	<script src="plugins/chosen/chosen.jquery.min.js"></script>
	<!--noUiSlider [ OPTIONAL ]-->
	<script src="plugins/noUiSlider/jquery.nouislider.all.min.js"></script>
	<!--Bootstrap Timepicker [ OPTIONAL ]-->
	<script src="plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!--Bootstrap Datepicker [ OPTIONAL ]-->
	<script src="plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<!--Dropzone [ OPTIONAL ]-->
	<script src="plugins/dropzone/dropzone.min.js"></script>
	<!--Summernote [ OPTIONAL ]-->
	<script src="plugins/summernote/summernote.min.js"></script>
	<!--Demo script [ DEMONSTRATION ]-->
	<script src="js/demo/nifty-demo.min.js"></script>
	<!--Form Component [ SAMPLE ]-->
	<script src="js/demo/form-component.js"></script>
	<script src="js/detalle.js"></script>
	<script>
			detalles_empresa(<?php echo $_POST[txtNoProyecto]; ?>);
      detalles_cliente(<?php echo $_POST[txtNoProyecto]; ?>);
	</script>
</body>
</html>
