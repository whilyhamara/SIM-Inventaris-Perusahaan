<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
		if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in_user') || $this->session->userdata('logged_in_pegawai') ){
			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else if ($this->session->userdata('logged_in_user')){
				$session_data = $this->session->userdata('logged_in_user');
			} else {
        $session_data = $this->session->userdata('logged_in_pegawai');
      }

			$data['id_user'] = $session_data['id_user'];
      $this->load->model('Inventaris_Model');
      $this->load->model('Kontrak_Model');
      $this->load->model('Peminjaman_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
  }

  function index()
  {
    $title['title'] = 'Dashboard';
    $data=[
      'active_controller' => 'dashboard',
      'active_function' => 'index'
    ];
    $data['inventaris_list'] = $this->Inventaris_Model->getInventarisLimit();
    $data['hitungInventaris']=$this->Inventaris_Model->hitungInventaris();
    $data['kontrak_list'] = $this->Kontrak_Model->getKontrakLimit();
    $data['hitungKontrak']=$this->Kontrak_Model->hitungKontrak();
    $data['hitungPeminjaman']=$this->Peminjaman_Model->hitungPeminjaman();
    $this->load->view('global/01_header', $title);
    $this->load->view('global/_template', $data);
  }
}
