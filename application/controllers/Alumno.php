<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

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

	public function __construct(){
		parent::__construct();


		header( 'X-Content-Type-Options: nosniff' );
		header( 'X-Frame-Options: SAMEORIGIN' );
		header( 'X-XSS-Protection: 1; mode=block' );

	}

	 public function welcome(){
		$this->load->model('Alumno_model');
 		$this->load->view('alumno/welcome');
	 }

	 public function crearAlumno(){
			$this->load->library('bcrypt');
		  $this->load->model('Admin_model');


		  $datap = $this->Admin_model->get_carreras();

		  $data6 = array(
			  'data' => $datap
		  );

		  $this->load->view('Alumno/create',$data6);

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
				  redirect('Alumno/crearAlumno', 'refresh');
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
					  redirect('Alumno/crearAlumno', 'refresh');
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


									  redirect('Alumno/crearAlumno', 'refresh');
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
										  'estado' => 1,
										  'imagen' => $y,
										  'celular' => $this->input->post('celular')
									  );


									  $id_a = NULL;

									  $id = $this->Admin_model->create_user($data);

									  $data1=array(
										  'idAlumno' => $id,
										  'carrera' => $this->input->post('carrera'),
										  'matricula' => $this->input->post('username')
									  );

									  $this->Admin_model->crearAlumno($data1);

									  echo("<script>alert(Usuario agregado exitosamente. Puede usar el sistema de inmediato)</script>");
									  //echo("Usuario agregado exitosamente");
									  redirect('Ingreso/login', 'refresh');

					  }


				  }

			  }
		  }





  }



	public function crearCita($id){
		$this->load->model('Cita_model');
		$estado = $this->input->post('botonSubmit',true);
		$datax = $this->Alumno_model->get_profesor_info($id);
		$data = array(
			'data' => $datax
		);


		if(isset($estado)){

			$data = array(
				'idProfesor' => $id,
				'idAlumno' =>   $_SESSION['id'],
				'idEspecialidad' => $this->input->post('especialidad'),
				'idMateria' => $this->input->post('materia') ,
				'lugar' => $this->input->post('lugar'),
				'asunto' =>$this->input->post('asunto'),
				'fechaCita' =>$this->input->post('fecha'),
				'hora' =>$this->input->post('hora')
			);
			$this->Cita_model->create_cita($data);
			redirect('alumno/welcome', 'refresh');

		}



	}

	public function updateCita($id){

		$this->load->model('Cita_model');
		$estado = $this->input->post('botonSubmit',true);

		if(isset($estado)){


			$this->form_validation->set_rules('fecha','trim|xss_clean|strip_tags|required');
			$this->form_validation->set_rules('hora','trim|xss_clean|strip_tags|required');
			$data = array(
				'fechaCita' =>$this->input->post('fecha'),
				'hora' =>$this->input->post('hora')
			);

			$this->Cita_model->update_cita($data,$id);

		}

	}


}
?>
