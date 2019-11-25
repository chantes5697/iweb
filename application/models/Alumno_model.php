<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Alumno_model extends CI_Model
    {

      

      public function get_alumno_info($id){
        $this->db->select('user.nombre as nombre, user.ApellidoP as apellidop,
        user.apellidoM as apellidom, user.idUser as id_user, alumno.carrera as carrera,
        alumno.matricula as matricula');
        $this->db->from('user');
        $this->db->join('alumno', 'user.idUser = alumno.idAlumno');
        $this->db->where('user.estado',$id);
        return $this->db->get()->result_array();
      }

      public function get_profesor_info($id){
        $this->db->select('user.nombre as nombre, user.ApellidoP as apellidop,
        user.apellidoM as apellidom, user.idUser as id_user, profesor.esp as esp1,
        profesor.esp2 as esp2, profesor.esp3 as esp3, profesor.matricula as matriculap ');
        $this->db->from('user');
        $this->db->join('profesor', 'user.idUser = profesor.idProfesor');
        $estado = 0;
        $this->db->where('user.idUser',$id);
        return $this->db->get()->result_array();
      }

        public function get_citas_alumno($id){

          $this->db->select('cita.id_cita as id_cita, user.nombre as nombre,
           user.ApellidoP as apellidop, user.ApellidoM as apellidom, cita.fechaCita as fecha,
           cita.create_time as c_fecha, cita.idEspecialidad as especialidad,
           cita.idMateria as materia, cita.lugar as lugar, cita.asunto as asunto,
           cita.hora as hora');
          $this->db->from('user');
          $this->db->join('cita', 'user.idUser = cita.idProfesor','inner');
          $this->db->where('cita.idAlumno',$id);
          $edo = 1;
          $this->db->where('cita.estado',$edo);

        }













    }



?>
