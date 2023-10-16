<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class C_kendaraan extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('Model_kendaraan');

		 if(empty($this->session->userdata('username'))){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Anda belum login!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect('Auth/login');
          }
          elseif($this->session->userdata('role') != '1'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              anda tidak memiliki akses kehalaman ini!
              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
            redirect('C_dashboard');
          }
    }

    public function index(){
		$data['title'] = "Pemeliharaan Kendaraan";
        $data['kendaraan'] = $this->Model_kendaraan->get_data('kendaraan')->result();
        
		$this->load->view('templates/header',$data);
        $this->load->view('kendaraan',$data);
		$this->load->view('templates/footer',$data);
    }   

    
    public function tambah_kendaraan() {
        $data['kendaraan'] = $this->Model_kendaraan->get_data('kendaraan')->result();
    }


    public function aksi_tambah_kendaraan(){
        $this->_rules();

        if($this->form_validation->run()== false){
            $this->tambah_kendaraan();
        }else{
        $no_kendaraan       = $this->input->post('no_kendaraan');
        $merek_kendaraan    = $this->input->post('merek_kendaraan');
        $jenis_kendaraan    = $this->input->post('jenis_kendaraan');
        $pajak_lima_tahun   = $this->input->post('pajak_lima_tahun');
        $pajak_tahunan      = $this->input->post('pajak_tahunan');
        $kir                = $this->input->post('kir');
        $jadwal_service     = $this->input->post('jadwal_service');
        $status_kendaraan             = '1';
      //  $catatan_keluhan    = $this->input->post('catatan_keluhan');
        }
        $data = array(
            'no_kendaraan'          =>$no_kendaraan,
            'jenis_kendaraan'       =>$jenis_kendaraan,
            'merek_kendaraan'       =>$merek_kendaraan,
            'pajak_lima_tahun'      =>$pajak_lima_tahun,
            'pajak_tahunan'         =>$pajak_tahunan,
            'kir'                   =>$kir,
            'jadwal_service'        =>$jadwal_service,
            'status_kendaraan'      =>$status_kendaraan,
          //  'catatan_keluhan'       =>$catatan_keluhan,
        );
        $this->Model_kendaraan->insert_data($data, 'kendaraan');
       $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
        redirect('C_kendaraan');
    }

    public function hapus_kendaraan($id){
        $where = array('id_kendaraan' => $id);
        $this->Model_kendaraan->delete_kendaraan($where, 'kendaraan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-
        success alert-dismissible fade show" role="alert">
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('C_kendaraan');
    }

    public function kendaraan(){
        $data['kendaraan'] = $this->Model_kendaraan->get_data('kendaraan')->result();
        $this->load->view('pemeliharaan',$data);
    }
    public function edit_kendaraan($id){
        $where = array('id_kendaraan' => $id);
        $data['kendaraan'] = $this->db->query("SELECT * FROM kendaraan WHERE id_kendaraan = '$id'")->result();
        $this->load->view('editpemeliharaan', $data);

    }

    public function aksi_edit_kendaraan(){
        $this->_rules2();

        if($this->form_validation->run()== false){
            $id = $this->input->post('id_kendaraan');
        $this->update_kendaraan($id);
        }else{
            $id_kendaraan       = $this->input->post('id_kendaraan');
          // $no_kendaraan       = $this->input->post('no_kendaraan');
          // $jenis_kendaraan     = $this->input->post('jenis_kendaraan');
          //  $merek_kendaraan    = $this->input->post('jenis_kendaraan');
            $pajak_lima_tahun   = $this->input->post('pajak_lima_tahun');
            $pajak_tahunan      = $this->input->post('pajak_tahunan');
            $kir                = $this->input->post('kir');
            $jadwal_service     = $this->input->post('jadwal_service');
           $catatan_keluhan    = $this->input->post('catatan_keluhan');
        
            
            $data = array(
                'pajak_lima_tahun'      =>$pajak_lima_tahun,
                'pajak_tahunan'         =>$pajak_tahunan,
                'kir'                   =>$kir,
                'jadwal_service'        =>$jadwal_service,
              'catatan_keluhan'         =>$catatan_keluhan,
                
            );

            $where = array (
                'id_kendaraan'          => $id_kendaraan);

            $this->Model_kendaraan->update_data('kendaraan', $data ,$where);
            $this->session->set_flashdata('ubah','Data Berhasil Ditambahkan');
                redirect('C_kendaraan');
        
        }
    }

    

    public function _rules(){
        $this->form_validation->set_rules('no_kendaraan','No_kendaraan', 'required');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis_kendaraan', 'required');
        $this->form_validation->set_rules('merek_kendaraan', 'Merek_kendaraan', 'required');
        $this->form_validation->set_rules('pajak_lima_tahun','Pajak_lima_tahun','required');
        $this->form_validation->set_rules('pajak_tahunan','Pajak_tahunan','required');
        $this->form_validation->set_rules('kir','Kir','required');
        $this->form_validation->set_rules('jadwal_service','Jadwal_service','required');
        //$this->form_validation->set_rules('catatan_keluhan','Catatan_keluhan','required');
    }

    public function _rules2(){
        //$this->form_validation->set_rules('no_kendaraan','No_kendaraan', 'required');
       // $this->form_validation->set_rules('jenis_kendaraan', 'Jenis_kendaraan', 'required');
       // $this->form_validation->set_rules('merek_kendaraan', 'Merek_kendaraan', 'required');
        $this->form_validation->set_rules('pajak_lima_tahun','Pajak_lima_tahun','required');
        $this->form_validation->set_rules('pajak_tahunan','Pajak_tahunan','required');
        $this->form_validation->set_rules('kir','Kir','required');
        $this->form_validation->set_rules('jadwal_service','Jadwal_service','required');
      //  $this->form_validation->set_rules('catatan_keluhan','Catatan_keluhan','required');
    }



}

/*
    public function edit($no_kendaraan) {
        // Ambil data kendaraan berdasarkan no_kendaraan
        $data['kendaraan'] = $this->Model_kendaraan->get_kendaraan_by_no_kendaraan($no_kendaraan);
        $this->load->view('edit_kendaraan', $data); // Tampilkan view edit_kendaraan dengan data kendaraan

        

    }
    public function update() {
        // Proses pembaruan data kendaraan di sini
        // Anda dapat menggunakan $this->input->post() untuk mendapatkan data yang diubah dari form
    
        $no_kendaraan = $this->input->post('no_kendaraan');
        $pajak_lima_tahun = $this->input->post('pajak_lima_tahun');
        $pajak_tahunan = $this->input->post('pajak_tahunan');
        $kir = $this->input->post('kir');
        $jadwal_service = $this->input->post('jadwal_service');
    
        // Validasi data jika diperlukan
        // Contoh:
        // if (empty($pajak_lima_tahun)) {
        //     echo "Pajak Lima Tahun harus diisi.";
        //     return;
        // }
    
        // Update data kendaraan dalam database
        $data = array(
            'pajak_lima_tahun' => $pajak_lima_tahun,
            'pajak_tahunan' => $pajak_tahunan,
            'kir' => $kir,
            'jadwal_service' => $jadwal_service
        );
    
        $this->db->where('no_kendaraan', $no_kendaraan);
        $this->db->update('kendaraan', $data);
    
        // Redirect ke halaman lain atau tampilkan pesan sukses
        redirect('kendaraan/edit/'.$no_kendaraan);
    }*/
    
    ?>
