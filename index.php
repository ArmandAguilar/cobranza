<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | Cobranza</title>
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
	<!--Demo [ DEMONSTRATION ]-->
	<link href="css/demo/nifty-demo.min.css" rel="stylesheet">
	<!--SCRIPT-->
	<!--=================================================-->
	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="plugins/pace/pace.min.css" rel="stylesheet">
	<script src="plugins/pace/pace.min.js"></script>
	<script src="js/login.js"></script>
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
	<div id="container" class="cls-container">
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="#">
					<!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
					<span class="brand-title">Cobranza</span>
				</a>
			</div>
		</div>
		<!--===================================================-->
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Iniciar sesión en su cuenta</p>
					<form action="panel.html">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Usuario">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group text-right">
								<button class="btn btn-success text-uppercase" type="button" onclick="login();">Entrar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
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
	<!--Fast Click [ OPTIONAL ]-->
	<script src="plugins/fast-click/fastclick.min.js"></script>
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="js/nifty.min.js"></script>
	<!--Background Image [ DEMONSTRATION ]-->
	<script src="js/demo/bg-images.js"></script>
</body>
</html>
