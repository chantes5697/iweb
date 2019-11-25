<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_model extends CI_Model{

      public function get_especialidad(){
        $this->db->select('*');
        $this->db->from('especialidad');
        return $this->db->get()->result_array();
      }


      public function get_carreras(){
        $this->db->select('*');
        $this->db->from('carrera');
        return $this->db->get()->result_array();
      }

      public function get_user($data){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$data);
        return $this->db->get()->result_array();
      }

      public function create_user($data){
          $this->db->insert('user',$data);
          return $this->db->insert_id();
      }

        public function crearProfesor($data){
          $this->db->insert('profesor',$data);
          return $this->db->insert_id();
        }

        public function crearAlumno($data){
          $this->db->insert('alumno',$data);
          return $this->db->insert_id();
        }

        public function get_alumno_info($id){
          $this->db->select('user.nombre as nombre, user.ApellidoP as apellidop,
          user.apellidoM as apellidom, user.idUser as id_user, alumno.carrera as carrera,
          alumno.matricula as matriculaa');
          $this->db->from('user');
          $this->db->join('alumno', 'user.idUser = alumno.idAlumno');
          $this->db->where('user.estado',$id);
          return $this->db->get()->result_array();
        }


        public function get_profesores_by_esp($id){
          $this->db->select('user.nombre as nombre, user.ApellidoP as apellidop,
          user.apellidoM as apellidom, user.idUser as id_user, profesor.esp as esp1,
          profesor.esp2 as esp2, profesor.esp3 as esp3, profesor.matricula as matriculap ');
          $this->db->from('user');
          $this->db->join('profesor', 'user.idUser = profesor.idProfesor');
          $this->db->where('profesor.esp',$id);
          $this->db->or_where('profesor.esp2',$id);
          $this->db->or_where('profesor.esp3',$id);
          return $this->db->get()->result_array();
        }



      public function get_profesores_des(){
        $this->db->select('user.idUser as id, user.nombre as nombre, user.ApellidoP as apellidop,
        user.apellidoM as apellidom, profesor.esp as esp1,
        profesor.esp2 as esp2, profesor.esp3 as esp3, profesor.matricula as matriculap ');
        $this->db->from('user');
        $this->db->join('profesor', 'user.idUser = profesor.idProfesor');
        $estado = 0;
        $this->db->where('user.estado',$estado);
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

      public function get_alumnos_des(){
        $this->db->select('user.nombre as nombre, user.ApellidoP as apellidop,
        user.apellidoM as apellidom, user.idUser as id, alumno.carrera as carrera,
        alumno.matricula as matriculaa');
        $this->db->from('user');
        $this->db->join('alumno', 'user.idUser = alumno.idAlumno');
        $estado = 0;
        $this->db->where('user.estado',$estado);
        return $this->db->get()->result_array();
      }

      public function get_alumnos_act(){
        $this->db->select('user.nombre as nombre, user.ApellidoP as apellidop,
        user.apellidoM as apellidom, user.idUser as id, alumno.carrera as carrera,
        alumno.matricula as matriculaa');
        $this->db->from('user');
        $this->db->join('alumno', 'user.idUser = alumno.idAlumno');
        $estado = 1;
        $this->db->where('user.estado',$estado);
        return $this->db->get()->result_array();
      }



      public function activar_usuario($id = null){
          if($id){
              $data = array(
                  'estado' => 1
              );

              $this->db->where('iduser',$id);
              $this->db->update('user',$data);
          }
      }

      public function delete_usuario($id = null){
          if($id){
              $data = array(
                  'estado' => 0
              );

              $this->db->where('iduser',$id);
              $this->db->update('user',$data);
          }
      }

      public function contar_citasp_by_id($id){
        $this->db->select('count(*) as allcount',true);
        $this->db->from('cita');
        $this->db->where('idProfesor',$id);
        $total = $this->db->get()->result_array();
        if($total){
          return $total[0]['allcount'];
        }else{
          return 0;
        }
      }

      public function contar_citasa_by_id($id){
        $this->db->select('count(*) as allcount',true);
        $this->db->from('cita');
        $this->db->where('idAlumno',$id);
        $total = $this->db->get()->result_array();
        if($total){
          return $total[0]['allcount'];
        }else{
          return 0;
        }
      }

      public function contar_citase_by_id($id){
        $this->db->select('count(*) as allcount',true);
        $this->db->from('cita');
        $this->db->where('idEspecialidad',$id);
        $total = $this->db->get()->result_array();
        if($total){
          return $total[0]['allcount'];
        }else{
          return 0;
        }
      }

      public function contar_citasm_by_id($id){
        $this->db->select('count(*) as allcount',true);
        $this->db->from('cita');
        $this->db->where('idMateria',$id);
        $total = $this->db->get()->result_array();
        if($total){
          return $total[0]['allcount'];
        }else{
          return 0;
        }
      }

      public function contar_citas_by_edo($id){
        $this->db->select('count(*) as allcount',true);
        $this->db->from('cita');
        $this->db->where('estado',$id);
        $total = $this->db->get()->result_array();
        if($total){
          return $total[0]['allcount'];
        }else{
          return 0;
        }
      }

      public function contar_citas(){
            ## Total number of records without filtering
            $this->db->select('count(*) as allcount',true);
            $this->db->from('cita');
            $total = $this->db->get()->result_array();
            if($total){
              return $total[0]['allcount'];
            }else{
              return 0;
            }
        }


      public function get_num_usuarios($data){
            $this->db->select('count(*) as c');
            $this->db->from('user');
            $this->db->where('username',$data);
            $total = $this->db->get()->result_array();
            if($total){
              return $total[0]['allcount'];
            }else{
              return 0;
            }
      }

      public function get_num_usuarios_tipo($data){
            $this->db->select('count(*) as c');
            $this->db->from('user');
            $this->db->where('tipo',$data);
            $total = $this->db->get()->result_array();
            if($total){
              return $total[0]['allcount'];
            }else{
              return 0;
            }
      }

      public function get_categoria_by_id($id){
        $this->db->select('name');
        $this->db->from('especialidad');
        $this->db->where('especialidad_id',$id);
        return $this->db->get()->result_array();
      }

      public function get_carrera_by_id($id){
        $this->db->select('name');
        $this->db->from('carrera');
        $this->db->where('carrera_id',$id);
        return $this->db->get()->result_array();
      }













    }



?>
