<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Profesor_model extends CI_Model{

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

      public function get_citas_pendientes($id){
        $this->db->select('cita.id_cita as id_cita, user.nombre as nombre, user.ApellidoP as apellidop,
         user.apellidom as apellidom, cita.fechacita as fecha, cita.idespecialidad as especialidad,
         cita.hora as hora, cita.create_time as fechac, cita.idmateria as materia, cita.lugar as lugarc
         cita.asunto as asunto ');
        $this->db->from('cita');
        $this->db->join('user', 'user.idUser = cita.idAlumno', 'inner');
        $this->db->where('cita.idProfesor',$id);
        $edo = 0;
        $this->db->where('cita.estado',$edo);
        return $this->db->get()->result_array();
      }

      public function get_citas_aceptadas($id){
        $this->db->select('cita.id_cita as id_cita, user.nombre as nombre, user.ApellidoP as apellidop,
         user.apellidom as apellidom, cita.fechacita as fecha, cita.idespecialidad as especialidad,
         cita.hora as hora, cita.create_time as fechac, cita.idmateria as materia, cita.lugar as lugarc
         cita.asunto as asunto ');
        $this->db->from('cita');
        $this->db->join('user', 'user.idUser = cita.idAlumno', 'inner');
        $this->db->where('cita.idProfesor',$id);
        $edo = 1;
        $this->db->where('cita.estado',$edo);
        return $this->db->get()->result_array();
      }

      public function get_citas_rechazadas($id){
        $this->db->select('cita.id_cita as id_cita, user.nombre as nombre, user.ApellidoP as apellidop,
         user.apellidom as apellidom, cita.fechacita as fecha, cita.idespecialidad as especialidad,
         cita.hora as hora, cita.create_time as fechac, cita.idmateria as materia, cita.lugar as lugarc
         cita.asunto as asunto ');
        $this->db->from('cita');
        $this->db->join('user', 'user.idUser = cita.idAlumno', 'inner');
        $this->db->where('cita.idProfesor',$id);
        $edo = 2;
        $this->db->where('cita.estado',$edo);
        return $this->db->get()->result_array();
      }

      public function get_citas_completas($id){
        $this->db->select('cita.id_cita as id_cita, user.nombre as nombre, user.ApellidoP as apellidop,
         user.apellidom as apellidom, cita.fechacita as fecha, cita.idespecialidad as especialidad,
         cita.hora as hora, cita.create_time as fechac, cita.idmateria as materia, cita.lugar as lugarc
         cita.asunto as asunto ');
        $this->db->from('cita');
        $this->db->join('user', 'user.idUser = cita.idAlumno', 'inner');
        $this->db->where('cita.idProfesor',$id);
        $edo = 3;
        $this->db->where('cita.estado',$edo);
        return $this->db->get()->result_array();
      }











    }



?>
