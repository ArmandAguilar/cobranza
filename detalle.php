<?php
ini_set('session.auto_start()','On');
session_start();
include("sis.php");
include("$path/libs/conexion.php");

$Factura = $_POST[txtFactura];

$ArryaFactura = split("-",$Factura);
#Obtenemos el IdEmpresa de presupuestos
$objFactura = new poolConnecion();
$Sql1="SELECT [IdFacturacion],[CONCEPTO FACTURA] As Concepto,[Monto Antes de IVA] As Monto,[IVA],replace(convert(varchar,[Fecha de recepción],106),' ','/') As FRecepcion ,replace(convert(varchar,[Fecha TENTATIVA de pago],106),' ','/') As FTetativa,replace(convert(varchar,[Fecha Factura],106),' ','/')  As FFactura,[Trimestre] FROM [SAP].[dbo].[FacturacionConsulting] Where FacturaForta='$_POST[txtFactura]'";
$con=$objFactura->ConexionSQLSAP();
$RSet=$objFactura->QuerySQLSAP($Sql1,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {
            $Concpeto =  $fila[Concepto];
            $Monto = $fila[Monto];
            $Iva = $fila[IVA];
            $FFactura = $fila[FFactura];
            $FTentativa = $fila[FTetativa];
            $FRecepcion = $fila[FRecepcion];
            $IdFacturacion = $fila[IdFacturacion];
            $Trimestre = $fila[Trimestre];
       }
 $objFactura->CerrarSQLSAP($RSet,$con);

 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.themeon.net/nifty/v2.2/layouts-offcanvas-navigation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:44:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
  <input type="hidden" name="txtFactura" id="txtFactura" value="<?php echo $_POST[txtFactura]; ?>"/>
  <input type="hidden" name="txtProyecto" id="txtProyecto" value="<?php echo $_POST[txtNoProyecto]; ?>"/>
  <input type="hidden" name="txtUsuario" id="txtUsuario" value="<?php echo $_SESSION[Usuario]; ?>"/>
  <input type="hidden" name="txtEstado" id="txtEstado" value="<?php echo $_POST[Estado]; ?>"/>
  <input type="hidden" name="txtIdFacturacion" id="txtIdFacturacion"  value = "<?php echo $IdFacturacion; ?>">
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
        <div class="panel">
									<div class="panel-body">
										<h2><?php echo $_POST[txtNoProyecto]; ?> .- <?php echo $_POST[txtProyecto]; ?></h2>
										<div class="row">

												<div class="col-lg-3">
                          <?php
                                if ($_SESSION[CobranzaPerfil]=="Admin")
                                {
                                   echo "<p class=\"text-2x mar-no text-thin\" data-target=\"#modal-mFactura\" data-toggle=\"modal\" style=\"cursor:pointer\">Factura : $_POST[txtFactura]</p><p class=\"text-2x mar-no text-thin\">Monto : $ $_POST[txtImporte]</p>";
                                }
                                else
                                {
                                   echo "<p class=\"text-2x mar-no text-thin\" data-target=\"#modal-mFactura\" data-toggle=\"modal\" style=\"cursor:pointer\">Factura : $_POST[txtFactura]</p><p class=\"text-2x mar-no text-thin\">Monto : $ $_POST[txtImporte]</p>";
                                }
                          ?>
												</div>
												<div class="col-lg-6">
                              <div class="row">
                                          <div class="col-lg-3">
                                            <?php
                                                  if ($_SESSION[CobranzaPerfil]=="Admin")
                                                  {
                                                     echo "<button  data-target=\"#modal-relacionar\" data-toggle=\"modal\" class=\"btn btn-primary btn-md\">Relacionar Factura</button>";
                                                  }
                                                  else
                                                  {
                                                     echo "<button class=\"btn btn-primary btn-md\">Relacionar Factura</button>";
                                                  }
                                            ?>
                                          </div>
                                          <div class="col-lg-3">
                                            <?php
                                                  if ($_SESSION[CobranzaPerfil]=="Admin")
                                                  {
                                                     echo "<button data-target=\"#modal-cancelar\" data-toggle=\"modal\" class=\"btn btn-danger btn-md\">Cancelar Factura</button>";
                                                  }
                                                  else
                                                  {
                                                     echo "<button  class=\"btn btn-danger btn-md\">Cancelar Factura</button>";
                                                  }
                                            ?>
                                          </div>
                                          <div class="col-lg-3">
                                                          <div class="btn-group">
                                                                      <button id="btnEstado" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false" >
                                                                         <div id="xbtnEstado"><?php echo $_POST[txtEstado]; ?></span> <i class="dropdown-caret fa fa-caret-down"></i>
                                                                      </button>

                                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                              <li><a href="javascript:void(0);" onclick="cambiaEstado('Provisionada');">Provisionada</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="cambiaEstado('Elaborada');">Elaborada</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="cambiaEstado('Recibida');">Recibida</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="cambiaEstado('Aprobada');">Aprobada</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="cambiaEstado('EnEsperaDePago');">EnEsperaDePago</a></li>
                                                                            </ul>
                                                                      </div>
                                                          </div>
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
							<!--	<div class="panel">
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
                </div>-->
              </div>

                <div class="col-lg-8">
                  <div class="panel">
                          <div class="panel-heading">
                            <h3 class="panel-title">Fecha de Factura</h3>
                          </div>
                          <div class="panel-body">
                              <form class="uk-form">
                                <div cols="row">
                                  <div class="col-lg-1">
                                      Facturación
                                  </div>
                                  <div class="col-lg-3">
                                    <div id="demo-dp-component">
                                      <div class="input-group date">
                                        <input type="text" id="txtDateFactura" name="txtDateFactura" class="form-control" value="<?php echo $FFactura; ?>">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div cols="row">
                                  <div class="col-lg-1">
                                    Tentativa
                                  </div>
                                  <div class="col-lg-3">
                                    <div id="demo-dp-component">
                                      <div class="input-group date">
                                        <input type="text" id="txtDateTentativa" name="txtDateTentativa" class="form-control"  value="<?php echo $FTentativa; ?>">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div cols="row">
                                  <div class="col-lg-1">
                                      Recepción
                                  </div>
                                  <div class="col-lg-3">
                                        <div id="demo-dp-component">
                                          <div class="input-group date">
                                            <input type="text" id="txtDateRecepcion" name="txtDateRecepcion" class="form-control"  value="<?php echo $FRecepcion; ?>">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
                                          </div>
                                        </div>
                                  </div>
                                </div>
                              </form>

      									 </div>
                         <div class="panel-footer text-right">
                       <button class="btn btn-primary" onclick="cambiar_fechas();">Actualizar</button>
                     </div>
                  </div>

                  <div class="panel">
                    <div class="panel-heading">
                      <h3 class="panel-title">Comentar</h3>
                    </div>
                    <div class="panel-body">
                          <div class="alert alert-danger fade in" id="lblErroMensaje" style="display:none">
										                  <strong>Error:</strong> Comentario Vacio.
									        </div>
                      <!--Summernote-->
                      <!--===================================================-->
                      <textarea placeholder="Comentario aqui" rows="13" class="form-control" id="txtMensaje" name="txtMensaje"></textarea>
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
                              <div id="lblTimeline" class="timeline">

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

  <!--Default Bootstrap Modal-->
  <!--===================================================-->
  <div class="modal bunce" id="modal-cancelar" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--Modal header-->
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button">
          <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">¿Quieres cancelar esta factura?</h4>
        </div>

        <!--Modal body-->
        <div class="modal-body">
          <h4 class="text-thin">¿Cual es el motivo?</h4>
          <div class="row">
              <div class="col-md-8">
                <div id="DivtxtConcepto" class="form-group has-feedback">
                <textarea id="txtMotivoCancelacion" name="txtMotivoCancelacion" rows="9" class="form-control" placeholder="Motivo aqui.."></textarea>
              </div>
              </div>
          </div>
        </div>
        <!--Modal footer-->
        <div class="modal-footer">
          <button  data-dismiss="modal" class="btn btn-danger" onclick="cancelar_factura();">Aceptar</button>
          <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!--===================================================-->
  <!--End Default Bootstrap Modal-->


<!--Default Bootstrap Modal modal-mFactura-->
<!--===================================================-->
<div class="modal bunce" id="modal-mFactura" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">
        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Modificar Fuctura</h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">

        <div class="row">
                  <div class="col-md-3">
                      <div id="DivtxtFactura" class="form-group has-feedback">
                          <input type="text" id="txtFacturaModificar" name="txtFacturaModificar" class="form-control" placeholder="Factura" value="<?php echo $ArryaFactura[0]; ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div id="DivtxtFacturaNo" class="form-group has-feedback">
                          <input type="text" id="txtFacturaNoModificar" name="txtFacturaNoModificar" class="form-control" placeholder="Numero" value="<?php echo $ArryaFactura[1]; ?>">
                     </div>
                  </div>
                    <div class="col-md-3">
                            <select id="cboTipoFactura" name="cboTipoFctura" class="selectpicker" title="Seleciona tipo de factura" data-width="100%">
                              <option value="<?php echo $ArryaFactura[2]; ?>" selected><?php echo $ArryaFactura[2]; ?></option>
                              <option value="C&I">C&I</option>
                              <option value="CeI">CeI</option>
                              <option value="P">P</option>
                            </select>
                    </div>
        </div>
        <hr>

        <div class="row">

              <div class="col-md-4">
                  <div id="DivtxtCantidad" class="form-group has-feedback">
                      <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                        <input type="text" id="txtCantidadModificar" name="txtCantidadModificar" class="form-control" value="<?php echo $Monto; ?>">
                      </div>
                  </div>
              </div>

              <div class="col-md-2">
                <select class="selectpicker"  id="cboIvaModificar" name="cboIvaModificar" title="Tipo Iva" data-width="100%" onchange="sumar_iva_modificar();">

                      <option value="0">0%</option>
                      <option value="0.16">16%</option>
                </select>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                        <input type="text" id="txtImporteTotalModificar" name="txtImporteTotalModificar" class="form-control" value="<?php echo $Iva; ?>" readonly="">
                      </div>
                    </div>
              </div>
        </div>
        <hr>
        <div class ="row">
                <div class="col-md-3">
                        <select id="cboTrimestre" name="cboTrimestre" class="selectpicker" title="Seleciona tipo de factura" data-width="100%">
                          <option value="<?php echo $Trimestre; ?>" selected><?php echo $Trimestre; ?></option>
                          <option value="T1-2016">T1-2016</option>
                          <option value="T2-2016">T2-2016</option>
                          <option value="T3-2016">T3-2016</option>
                          <option value="T1-2015">T1-2015</option>
                          <option value="T2-2015">T2-2015</option>
                          <option value="T3-2015">T3-2015</option>
                          <option value="T1-2014">T1-2014</option>
                          <option value="T2-2014">T2-2014</option>
                          <option value="T3-2014">T3-2014</option>
                          <option value="T1-2013">T1-2013</option>
                          <option value="T2-2013">T2-2013</option>
                          <option value="T3-2013">T3-2013</option>
                          <option value="T1-2012">T1-2012</option>
                          <option value="T2-2012">T2-2012</option>
                          <option value="T3-2012">T3-2012</option>
                        </select>
                </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
              <div id="DivtxtConcepto" class="form-group has-feedback">
              <textarea id="txtConceptoModificar" name="txtConceptoModificar" rows="9" class="form-control" placeholder="Concepto aqui.."><?php echo $Concpeto; ?></textarea>
            </div>
            </div>
        </div>
      </div>
      <!--Modal footer-->
      <div class="modal-footer">
        <div id="msjModalModificarOk" class="alert alert-success fade in" style="display:none">
                  <button class="close" data-dismiss="alert"><span>×</span></button>
                  <strong>Oka</strong> cambios realizados corretamente.
        </div>
        <div id="msjModalModificarError" class="alert alert-danger fade in" style="display:none">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>Oh!</strong> Verifique los datos...
        </div>
        <button data-dismiss="modal" class="btn btn-success" onclick="modificar_datos();">Modificar</button>
        <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->

  <!--Default Bootstrap Modal-->
  <!--===================================================-->
  <div class="modal fade" id="modal-relacionar" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--Modal header-->
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button">
          <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Relacionar Factura : <?php echo $_POST[txtFactura]; ?></h4>
        </div>

        <!--Modal body-->
        <div class="modal-body">
                <div class="row">
                          <div class="col-md-*">
                            <select id="cboOperacionAbono" name="cboOperacionAbono" class="selectpicker" title="Seleciona tipo de abono" data-width="100%">
                                  <?php
                                        $sqlAbonos = "SELECT OperacionAbono,Convert(varchar(11),[Fecha]) As Fecha,[Abono TOTAL en banco] As AbonoTotalBanco,[Concepto bancario] As ConceptoB,CategoriaAbono,[Abonos hechos a facturas] as AHaFacturas,[Abono por relacionar] As APRelacionar FROM [Abonos por descargar] where  Fecha>='01/01/2009' and [Abono por relacionar]>500 ORDER BY Fecha";
                                        #Todas las Empresas
                                        $objCboAbono = new poolConnecion();
                                        $con=$objCboAbono->ConexionSQLSAP();
                                        $RSet=$objCboAbono->QuerySQLSAP($sqlAbonos,$con);
                                         while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
                                        			 {
                                        					 $OperacionAbono = $fila[OperacionAbono];
                                                   $Fecha = $fila[Fecha];
                                                   $AbonoTotalBanco = number_format($fila[AbonoTotalBanco], 2, '.', ',');
                                                   $ConceptoB = $fila[ConceptoB];
                                                   $CategoriaAbono = $fila[CategoriaAbono];
                                                   $AHaFacturas = number_format($fila[AHaFacturas], 2, '.', ',');
                                                   $APRelacionar = number_format($fila[APRelacionar], 2, '.', ',');



                                        					 $cbo .= "<option value=\"$OperacionAbono\">$OperacionAbono|$Fecha| $ $AbonoTotalBanco|$ConceptoB|$CategoriaAbono|$AHaFacturas|$APRelacionar|</option>";

                                        			 }
                                         $objCboAbono->CerrarSQLSAP($RSet,$con);
                                         echo $cbo;
                                   ?>
                            </select>
                          </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                                <div class="input-group mar-btm">
                                  <span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
                                  <input type="text" id="txtCantidadRelacionar" name="txtCantidadRelacionar" class="form-control">
                                </div>
                        </div>

                </div>
        </div>

        <!--Modal footer-->
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-primary" onclick="relacionar_factura();">Relacionar</button>
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

        </div>
      </div>
    </div>
  </div>
  <!--===================================================-->
  <!--End Default Bootstrap Modal-->

	<!--JAVASCRIPT-->
	<!--=================================================-->
	<!--jQuery [ REQUIRED ]-->
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/uikit/js/uikit.min.js"></script>
  <script src="js/uikit/js/components/datepicker.js"></script>
   <script src="js/uikit/js/components/form-select.js"></script>
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

  <!--Bootbox Modals [ OPTIONAL ]-->
  <script src="plugins/bootbox/bootbox.min.js"></script>
  <!--Modals [ SAMPLE ]-->
  <script src="js/demo/ui-modals.js"></script>
	<script src="js/detalle.js"></script>
	<script>
			detalles_empresa(<?php echo $_POST[txtNoProyecto]; ?>);
      detalles_cliente(<?php echo $_POST[txtNoProyecto]; ?>);
      timeline();
	</script>
  <script>
  $(document).ready(function() {
  $('#demo-dp-component .input-group.date').datepicker({
    format: "dd MM, yyyy",
	  todayBtn: "linked",
	  autoclose: true,
	  todayHighlight: true
    });
  });
  </script>
</body>
</html>
