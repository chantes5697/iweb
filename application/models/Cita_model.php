<?php
    class Cita_model extends CI_Model {


        public function __construct(){
            parent::__construct();
            $this->load->database();
            //$this->load->session();
        }

        public function checktime_cita($data){
          $this->db->select('fechaCita as fecha, hora');
          $this->db->from('cita');
          $this->db->where('idProfesor',$data['idp']);
          $this->db->or_where('idAlumno',$data['ida']);
          $this->db->where('fechaCita',$data['fecha']);
          return $this->db->get()->result_array();
        }

        public function create_cita($data){


          return $this->db->insert('cita',$data);



        }

        public function get_profesor_info($id){
          $this->db->select(' user.nombre as nombre, user.ApellidoP as apellidop,
          user.apellidoM as apellidom, user.idUser as id, profesor.esp as esp1,
          profesor.esp2 as esp2, profesor.esp3 as esp3, profesor.matricula as matriculap ');
          $this->db->from('user');
          $this->db->join('profesor', 'user.idUser = profesor.idProfesor');

          $this->db->where('user.idUser',$id);
          return $this->db->get()->result_array();
        }

        public function get_profesores_act(){
          $this->db->select(' user.nombre as nombre, user.ApellidoP as apellidop,
          user.apellidoM as apellidom, user.idUser as id, profesor.esp as esp1,
          profesor.esp2 as esp2, profesor.esp3 as esp3, profesor.matricula as matriculap ');
          $this->db->from('user');
          $this->db->join('profesor', 'user.idUser = profesor.idProfesor');
          $estado = 1;
          $this->db->where('user.estado',$estado);
          return $this->db->get()->result_array();
        }

        public function update_cita($data,$id){

          $this->db->where('id_cita',$id);
          $this->db->update('cita',$data);

        }


        public function rechazar_cita($id = null){
            if($id){
                $data = array(
                    'estado' => 2
                );

                $this->db->where('id_cita',$id);
                $this->db->update('cita',$data);
            }
        }

        public function aceptar_cita($id = null){
            if($id){
                $data = array(
                    'estado' => 1
                );

                $this->db->where('id_cita',$id);
                $this->db->update('cita',$data);
            }
        }

        public function completar_cita($id = null){
            if($id){
                $data = array(
                    'estado' => 3
                );

                $this->db->where('id_cita',$id);
                $this->db->update('cita',$data);
            }
        }


        public function get_citas($data){
            $this->db->select('*');
            $this->db->from('cita');
            $this->db->where('idProfesor',$data);
            $this->db->or_where('idAlumno',$data);
            $query = $this->db->get()->result_array();
            return ($query);
        }



        public function get_categoria(){
            $this->db->select('*');
            $this->db->from('especialidad');

            $query = $this->db->get()->result_array();
            return ($query);
        }

        /*
            NOTA:   Revisar que valores de las llaves foraneas se deben devolver, mientras solo se regresan las llaves 05:02 pm 15/11/19
        */


    }
?>
