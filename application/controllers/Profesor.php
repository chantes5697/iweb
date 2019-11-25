<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Profesor extends CI_Controller {

   public function __construct(){
    parent::__construct();


    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-XSS-Protection: 1; mode=block' );

   }

   /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    *	- or -
    * 		http://example.com/index.php/welcome/index
    *	- or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */





   //=================FUNCIONES DE TIPO POST=================//

   public function welcome(){
     $this->load->model('Profesor_model');

     $id = $_SESSION['id'];

     $data = $this->Profesor_model->get_profesor_info($id);

     $data1 = array(
       'data' => $data
     );

     $this->load->view('abogado/content',$data1);


   }


   public function index()
   {

       $this->load->model('Profesor_model');
       $id = $_SESSION['id'];
       $data1=$this->Profesor_model->get_citas_pendientes($id);

       $data  = array('data1' => $data1,

       );

       $this->load->view('abogado/content',$data);
   }

   public function aceptados()
   {

       $this->load->model('Profesor_model');
       $id = $_SESSION['id'];

       $data2=$this->Profesor_model->get_citas_aceptadas($id);

       $data  = array('data1' => $data2,

       );

       $this->load->view('abogado/aceptados',$data);
   }

   public function rechazados()
   {

       $this->load->model('Profesor_model');
       $id = $_SESSION['id'];

       $data2=$this->Profesor_model->get_citas_rechazadas($id);
       $data  = array('data1' => $data2,
       );

       $this->load->view('abogado/rechazados',$data);
   }


   public function completados()
   {

       $this->load->model('Profesor_model');
       $id = $_SESSION['id'];

       $data2=$this->Profesor_model->get_citas_completas($id);
       $data  = array('data1' => $data2,
       );

       $this->load->view('abogado/completados',$data);
   }

   public function aceptar_caso($id){
     $this->load->model('Cita_model');
     $this->CasoM->aceptar_cita($id);
     redirect('Abogado/aceptados', 'refresh');
   }

   public function rechazar_caso($id){
     $this->load->model('Cita_model');
     $this->CasoM->rechazar_cita($id);
     redirect('Abogado/rechazados', 'refresh');
   }

   public function completar_caso($id){
     $this->load->model('Cita_model');
     $this->CasoM->completar_cita($id);
     redirect('Abogado/completados', 'refresh');
   }

   public function crearProfesor(){
    $this->load->library('bcrypt');
    $this->load->model('Admin_model');


    $datap = $this->Admin_model->get_especialidad();

    $data6 = array(
      'data' => $datap
    );

    $this->load->view('Profesor/create',$data6);

    $estado = $this->input->post('botonSubmit');

    if($estado){

    $pass = $this->input->post('password');
    $pass2 = $this->input->post('password2');

    $pass3 = strcmp($pass,$pass2);

      if($pass3 != 0){



        echo("<script>
              alert('Error al crear usuario');
              </script>

        ");
        echo
        redirect('profesor/crearprofesor', 'refresh');
      }

      else{
        $username = $this->Admin_model->get_user($this->input->post('username'));
        if ($username) {
          // code...
          echo("<script>
                  alert('Error al crear usuario:
                   Ya existe ese usuario');
                </script>

          ");
          redirect('profesor/crearprofesor', 'refresh');
        }
        else {
          // code...

          $config['upload_path']          = './public/uploads/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;

          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('imagen'))
          {
            echo("<script>
                    alert('Error al crear usuario:
                     ".$this->upload->display_errors().");
                  </script>

            ");


                  redirect('profesor/crearprofesor', 'refresh');
          }
          else
          {
                  $dataxy = array('upload_data' => $this->upload->data());
                  $y = $dataxy['upload_data']['full_path'];
                  $y = substr($y,21);
      
                  $pass = $this->bcrypt->hash_password($pass);
      
      
                  $data=array(
                    'username' => $this->input->post('username'),
                    'password' => $pass,
                    'email' => $this->input->post('email'),
                    'tipo' => 3,
                    'nombre' => $this->input->post('nombre'),
                    'ApellidoP' => $this->input->post('apellidoP'),
                    'ApellidoM' => $this->input->post('apellidoM'),
                    'fechaN' => $this->input->post('fechaN'),
                    'celular' => $this->input->post('celular'),
                    'estado' => 1,
                    'imagen' => $y
                  );
      
      
                  $id_a = NULL;
      
                  $id = $this->Admin_model->create_user($data);
      
                  $data1=array(
                    'idProfesor' => $id,
                    'cubiculo' => $this->input->post('cubiculo'),
                    'matricula' => $this->input->post('username'),
                    'esp' => $this->input->post('esp'),
                    'esp2' => $this->input->post('esp2'),
                    'esp3' => $this->input->post('esp3'),
                  );
      
                  $this->Admin_model->crearProfesor($data1);
      
                  echo("<script>alert(Usuario agregado exitosamente. Puede usar el sistema de inmediato)</script>");
                  //echo("Usuario agregado exitosamente");
                  redirect('Ingreso/login', 'refresh');

          }

         
        }

      }
    }





}






   //=================FUNCIONES QUE PUEDE REALIZAR ESTA CLASE=================//


}
?>
