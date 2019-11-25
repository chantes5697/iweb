<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Ingreso_model extends CI_Model {
      public function get_num_usuarios($data){
            $this->db->select('count(*) as c');
            $this->db->from('user');
            $this->db->where('username',$data);
            return $this->db->get()->result_array();
      }

      public function get_user($data){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$data);
        return $this->db->get()->result_array();
      }

      public function get_password(){
        $this->db->select('password');
        $this->db->from('user');
        $this->db->where('username',$this->input->post('username',true));
        $query = $this->db->get()->result_array();
        return ($query)?$query[0]['password']:false;
      }



    }
?>
