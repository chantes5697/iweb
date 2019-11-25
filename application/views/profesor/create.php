
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | Kiaalap - Kiaalap Admin Template</title>
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
    <link rel="stylesheet" href='<?php echo base_url("public/style.css") ?>'>
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href='<?php echo base_url("public/css/responsive.css") ?>'>
    <!-- modernizr JS
		============================================ -->
    <script src='<?php echo base_url("public/js/vendor/modernizr-2.8.3.min.js") ?>'></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Registration</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <?php echo form_open_multipart('profesor/crearProfesor')?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Matricula (solo numeros, por favor)</label>
                                    <input class="form-control" name='username' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Nombre</label>
                                    <input class="form-control" name='nombre' type="text">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Apellido Paterno</label>
                                    <input class="form-control" name='apellidoP' type="text">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Apellido Materno</label>
                                    <input class="form-control" name='apellidoM' type="text">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name='password'>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" name='password2'>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name='fechaN'>
                                </div>


                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input class="form-control" type='email' name='email'>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Cubiculo</label>
                                    <input class="form-control" name='cubiculo' type="text">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Celular</label>
                                    <input class="form-control" name='celular' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Foto</label>
                                    <input class="form-control" type='file' name='imagen'>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Especialidad</label>
                                    <select class="form-control" name="esp">
                                      <?php
                                        foreach ($data as $k) {?>
                                          <option value="<?php echo($k["especialidad_id"]) ?>">
                                            <?php echo($k["name"]) ?>
                                          </option>

                                      <?php
                                        }
                                      ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Especialidad 2</label>
                                    <select class="form-control" name="esp2">
                                      <?php
                                        foreach ($data as $k) {?>
                                          <option value="<?php echo($k["especialidad_id"]) ?>">
                                            <?php echo($k["name"]) ?>
                                          </option>

                                      <?php
                                        }
                                      ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Especialidad 3</label>
                                    <select class="form-control" name="esp3">
                                      <?php
                                        foreach ($data as $k) {?>
                                          <option value="<?php echo($k["especialidad_id"]) ?>">
                                            <?php echo($k["name"]) ?>
                                          </option>

                                      <?php
                                        }
                                      ?>
                                    </select>
                                </div>




                            </div>
                            <div class="text-center">
                              <?php
                                  $data = array(
                                      'class' => "btn btn-success btn-block loginbtn"
                                  );

                                  echo form_submit('botonSubmit', 'Register', $data);
                              ?>
                            </div>
                        <?php echo form_close() ?>
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

    <script type="text/javascript">

      function validate(evt) {
          var theEvent = evt || window.event;

          // Handle paste
          if (theEvent.type === 'paste') {
              key = event.clipboardData.getData('text/plain');
          } else {
          // Handle key press
              var key = theEvent.keyCode || theEvent.which;
              key = String.fromCharCode(key);
          }
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
      }

    </script>
</body>

</html>
