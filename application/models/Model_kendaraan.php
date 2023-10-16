<?php

class Model_kendaraan extends CI_Model{


    public function get_data(){
        $this->db->select('*');
        $this->db->from('kendaraan');
        
        return $this->db->get('');
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }
    public function get_where($where, $table){
        return $this->db->get_where($table, $where);
      }

    public function delete_kendaraan($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($table , $data , $where){
        $this->db->update($table, $data ,$where);
    }

 public function get_keyword($keyword){
    $this->db->select('*');
    $this->db->from('kendaraan');
    $this->db->like('no_kendaraan', $keyword);
    $this->db->or_like('merek_kendaraan', $keyword);
    $this->db->or_like('jenis_kendaraan', $keyword);
    $this->db->or_like('pajak_lima_tahun', $keyword);
    $this->db->or_like('pajak_tahunan', $keyword);
    $this->db->or_like('kir', $keyword);
    $this->db->or_like('jadwal_service', $keyword);
    return $this->db->get()->result(); 

 }

 public function kendaraan_digunakan(){
	$this->db->where('status_kendaraan = 2');
	return $this->db->get('kendaraan')->num_rows();
 }

 public function kendaraan_tersedia(){
	$this->db->where('status_kendaraan = 1');
	return $this->db->get('kendaraan')->num_rows();
 }

 public function total_kendaraan(){
	return $this->db->get('kendaraan')->num_rows();
 }
    
    /*
    public function edit($data){
        $this->db->where('no_kendaraan', $data['no_kendaraan']);
        $this->db->update('kendaraan', $data);
    }
 
    public function get_kendaraan_by_id($id) {
       // $query = $this->db->get_where('kendaraan', array('no_kendaraan' => $id));
       // return $query->row();

       $where = array('no_kendaraan' => $id);
        $this->db->where($where);
        return $this->db->get('kendaraan')->result();
    }

    public function get_kendaraan_by_no_kendaraan($no_kendaraan) {
        $this->db->where('no_kendaraan', $no_kendaraan);
        return $this->db->get('kendaraan')->row();
    }*/

}




