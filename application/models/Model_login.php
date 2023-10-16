<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model{

    public function login($username, $password){
        $username = set_value('username');
        $password = set_value('password');
    
        $result = $this->db->where('username', $username)
                 ->where('password',md5($password))
                 ->limit(1)
                 ->get('user');
    
        if($result->num_rows() > 0){
          return $result->row();
        }
        else{
          return FALSE;
        }
      }

      public function role()
      {
          $this->db->select('*');
          $this->db->from('user');
          $this->db->where('role = 1 or 2');
          $this->db->order_by('username');
          return $this->db->get()->result();
      }
      
}
