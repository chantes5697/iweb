<<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <div class="login-page">

      <div class="form">

        <form class="login-form">
          <?php echo form_open_multipart('Ingreso/login')?>

          <?php
                echo form_label('Usuario', 'username');
                $data = array(
                    'type'  => 'text',
                    'name'  => 'username',
                    'id'    => 'username',
                    'class' => 'form-control text-capitalize',
                    'value' => ''
                );
                echo form_input($data);
          ?>

          <?php
                echo form_label('Password', 'password');
                $data = array(
                    'type'  => 'password',
                    'name'  => 'password',
                    'id'    => 'password',
                    'class' => 'form-control text-capitalize',
                    'value' => ''
                );


                echo form_input($data);

                $data = array(
      							'class' => "btn btn-primary btn-block btn-lg"
      					);

                echo form_submit('botonSubmit', 'Login', $data);
          ?>

          <input type="password" placeholder="password"/>
          <button>login</button>
          <?php echo form_close()?>
        </form>

      </div>

    </div>
  </body>
</html>
