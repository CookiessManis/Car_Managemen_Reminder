<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class C_dashboard extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('Model_login');
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
				$data['title'] = "Dashboard Utama";
				$data['total_kendaraan'] = $this->Model_kendaraan->total_kendaraan();
				$data['kendaraan_digunakan'] = $this->Model_kendaraan->kendaraan_digunakan();
				$data['kendaraan_tersedia'] = $this->Model_kendaraan->kendaraan_tersedia();
                $data['booking_kendaraan'] = $this->Model_booking->get_data();

				$this->load->view('templates/header',$data);
                $this->load->view('Dashboard',$data);
				$this->load->view('templates/footer',$data);
    }
}
    