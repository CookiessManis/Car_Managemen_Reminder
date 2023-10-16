<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class C_booking extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('Model_booking');
        $this->load->model('Model_kendaraan');
        if(empty($this->session->userdata('username'))){
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Anda belum login !!!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
          redirect('C_login/login');
        }
    }

    public function index(){
				$data['title'] = 'Penggunaan Kendaraan';
        $data['kendaraan'] = $this->Model_kendaraan->get_data('kendaraan')->result();
        $data['booking_kendaraan'] = $this->Model_booking->get_data();
        
				$this->load->view('templates/header',$data);
        $this->load->view('booking_kendaraan',$data);
				$this->load->view('templates/footer',$data);
    }

    public function aksi_tambah_booking(){
      $this->_rules();
      if($this-> form_validation->run()== false){
        $this->index();
      }else{
        $id                        = $this->input->post('id');
        $tanggal                   = $this->input->post('tanggal');
        $lokasi                    = $this->input->post('lokasi');
        $acara                     = $this->input->post('acara');
        $waktu_berangkat           = $this->input->post('waktu_berangkat');
        $waktu_pulang              = $this->input->post('waktu_pulang');
        $jumlah_personil           = $this->input->post('jumlah_personil');
        $driver                    = $this->input->post('driver');
        $id_kendaraan              = $this->input->post('id_kendaraan');
        $status_booking            = '1';
      
        $data = array(
          'tanggal'               => $tanggal,
          'lokasi'                =>$lokasi,
            'acara'               =>$acara,
            'waktu_berangkat'     =>$waktu_berangkat,
            'waktu_pulang'        =>$waktu_pulang,
            'jumlah_personil'     =>$jumlah_personil,
            'driver'              =>$driver,
            'id_kendaraan'        =>$id_kendaraan,
            'status_booking'      =>$status_booking,
            
        );
        $this->Model_booking->insert_data($data, 'booking_kendaraan');

        $status = array('status_kendaraan'=> '2');
        $id = array('id_kendaraan'=>$id_kendaraan);
        $this->Model_kendaraan->update_data('kendaraan',$status, $id);
        $this->session->set_flashdata('pesan','data berhasil ditambahkan');
          redirect('C_booking');
      }
    }

    public function aksi_edit_catatan(){
      $id                 =$this->input->post('id');
      $id_kendaraan       =$this->input->post('id_kendaraan');
      $catatan_keluhan    = $this->input->post('catatan_keluhan');
      $status_kendaraan   = '1';
      $status_booking     ='2';

      $data = array(
        'status_booking' =>$status_booking,
        

      );
      $where = array('id' => $id);
      $this->Model_booking->update_data('booking_kendaraan',$data, $where);
      $status2 = array(
        'status_kendaraan' => $status_kendaraan,
        'catatan_keluhan' =>$catatan_keluhan,
      );
      $id2 =array('id_kendaraan' => $id_kendaraan); 
      $this->Model_kendaraan->update_data('kendaraan',$status2 ,$id2);
      $this->session->set_flashdata('catatan_ubah','catatan berhasil ditambahkan');
     redirect('C_booking');

      
    }    

    public function delete_booking($id){
    $where = array('id' => $id);
    $data = $this->Model_kendaraan->get_where($where, 'booking_kendaraan')->row();
    $where2 = array('id_kendaraan' => $data->id_kendaraan);
       $data2 = array('status_kendaraan'=>'1');
        $this->Model_kendaraan->update_data('kendaraan',$data2 ,$where2);
        $this->Model_booking->delete_booking($where, 'booking_kendaraan');
        $this->session->set_flashdata('hapus','data berhasil dihapus');
        redirect('C_booking');
      }


      public function edit_booking($id){
        $where = array('id' => $id);
        $data['booking_kendaraan'] =  $this->Model_booking->get_data_by_id($id);
        $data['kendaraan'] = $this->Model_kendaraan->get_data('kendaraan')->result();
        $this->load->view('Edit_booking', $data);

      }

      public function aksi_edit_booking(){
        $this->_rules();

      if($this-> form_validation->run()== false){
        $id = $this->input->post('id');
        $this->edit_booking($id);
      }else{
        $id                        = $this->input->post('id');
        $tanggal                   = $this->input->post('tanggal');
        $lokasi                    = $this->input->post('lokasi');
        $acara                     = $this->input->post('acara');
        $waktu_berangkat           = $this->input->post('waktu_berangkat');
        $waktu_pulang              = $this->input->post('waktu_pulang');
        $jumlah_personil           = $this->input->post('jumlah_personil');
        $driver                    = $this->input->post('driver');

        $where2 = array('id'=> $id);
        $data = $this->Model_booking->get_where($where2, 'booking_kendaraan')->row();
        $getdata_where_kendaraan = array('id_kendaraan'=> $data->id_kendaraan);
        $ubah_status_kendaraan = array('status_kendaraan'=>'1');
        $this->Model_kendaraan->update_data('kendaraan', $ubah_status_kendaraan, $getdata_where_kendaraan);

        $id_kendaraan              = $this->input->post('id_kendaraan');
        
        $data = array(
            'tanggal'               => $tanggal,
            'lokasi'                =>$lokasi,
            'acara'               =>$acara,
            'waktu_berangkat'     =>$waktu_berangkat,
            'waktu_pulang'        =>$waktu_pulang,
            'jumlah_personil'     =>$jumlah_personil,
            'driver'              =>$driver,
            'id_kendaraan'        =>$id_kendaraan,
            
        );
      }

        $where = array('id' => $id);
        $status = array('status_kendaraan'=> '2');
        $id = array('id_kendaraan'=>$id_kendaraan);
        $this->Model_kendaraan->update_data('kendaraan',$status, $id);
        $this->Model_booking->update_data('booking_kendaraan',$data, $where);
        $this->session->set_flashdata('ubah','Data berhasil diubah');
      redirect('C_booking');
      }

    public function _rules(){
        $this->form_validation->set_rules('tanggal','Tanggal', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('acara', 'Acara', 'required');
        $this->form_validation->set_rules('waktu_berangkat','Waktu_berangkat','required');
        $this->form_validation->set_rules('waktu_pulang','Waktu_pulang','required');
        $this->form_validation->set_rules('jumlah_personil','Dumlah_personil','required');
        $this->form_validation->set_rules('driver','Driver','required');
        $this->form_validation->set_rules('id_kendaraan','id_kendaraan','required');  
    }
}
