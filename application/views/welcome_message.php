<?php
    defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/bootstrap.min.css") ?>'>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/font-awesome.min.css") ?>'>
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/owl.carousel.css") ?>'>
    <link rel="stylesheet" href='<?php echo base_url("public/css/owl.theme.css") ?>'>
    <link rel="stylesheet" href='<?php echo base_url("public/css/owl.transitions.css") ?>'>
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/animate.css") ?>'>
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/normalize.css") ?>'>
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/main.css") ?>'>
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/morrisjs/morris.css") ?>'>
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/scrollbar/jquery.mCustomScrollbar.min.css") ?>'>
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/metisMenu/metisMenu.min.css") ?>'>
    <link rel="stylesheet" href='<?php echo base_url("public/css/metisMenu/metisMenu-vertical.css") ?>'>
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/calendar/fullcalendar.min.css") ?>'>
    <link rel="stylesheet" href='<?php echo base_url("public/css/calendar/fullcalendar.print.min.css") ?>'>
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/form/all-type-forms.css") ?>'>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/style.css")?>'>
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/responsive.css") ?>'>
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url('public/js/vendor/modernizr-2.8.3.min.js')?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO APP</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <?php echo form_open('Ingreso/login')?>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
														<?php
																$data = array(
																		'class' => "btn btn-success btn-block loginbtn"
																);

																echo form_submit('botonSubmit', 'Login', $data);
														?>
                            <p>Eres un alumno, y no tienes una cuenta?, creala aqui </p> <br>
                            <a class="btn btn-default btn-block" href="<?php echo base_url('index.php/alumno/crearAlumno')?>">Register</a>

                            <p>Eres un profesor, y no tienes una cuenta?, creala aqui </p> <br>
                            <a class="btn btn-default btn-block" href="<?php echo base_url('index.php/profesor/crearProfesor')?>">Register</a>
                        <?php echo form_close()?>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div>
		</div>
    </div>
    <!-- jquery
		============================================ -->
    <script src='<?php echo base_url("public/js/vendor/jquery-1.12.4.min.js") ?>'></script>
    <!-- bootstrap JS
		============================================ -->
    <script src='<?php echo base_url("public/js/bootstrap.min.js") ?>'></script>
    <!-- wow JS
		============================================ -->
    <script src='<?php echo base_url("public/js/wow.min.js") ?>'></script>
    <!-- price-slider JS
		============================================ -->
    <script src='<?php echo base_url("public/js/jquery-price-slider.js") ?>'></script>
    <!-- meanmenu JS
		============================================ -->
    <script src='<?php echo base_url("public/js/jquery.meanmenu.js") ?>'></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src='<?php echo base_url("public/js/owl.carousel.min.js") ?>'></script>
    <!-- sticky JS
		============================================ -->
    <script src='<?php echo base_url("public/js/jquery.sticky.js") ?>'></script>
    <!-- scrollUp JS
		============================================ -->
    <script src='<?php echo base_url("public/js/jquery.scrollUp.min.js") ?>'></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src='<?php echo base_url("public/js/scrollbar/jquery.mCustomScrollbar.concat.min.js") ?>'></script>
    <script src='<?php echo base_url("public/js/scrollbar/mCustomScrollbar-active.js") ?>'></script>
    <!-- metisMenu JS
		============================================ -->
    <script src='<?php echo base_url("public/js/metisMenu/metisMenu.min.js") ?>'></script>
    <script src='<?php echo base_url("public/js/metisMenu/metisMenu-active.js") ?>'></script>
    <!-- tab JS
		============================================ -->
    <script src='<?php echo base_url("public/js/tab.js") ?>'></script>
    <!-- icheck JS
		============================================ -->
    <script src='<?php echo base_url("public/js/icheck/icheck.min.js") ?>'></script>
    <script src='<?php echo base_url("public/js/icheck/icheck-active.js") ?>'></script>
    <!-- plugins JS
		============================================ -->
    <script src='<?php echo base_url("public/js/plugins.js") ?>'></script>
    <!-- main JS
		============================================ -->
    <script src='<?php echo base_url("public/js/main.js") ?>'></script>
    <!-- tawk chat JS
		============================================ -->
    <script src='<?php echo base_url("public/js/tawk-chat.js") ?>'></script>
</body>

</html>
