<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {


  public function __construct(){
   parent::__construct();
   header( 'X-Content-Type-Options: nosniff' );
   header( 'X-Frame-Options: SAMEORIGIN' );
   header( 'X-XSS-Protection: 1; mode=block' );

 }

  public function login(){
      $this->load->model('Ingreso_model');
      $this->load->view('welcome_message');
      $this->load->library('bcrypt');
      $this->load->library('session');
      $estado = $this->input->post('botonSubmit');

      //echo($this->input->post('username',true));

      if(isset($estado)){
          $this->form_validation->set_rules('username','Usuario','trim|xss_clean|strip_tags|required');
  		    $this->form_validation->set_rules('password','Password','trim|xss_clean|strip_tags|required');

          if($this->form_validation->run()==false){
      			//$this->load->view('Layout/header');
      				echo("<script>
                alert('Datos no validos')
              </script>");
      			redirect('ingreso/login', 'refresh');
      		}


      		else{

            //echo $pass;
            $data = array(
              'username' => $this->input->post('username',true)
            );
            $query2 = $this->Ingreso_model->get_num_usuarios($data['username']);
            var_dump($query2);
      			$query=$this->Ingreso_model->get_user($data['username']);
            //echo('<br>'.var_dump($query).'<br>');
              $pass = $this->input->post('password',true);
              $hash = $this->Ingreso_model->get_password();
            if($query2 == 0 || $query[0]['estado'] == 0 ){
              echo(
                "<script>
                  alert('Usuario no valido')
                </script>"
              );
              redirect('ingreso/login', 'refresh');
            }
            else{
                //var_dump($query);
                if($this->bcrypt->check_password($pass,$hash)){


                    $_SESSION['id'] = $query[0]['idUser'];
                    $_SESSION['username'] = $query[0]['username'];
                    $_SESSION['email'] = $query[0]['email'];
                    $_SESSION['tipo'] = $query[0]['tipo'];
                    $_SESSION['imagen'] = $query[0]['imagen'];
                    $_SESSION['nombre'] = $query[0]['nombre']." ".$query[0]['ApellidoP']." ".$query[0]['ApellidoM'];


                  switch ($query[0]['tipo']) {
                    case 2:
                      // code...


                      redirect('Profesor/welcome', 'refresh');
                    break;

                    case 3:
                      // code...

                      redirect('Alumno/welcome', 'refresh');
                    break;

                    default:
                      // code...

                      redirect('Admin/welcome', 'refresh');
                    break;
                  }

                }
                else{
                  echo(
                    "<script>
                      alert('Password no valida')
                    </script>"
                  );
          			  redirect('ingreso/login', 'refresh');
                }


          			//echo("Usuario agregado exitosamente");

          		}
            }


      }

  }
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
