<?php
ini_set('session.auto_start()','On');
session_start();
include("sis.php");
include("$path/libs/conexion.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/cuadrito-30x30.png" type="image/x-png" />
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
  <form id="frmDetalle" name="frmDetalle" action="detalle.php" method="post">
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
							<h3 class="panel-title">Relacionar Lider</h3>
						</div>
						<div class="panel-body">
                  <div col="row">
                      <div class="col-md-2">
                          Maestros :
                      </div>
                  </div>
                  <div col="row">
                      <div class="col-md-4">
                                  <div class="btn-group bootstrap-select dropup" style="width: 100%;">
                                      <button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" title="Friend" aria-expanded="false">
                                          <span class="filter-option pull-left">Friend</span>&nbsp;
                                          <span class="caret"></span>
                                      </button>
                                      <div class="dropdown-menu open" style="max-height: 430px; overflow: hidden; min-height: 125px;">
                                          <div class="bs-searchbox">
                                              <input type="text" class="input-block-level form-control" autocomplete="off">
                                          </div>
                                          <ul class="dropdown-menu inner selectpicker" role="menu" style="max-height: 389px; overflow-y: auto; min-height: 84px;">
                                              <li data-original-index="0" class=""><a tabindex="0" class="" data-normalized-text="Family"><span class="text">Family</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="1" class="selected active"><a tabindex="0" class="" data-normalized-text="Friend"><span class="text">Friend</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="2"><a tabindex="0" class="" data-normalized-text="Partner"><span class="text">Partner</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="3"><a tabindex="0" class="" data-normalized-text="Sport"><span class="text">Sport</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="4"><a tabindex="0" class="" data-normalized-text="Movie"><span class="text">Movie</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="5"><a tabindex="0" class="" data-normalized-text="Documents"><span class="text">Documents</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="6"><a tabindex="0" class="" data-normalized-text="Music"><span class="text">Music</span><span class="fa fa-check check-mark"></span></a></li>
                                              <li data-original-index="7"><a tabindex="0" class="" data-normalized-text="Video"><span class="text">Video</span><span class="fa fa-check check-mark"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                      </div>
                      <select data-placeholder="Choose a Country..." id="demo-chosen-select" tabindex="-1" style="display: none;">
													<option value="United States">United States</option>
													<option value="United Kingdom">United Kingdom</option>
													<option value="Afghanistan">Afghanistan</option>
													<option value="Aland Islands">Aland Islands</option>
													<option value="Albania">Albania</option>
													<option value="Algeria">Algeria</option>
													<option value="American Samoa">American Samoa</option>
													<option value="Andorra">Andorra</option>
													<option value="Angola">Angola</option>
													<option value="Anguilla">Anguilla</option>
													<option value="Antarctica">Antarctica</option>
													<option value="Antigua and Barbuda">Antigua and Barbuda</option>
													<option value="Argentina">Argentina</option>
													<option value="Armenia">Armenia</option>
													<option value="Aruba">Aruba</option>
													<option value="Australia">Australia</option>
													<option value="Austria">Austria</option>
													<option value="Azerbaijan">Azerbaijan</option>
													<option value="Bahamas">Bahamas</option>
													<option value="Bahrain">Bahrain</option>
													<option value="Bangladesh">Bangladesh</option>
													<option value="Barbados">Barbados</option>
													<option value="Belarus">Belarus</option>
													<option value="Belgium">Belgium</option>
													<option value="Belize">Belize</option>
													<option value="Benin">Benin</option>
													<option value="Bermuda">Bermuda</option>
													<option value="Bhutan">Bhutan</option>
													<option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
													<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
													<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
													<option value="Botswana">Botswana</option>
													<option value="Bouvet Island">Bouvet Island</option>
													<option value="Brazil">Brazil</option>
													<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
													<option value="Brunei Darussalam">Brunei Darussalam</option>
													<option value="Bulgaria">Bulgaria</option>
													<option value="Burkina Faso">Burkina Faso</option>
													<option value="Burundi">Burundi</option>
													<option value="Cambodia">Cambodia</option>
													<option value="Cameroon">Cameroon</option>
													<option value="Canada">Canada</option>
													<option value="Cape Verde">Cape Verde</option>
													<option value="Cayman Islands">Cayman Islands</option>
													<option value="Central African Republic">Central African Republic</option>
													<option value="Chad">Chad</option>
													<option value="Chile">Chile</option>
													<option value="China">China</option>
													<option value="Christmas Island">Christmas Island</option>
													<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
													<option value="Colombia">Colombia</option>
													<option value="Comoros">Comoros</option>
													<option value="Congo">Congo</option>
													<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
													<option value="Cook Islands">Cook Islands</option>
													<option value="Costa Rica">Costa Rica</option>
													<option value="Cote D'ivoire">Cote D\'ivoire</option>
													<option value="Croatia">Croatia</option>
													<option value="Cuba">Cuba</option>
													<option value="Curacao">Curacao</option>
													<option value="Cyprus">Cyprus</option>
													<option value="Czech Republic">Czech Republic</option>
													<option value="Denmark">Denmark</option>
													<option value="Djibouti">Djibouti</option>
													<option value="Dominica">Dominica</option>
													<option value="Dominican Republic">Dominican Republic</option>
													<option value="Ecuador">Ecuador</option>
													<option value="Egypt">Egypt</option>
													<option value="El Salvador">El Salvador</option>
													<option value="Equatorial Guinea">Equatorial Guinea</option>
													<option value="Eritrea">Eritrea</option>
													<option value="Estonia">Estonia</option>
													<option value="Ethiopia">Ethiopia</option>
													<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
													<option value="Faroe Islands">Faroe Islands</option>
													<option value="Fiji">Fiji</option>
													<option value="Finland">Finland</option>
													<option value="France">France</option>
													<option value="French Guiana">French Guiana</option>
													<option value="French Polynesia">French Polynesia</option>
													<option value="French Southern Territories">French Southern Territories</option>
													<option value="Gabon">Gabon</option>
													<option value="Gambia">Gambia</option>
													<option value="Georgia">Georgia</option>
													<option value="Germany">Germany</option>
													<option value="Ghana">Ghana</option>
													<option value="Gibraltar">Gibraltar</option>
													<option value="Greece">Greece</option>
													<option value="Greenland">Greenland</option>
													<option value="Grenada">Grenada</option>
													<option value="Guadeloupe">Guadeloupe</option>
													<option value="Guam">Guam</option>
													<option value="Guatemala">Guatemala</option>
													<option value="Guernsey">Guernsey</option>
													<option value="Guinea">Guinea</option>
													<option value="Guinea-bissau">Guinea-bissau</option>
													<option value="Guyana">Guyana</option>
													<option value="Haiti">Haiti</option>
													<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
													<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
													<option value="Honduras">Honduras</option>
													<option value="Hong Kong">Hong Kong</option>
													<option value="Hungary">Hungary</option>
													<option value="Iceland">Iceland</option>
													<option value="India">India</option>
													<option value="Indonesia">Indonesia</option>
													<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
													<option value="Iraq">Iraq</option>
													<option value="Ireland">Ireland</option>
													<option value="Isle of Man">Isle of Man</option>
													<option value="Israel">Israel</option>
													<option value="Italy">Italy</option>
													<option value="Jamaica">Jamaica</option>
													<option value="Japan">Japan</option>
													<option value="Jersey">Jersey</option>
													<option value="Jordan">Jordan</option>
													<option value="Kazakhstan">Kazakhstan</option>
													<option value="Kenya">Kenya</option>
													<option value="Kiribati">Kiribati</option>
													<option value="Korea, Democratic People's Republic of">Korea, Democratic People\'s Republic of</option>
													<option value="Korea, Republic of">Korea, Republic of</option>
													<option value="Kuwait">Kuwait</option>
													<option value="Kyrgyzstan">Kyrgyzstan</option>
													<option value="Lao People's Democratic Republic">Lao People\'s Democratic Republic</option>
													<option value="Latvia">Latvia</option>
													<option value="Lebanon">Lebanon</option>
													<option value="Lesotho">Lesotho</option>
													<option value="Liberia">Liberia</option>
													<option value="Libya">Libya</option>
													<option value="Liechtenstein">Liechtenstein</option>
													<option value="Lithuania">Lithuania</option>
													<option value="Luxembourg">Luxembourg</option>
													<option value="Macao">Macao</option>
													<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
													<option value="Madagascar">Madagascar</option>
													<option value="Malawi">Malawi</option>
													<option value="Malaysia">Malaysia</option>
													<option value="Maldives">Maldives</option>
													<option value="Mali">Mali</option>
													<option value="Malta">Malta</option>
													<option value="Marshall Islands">Marshall Islands</option>
													<option value="Martinique">Martinique</option>
													<option value="Mauritania">Mauritania</option>
													<option value="Mauritius">Mauritius</option>
													<option value="Mayotte">Mayotte</option>
													<option value="Mexico">Mexico</option>
													<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
													<option value="Moldova, Republic of">Moldova, Republic of</option>
													<option value="Monaco">Monaco</option>
													<option value="Mongolia">Mongolia</option>
													<option value="Montenegro">Montenegro</option>
													<option value="Montserrat">Montserrat</option>
													<option value="Morocco">Morocco</option>
													<option value="Mozambique">Mozambique</option>
													<option value="Myanmar">Myanmar</option>
													<option value="Namibia">Namibia</option>
													<option value="Nauru">Nauru</option>
													<option value="Nepal">Nepal</option>
													<option value="Netherlands">Netherlands</option>
													<option value="New Caledonia">New Caledonia</option>
													<option value="New Zealand">New Zealand</option>
													<option value="Nicaragua">Nicaragua</option>
													<option value="Niger">Niger</option>
													<option value="Nigeria">Nigeria</option>
													<option value="Niue">Niue</option>
													<option value="Norfolk Island">Norfolk Island</option>
													<option value="Northern Mariana Islands">Northern Mariana Islands</option>
													<option value="Norway">Norway</option>
													<option value="Oman">Oman</option>
													<option value="Pakistan">Pakistan</option>
													<option value="Palau">Palau</option>
													<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
													<option value="Panama">Panama</option>
													<option value="Papua New Guinea">Papua New Guinea</option>
													<option value="Paraguay">Paraguay</option>
													<option value="Peru">Peru</option>
													<option value="Philippines">Philippines</option>
													<option value="Pitcairn">Pitcairn</option>
													<option value="Poland">Poland</option>
													<option value="Portugal">Portugal</option>
													<option value="Puerto Rico">Puerto Rico</option>
													<option value="Qatar">Qatar</option>
													<option value="Reunion">Reunion</option>
													<option value="Romania">Romania</option>
													<option value="Russian Federation">Russian Federation</option>
													<option value="Rwanda">Rwanda</option>
													<option value="Saint Barthelemy">Saint Barthelemy</option>
													<option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
													<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
													<option value="Saint Lucia">Saint Lucia</option>
													<option value="Saint Martin (French part)">Saint Martin (French part)</option>
													<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
													<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
													<option value="Samoa">Samoa</option>
													<option value="San Marino">San Marino</option>
													<option value="Sao Tome and Principe">Sao Tome and Principe</option>
													<option value="Saudi Arabia">Saudi Arabia</option>
													<option value="Senegal">Senegal</option>
													<option value="Serbia">Serbia</option>
													<option value="Seychelles">Seychelles</option>
													<option value="Sierra Leone">Sierra Leone</option>
													<option value="Singapore">Singapore</option>
													<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
													<option value="Slovakia">Slovakia</option>
													<option value="Slovenia">Slovenia</option>
													<option value="Solomon Islands">Solomon Islands</option>
													<option value="Somalia">Somalia</option>
													<option value="South Africa">South Africa</option>
													<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
													<option value="South Sudan">South Sudan</option>
													<option value="Spain">Spain</option>
													<option value="Sri Lanka">Sri Lanka</option>
													<option value="Sudan">Sudan</option>
													<option value="Suriname">Suriname</option>
													<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
													<option value="Swaziland">Swaziland</option>
													<option value="Sweden">Sweden</option>
													<option value="Switzerland">Switzerland</option>
													<option value="Syrian Arab Republic">Syrian Arab Republic</option>
													<option value="Taiwan, Province of China">Taiwan, Province of China</option>
													<option value="Tajikistan">Tajikistan</option>
													<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
													<option value="Thailand">Thailand</option>
													<option value="Timor-leste">Timor-leste</option>
													<option value="Togo">Togo</option>
													<option value="Tokelau">Tokelau</option>
													<option value="Tonga">Tonga</option>
													<option value="Trinidad and Tobago">Trinidad and Tobago</option>
													<option value="Tunisia">Tunisia</option>
													<option value="Turkey">Turkey</option>
													<option value="Turkmenistan">Turkmenistan</option>
													<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
													<option value="Tuvalu">Tuvalu</option>
													<option value="Uganda">Uganda</option>
													<option value="Ukraine">Ukraine</option>
													<option value="United Arab Emirates">United Arab Emirates</option>
													<option value="United Kingdom">United Kingdom</option>
													<option value="United States">United States</option>
													<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
													<option value="Uruguay">Uruguay</option>
													<option value="Uzbekistan">Uzbekistan</option>
													<option value="Vanuatu">Vanuatu</option>
													<option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
													<option value="Viet Nam">Viet Nam</option>
													<option value="Virgin Islands, British">Virgin Islands, British</option>
													<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
													<option value="Wallis and Futuna">Wallis and Futuna</option>
													<option value="Western Sahara">Western Sahara</option>
													<option value="Yemen">Yemen</option>
													<option value="Zambia">Zambia</option>
													<option value="Zimbabwe">Zimbabwe</option>
												</select>
                        <div class="chosen-container chosen-container-single chosen-with-drop chosen-container-active" style="width: 277px;" title="" id="demo_chosen_select_chosen"><a class="chosen-single" tabindex="-1"><span>United States</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" tabindex="2"></div><ul class="chosen-results"><li class="active-result result-selected" data-option-array-index="0">United States</li><li class="active-result" data-option-array-index="1">United Kingdom</li><li class="active-result" data-option-array-index="2">Afghanistan</li><li class="active-result" data-option-array-index="3">Aland Islands</li><li class="active-result" data-option-array-index="4">Albania</li><li class="active-result" data-option-array-index="5">Algeria</li><li class="active-result" data-option-array-index="6">American Samoa</li><li class="active-result" data-option-array-index="7">Andorra</li><li class="active-result" data-option-array-index="8">Angola</li><li class="active-result" data-option-array-index="9">Anguilla</li><li class="active-result" data-option-array-index="10">Antarctica</li><li class="active-result" data-option-array-index="11">Antigua and Barbuda</li><li class="active-result" data-option-array-index="12">Argentina</li><li class="active-result" data-option-array-index="13">Armenia</li><li class="active-result" data-option-array-index="14">Aruba</li><li class="active-result" data-option-array-index="15">Australia</li><li class="active-result" data-option-array-index="16">Austria</li><li class="active-result" data-option-array-index="17">Azerbaijan</li><li class="active-result" data-option-array-index="18">Bahamas</li><li class="active-result" data-option-array-index="19">Bahrain</li><li class="active-result" data-option-array-index="20">Bangladesh</li><li class="active-result" data-option-array-index="21">Barbados</li><li class="active-result" data-option-array-index="22">Belarus</li><li class="active-result" data-option-array-index="23">Belgium</li><li class="active-result" data-option-array-index="24">Belize</li><li class="active-result" data-option-array-index="25">Benin</li><li class="active-result" data-option-array-index="26">Bermuda</li><li class="active-result" data-option-array-index="27">Bhutan</li><li class="active-result" data-option-array-index="28">Bolivia, Plurinational State of</li><li class="active-result" data-option-array-index="29">Bonaire, Sint Eustatius and Saba</li><li class="active-result" data-option-array-index="30">Bosnia and Herzegovina</li><li class="active-result" data-option-array-index="31">Botswana</li><li class="active-result" data-option-array-index="32">Bouvet Island</li><li class="active-result" data-option-array-index="33">Brazil</li><li class="active-result" data-option-array-index="34">British Indian Ocean Territory</li><li class="active-result" data-option-array-index="35">Brunei Darussalam</li><li class="active-result" data-option-array-index="36">Bulgaria</li><li class="active-result" data-option-array-index="37">Burkina Faso</li><li class="active-result" data-option-array-index="38">Burundi</li><li class="active-result" data-option-array-index="39">Cambodia</li><li class="active-result" data-option-array-index="40">Cameroon</li><li class="active-result" data-option-array-index="41">Canada</li><li class="active-result" data-option-array-index="42">Cape Verde</li><li class="active-result" data-option-array-index="43">Cayman Islands</li><li class="active-result" data-option-array-index="44">Central African Republic</li><li class="active-result" data-option-array-index="45">Chad</li><li class="active-result" data-option-array-index="46">Chile</li><li class="active-result" data-option-array-index="47">China</li><li class="active-result" data-option-array-index="48">Christmas Island</li><li class="active-result" data-option-array-index="49">Cocos (Keeling) Islands</li><li class="active-result" data-option-array-index="50">Colombia</li><li class="active-result" data-option-array-index="51">Comoros</li><li class="active-result" data-option-array-index="52">Congo</li><li class="active-result" data-option-array-index="53">Congo, The Democratic Republic of The</li><li class="active-result" data-option-array-index="54">Cook Islands</li><li class="active-result" data-option-array-index="55">Costa Rica</li><li class="active-result" data-option-array-index="56">Cote D\'ivoire</li><li class="active-result" data-option-array-index="57">Croatia</li><li class="active-result" data-option-array-index="58">Cuba</li><li class="active-result" data-option-array-index="59">Curacao</li><li class="active-result" data-option-array-index="60">Cyprus</li><li class="active-result" data-option-array-index="61">Czech Republic</li><li class="active-result" data-option-array-index="62">Denmark</li><li class="active-result" data-option-array-index="63">Djibouti</li><li class="active-result" data-option-array-index="64">Dominica</li><li class="active-result" data-option-array-index="65">Dominican Republic</li><li class="active-result" data-option-array-index="66">Ecuador</li><li class="active-result" data-option-array-index="67">Egypt</li><li class="active-result" data-option-array-index="68">El Salvador</li><li class="active-result" data-option-array-index="69">Equatorial Guinea</li><li class="active-result" data-option-array-index="70">Eritrea</li><li class="active-result" data-option-array-index="71">Estonia</li><li class="active-result" data-option-array-index="72">Ethiopia</li><li class="active-result" data-option-array-index="73">Falkland Islands (Malvinas)</li><li class="active-result" data-option-array-index="74">Faroe Islands</li><li class="active-result" data-option-array-index="75">Fiji</li><li class="active-result" data-option-array-index="76">Finland</li><li class="active-result" data-option-array-index="77">France</li><li class="active-result" data-option-array-index="78">French Guiana</li><li class="active-result" data-option-array-index="79">French Polynesia</li><li class="active-result" data-option-array-index="80">French Southern Territories</li><li class="active-result" data-option-array-index="81">Gabon</li><li class="active-result" data-option-array-index="82">Gambia</li><li class="active-result" data-option-array-index="83">Georgia</li><li class="active-result" data-option-array-index="84">Germany</li><li class="active-result" data-option-array-index="85">Ghana</li><li class="active-result" data-option-array-index="86">Gibraltar</li><li class="active-result" data-option-array-index="87">Greece</li><li class="active-result" data-option-array-index="88">Greenland</li><li class="active-result" data-option-array-index="89">Grenada</li><li class="active-result" data-option-array-index="90">Guadeloupe</li><li class="active-result" data-option-array-index="91">Guam</li><li class="active-result" data-option-array-index="92">Guatemala</li><li class="active-result" data-option-array-index="93">Guernsey</li><li class="active-result" data-option-array-index="94">Guinea</li><li class="active-result" data-option-array-index="95">Guinea-bissau</li><li class="active-result" data-option-array-index="96">Guyana</li><li class="active-result" data-option-array-index="97">Haiti</li><li class="active-result" data-option-array-index="98">Heard Island and Mcdonald Islands</li><li class="active-result" data-option-array-index="99">Holy See (Vatican City State)</li><li class="active-result" data-option-array-index="100">Honduras</li><li class="active-result" data-option-array-index="101">Hong Kong</li><li class="active-result" data-option-array-index="102">Hungary</li><li class="active-result" data-option-array-index="103">Iceland</li><li class="active-result" data-option-array-index="104">India</li><li class="active-result" data-option-array-index="105">Indonesia</li><li class="active-result" data-option-array-index="106">Iran, Islamic Republic of</li><li class="active-result" data-option-array-index="107">Iraq</li><li class="active-result" data-option-array-index="108">Ireland</li><li class="active-result" data-option-array-index="109">Isle of Man</li><li class="active-result" data-option-array-index="110">Israel</li><li class="active-result" data-option-array-index="111">Italy</li><li class="active-result" data-option-array-index="112">Jamaica</li><li class="active-result" data-option-array-index="113">Japan</li><li class="active-result" data-option-array-index="114">Jersey</li><li class="active-result" data-option-array-index="115">Jordan</li><li class="active-result" data-option-array-index="116">Kazakhstan</li><li class="active-result" data-option-array-index="117">Kenya</li><li class="active-result" data-option-array-index="118">Kiribati</li><li class="active-result" data-option-array-index="119">Korea, Democratic People\'s Republic of</li><li class="active-result" data-option-array-index="120">Korea, Republic of</li><li class="active-result" data-option-array-index="121">Kuwait</li><li class="active-result" data-option-array-index="122">Kyrgyzstan</li><li class="active-result" data-option-array-index="123">Lao People\'s Democratic Republic</li><li class="active-result" data-option-array-index="124">Latvia</li><li class="active-result" data-option-array-index="125">Lebanon</li><li class="active-result" data-option-array-index="126">Lesotho</li><li class="active-result" data-option-array-index="127">Liberia</li><li class="active-result" data-option-array-index="128">Libya</li><li class="active-result" data-option-array-index="129">Liechtenstein</li><li class="active-result" data-option-array-index="130">Lithuania</li><li class="active-result" data-option-array-index="131">Luxembourg</li><li class="active-result" data-option-array-index="132">Macao</li><li class="active-result" data-option-array-index="133">Macedonia, The Former Yugoslav Republic of</li><li class="active-result" data-option-array-index="134">Madagascar</li><li class="active-result" data-option-array-index="135">Malawi</li><li class="active-result" data-option-array-index="136">Malaysia</li><li class="active-result" data-option-array-index="137">Maldives</li><li class="active-result" data-option-array-index="138">Mali</li><li class="active-result" data-option-array-index="139">Malta</li><li class="active-result" data-option-array-index="140">Marshall Islands</li><li class="active-result" data-option-array-index="141">Martinique</li><li class="active-result" data-option-array-index="142">Mauritania</li><li class="active-result" data-option-array-index="143">Mauritius</li><li class="active-result" data-option-array-index="144">Mayotte</li><li class="active-result" data-option-array-index="145">Mexico</li><li class="active-result" data-option-array-index="146">Micronesia, Federated States of</li><li class="active-result" data-option-array-index="147">Moldova, Republic of</li><li class="active-result" data-option-array-index="148">Monaco</li><li class="active-result" data-option-array-index="149">Mongolia</li><li class="active-result" data-option-array-index="150">Montenegro</li><li class="active-result" data-option-array-index="151">Montserrat</li><li class="active-result" data-option-array-index="152">Morocco</li><li class="active-result" data-option-array-index="153">Mozambique</li><li class="active-result" data-option-array-index="154">Myanmar</li><li class="active-result" data-option-array-index="155">Namibia</li><li class="active-result" data-option-array-index="156">Nauru</li><li class="active-result" data-option-array-index="157">Nepal</li><li class="active-result" data-option-array-index="158">Netherlands</li><li class="active-result" data-option-array-index="159">New Caledonia</li><li class="active-result" data-option-array-index="160">New Zealand</li><li class="active-result" data-option-array-index="161">Nicaragua</li><li class="active-result" data-option-array-index="162">Niger</li><li class="active-result" data-option-array-index="163">Nigeria</li><li class="active-result" data-option-array-index="164">Niue</li><li class="active-result" data-option-array-index="165">Norfolk Island</li><li class="active-result" data-option-array-index="166">Northern Mariana Islands</li><li class="active-result" data-option-array-index="167">Norway</li><li class="active-result" data-option-array-index="168">Oman</li><li class="active-result" data-option-array-index="169">Pakistan</li><li class="active-result" data-option-array-index="170">Palau</li><li class="active-result" data-option-array-index="171">Palestinian Territory, Occupied</li><li class="active-result" data-option-array-index="172">Panama</li><li class="active-result" data-option-array-index="173">Papua New Guinea</li><li class="active-result" data-option-array-index="174">Paraguay</li><li class="active-result" data-option-array-index="175">Peru</li><li class="active-result" data-option-array-index="176">Philippines</li><li class="active-result" data-option-array-index="177">Pitcairn</li><li class="active-result" data-option-array-index="178">Poland</li><li class="active-result" data-option-array-index="179">Portugal</li><li class="active-result" data-option-array-index="180">Puerto Rico</li><li class="active-result" data-option-array-index="181">Qatar</li><li class="active-result" data-option-array-index="182">Reunion</li><li class="active-result" data-option-array-index="183">Romania</li><li class="active-result" data-option-array-index="184">Russian Federation</li><li class="active-result" data-option-array-index="185">Rwanda</li><li class="active-result" data-option-array-index="186">Saint Barthelemy</li><li class="active-result" data-option-array-index="187">Saint Helena, Ascension and Tristan da Cunha</li><li class="active-result" data-option-array-index="188">Saint Kitts and Nevis</li><li class="active-result" data-option-array-index="189">Saint Lucia</li><li class="active-result" data-option-array-index="190">Saint Martin (French part)</li><li class="active-result" data-option-array-index="191">Saint Pierre and Miquelon</li><li class="active-result" data-option-array-index="192">Saint Vincent and The Grenadines</li><li class="active-result" data-option-array-index="193">Samoa</li><li class="active-result" data-option-array-index="194">San Marino</li><li class="active-result" data-option-array-index="195">Sao Tome and Principe</li><li class="active-result" data-option-array-index="196">Saudi Arabia</li><li class="active-result" data-option-array-index="197">Senegal</li><li class="active-result" data-option-array-index="198">Serbia</li><li class="active-result" data-option-array-index="199">Seychelles</li><li class="active-result" data-option-array-index="200">Sierra Leone</li><li class="active-result" data-option-array-index="201">Singapore</li><li class="active-result" data-option-array-index="202">Sint Maarten (Dutch part)</li><li class="active-result" data-option-array-index="203">Slovakia</li><li class="active-result" data-option-array-index="204">Slovenia</li><li class="active-result" data-option-array-index="205">Solomon Islands</li><li class="active-result" data-option-array-index="206">Somalia</li><li class="active-result" data-option-array-index="207">South Africa</li><li class="active-result" data-option-array-index="208">South Georgia and The South Sandwich Islands</li><li class="active-result" data-option-array-index="209">South Sudan</li><li class="active-result" data-option-array-index="210">Spain</li><li class="active-result" data-option-array-index="211">Sri Lanka</li><li class="active-result" data-option-array-index="212">Sudan</li><li class="active-result" data-option-array-index="213">Suriname</li><li class="active-result" data-option-array-index="214">Svalbard and Jan Mayen</li><li class="active-result" data-option-array-index="215">Swaziland</li><li class="active-result" data-option-array-index="216">Sweden</li><li class="active-result" data-option-array-index="217">Switzerland</li><li class="active-result" data-option-array-index="218">Syrian Arab Republic</li><li class="active-result" data-option-array-index="219">Taiwan, Province of China</li><li class="active-result" data-option-array-index="220">Tajikistan</li><li class="active-result" data-option-array-index="221">Tanzania, United Republic of</li><li class="active-result" data-option-array-index="222">Thailand</li><li class="active-result" data-option-array-index="223">Timor-leste</li><li class="active-result" data-option-array-index="224">Togo</li><li class="active-result" data-option-array-index="225">Tokelau</li><li class="active-result" data-option-array-index="226">Tonga</li><li class="active-result" data-option-array-index="227">Trinidad and Tobago</li><li class="active-result" data-option-array-index="228">Tunisia</li><li class="active-result" data-option-array-index="229">Turkey</li><li class="active-result" data-option-array-index="230">Turkmenistan</li><li class="active-result" data-option-array-index="231">Turks and Caicos Islands</li><li class="active-result" data-option-array-index="232">Tuvalu</li><li class="active-result" data-option-array-index="233">Uganda</li><li class="active-result" data-option-array-index="234">Ukraine</li><li class="active-result" data-option-array-index="235">United Arab Emirates</li><li class="active-result" data-option-array-index="236">United Kingdom</li><li class="active-result" data-option-array-index="237">United States</li><li class="active-result" data-option-array-index="238">United States Minor Outlying Islands</li><li class="active-result" data-option-array-index="239">Uruguay</li><li class="active-result" data-option-array-index="240">Uzbekistan</li><li class="active-result" data-option-array-index="241">Vanuatu</li><li class="active-result" data-option-array-index="242">Venezuela, Bolivarian Republic of</li><li class="active-result" data-option-array-index="243">Viet Nam</li><li class="active-result" data-option-array-index="244">Virgin Islands, British</li><li class="active-result" data-option-array-index="245">Virgin Islands, U.S.</li><li class="active-result" data-option-array-index="246">Wallis and Futuna</li><li class="active-result" data-option-array-index="247">Western Sahara</li><li class="active-result" data-option-array-index="248">Yemen</li><li class="active-result" data-option-array-index="249">Zambia</li><li class="active-result" data-option-array-index="250">Zimbabwe</li></ul></div></div>
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
 <script src="js/add_factura.js"></script>
 </form>
</body>
</html>
