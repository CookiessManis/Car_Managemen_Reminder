<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_booking extends CI_Model{
  
    public function get_data(){
        $this->db->select('kendaraan.*, booking_kendaraan.*');
        $this->db->from('booking_kendaraan');
        $this->db->join('kendaraan',' kendaraan.id_kendaraan = booking_kendaraan.id_kendaraan');
        return $this->db->get()->result();
    }

    public function get_data_by_id($id){

    $this->db->select('*');
    $this->db->from('booking_kendaraan');
    $this->db->join('kendaraan', 'kendaraan.id_kendaraan = booking_kendaraan.id_kendaraan');
    $this->db->where('booking_kendaraan.id', $id);
    return $this->db->get()->result();
    }
  
    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }
    public function get_where($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function delete_booking($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($table , $data , $where){
        $this->db->update($table, $data ,$where);
    }


}

?>
