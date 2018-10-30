<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in_user')){
			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else {
				$session_data = $this->session->userdata('logged_in_user');
			}

			$data['id_user'] = $session_data['id_user'];
			$this->load->model('Kontrak_Model');
    }
  }

  public function detail_kontrak($kd_kontrak)
  {
    $title['title'] = "Detail Kontrak";
		$this->load->view('global/01_header', $title);
    $data['detail_kontrak'] = $this->Kontrak_Model->getKontrakById($kd_kontrak);
    $data['detail_barang'] = $this->Kontrak_Model->getBarangByKontrak($kd_kontrak);
    $this->load->view('inventaris/detail_kontrak', $data);
  }
}
?>
