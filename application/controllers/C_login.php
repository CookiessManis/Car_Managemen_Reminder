<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class C_login extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('Model_login');    
        $this->load->model('Model_booking');
        $this->load->model('Model_kendaraan');
    }
    

    public function login(){
        $this-> _rules();
        
        if ($this->form_validation->run()== false){
            $this->load->view('V_login');
        }else{
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $cek = $this->Model_login->login($username, $password);

            if($cek == false){
                $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Gagal Login</strong> Silahkan isi Username Atau Password dengan benar!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
              redirect('C_login/login');
            }else{
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role', $cek->role);
                $this->session->set_userdata('nama', $cek->nama);
                 $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Login</strong> akun Anda berhasil Login!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('C_dashboard');
                
            }
        }
    }

    public function logout(){
        // $this->session->sess_destroy();
				 $this->session->unset_userdata('username');
                $this->session->unset_userdata('nama');
				 $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Berhasil LogOut</strong> Akun Anda Berhasil Logout!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        redirect('C_login/login');
      }

    public function _rules(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
      }
}
