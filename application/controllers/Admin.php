<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


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

   public function welcome()
   {

       $this->load->model('Admin_model');
       $id = $_SESSION['id'];
       $data1=$this->Admin_model->get_profesores_des($id);
       if($data1){

         foreach ($data1 as &$k) {
           // code...
           $datax =$this->Admin_model->get_categoria_by_id($k['esp1']) ;
           $k['esp1']= $datax[0]['name'];
           $datax =$this->Admin_model->get_categoria_by_id($k['esp2']) ;
           $k['esp2']= $datax[0]['name'];
           $datax =$this->Admin_model->get_categoria_by_id($k['esp3']) ;
           $k['esp3']= $datax[0]['name'];
         }

       }


       $data2=$this->Admin_model->get_profesores_act($id);
       if($data2){

         foreach ($data2 as &$k) {
           // code...
           $datax =$this->Admin_model->get_categoria_by_id($k['esp1']) ;
           $k['esp1']= $datax[0]['name'];
           $datax =$this->Admin_model->get_categoria_by_id($k['esp2']) ;
           $k['esp2']= $datax[0]['name'];
           $datax =$this->Admin_model->get_categoria_by_id($k['esp3']) ;
           $k['esp3']= $datax[0]['name'];
         }

       }


       $data3=$this->Admin_model->get_alumnos_des($id);
       if($data3){

         foreach ($data3 as &$k) {
           // code...
           $datax =$this->Admin_model->get_carrera_by_id($k['carrera']) ;
           $k['carrera']= $datax[0]['name'];
         }

       }

       $data4=$this->Admin_model->get_alumnos_act($id);
       if($data4){

         foreach ($data4 as &$k) {
           // code...
           $datax =$this->Admin_model->get_carrera_by_id($k['carrera']) ;
           $k['carrera']= $datax[0]['name'];
         }

       }

       $data  = array(
         'data1' => $data1,
         'data2' => $data2,
         'data3' => $data3,
         'data4' => $data4,
       );

       $this->load->view('admin/welcome',$data);
   }




  public function aprobar_usuario($id){
    $this->load->model('Admin_model');
    $this->Admin_model->activar_usuario($id);
    redirect('Admin/welcome', 'refresh');
  }

  public function delete_usuario($id){
    $this->load->model('Admin_model');
    $this->Admin_model->delete_usuario($id);
    redirect('Admin/welcome', 'refresh');
  }

  public function reportes(){
    $this->load->model('Admin_model');
    $id = $_SESSION['id'];
    $data1=$this->Admin_model->get_especialidad();
    if($data1){

      foreach ($data1 as &$k) {
        // code...
        $datax =$this->Admin_model->contar_citase_by_id($k['especialidad_id']) ;
        $k['citas']= $datax;

      }

    }


    $data2=$this->Admin_model->get_profesores_act();
    if($data2){

      foreach ($data2 as &$k) {
        // code...
        $datax =$this->Admin_model->get_categoria_by_id($k['esp1']) ;
        $k['esp1']= $datax[0]['name'];
        $datax =$this->Admin_model->get_categoria_by_id($k['esp2']) ;
        $k['esp2']= $datax[0]['name'];
        $datax =$this->Admin_model->get_categoria_by_id($k['esp3']) ;
        $k['esp3']= $datax[0]['name'];
        $datay =$this->Admin_model->contar_citasp_by_id($k['id']) ;
        $k['citas']= $datay;
      }

    }


    $data3=$this->Admin_model->get_alumnos_act();
    if($data3){

      foreach ($data3 as &$k) {
        // code...
        $datax =$this->Admin_model->get_carrera_by_id($k['carrera']) ;
        $k['carrera']= $datax[0]['name'];
        $datay =$this->Admin_model->contar_citasp_by_id($k['id']) ;
        $k['citas']= $datay;
      }

    }



    $data  = array(
      'data1' => $data1,
      'data2' => $data2,
      'data3' => $data3,
     );

    $this->load->view('admin/reporte',$data);

  }

  public function contar_citas_profe($id){
    $this->load->model('Admin_model');
    $data = $this->Admin_model->get_profesor_info($id);
    $data1 = $this->Admin_model->contar_citasp_by_id($id);
    $data2 = array(
      'data' => $data,
      'data1' => $data1
    );
    $this->load->view('',$data2);
  }

  public function contar_citas_alumno($id){
    $this->load->model('Admin_model');
    $data = $this->Admin_model->get_alumno_info($id);
    $data1 = $this->Admin_model->contar_citasa_by_id($id);
    $data2 = array(
      'data' => $data,
      'data1' => $data1
    );
    $this->load->view('',$data2);
  }

  public function contar_citas_materia($id){
    $this->load->model('Admin_model');
    $data = $this->Admin_model->get_profesor_info($id);
    $data1 = $this->Admin_model->contar_citasa_by_id($id);
    $data2 = array(
      'data' => $data,
      'data1' => $data1
    );
    $this->load->view('',$data2);
  }




}
