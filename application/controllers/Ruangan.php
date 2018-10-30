<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller{

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
			$this->load->model('Ruangan_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
	}

  public function cekRuangan()
	{
		$nama_ruangan = $_POST["nama_ruangan"];
		if($this->Ruangan_Model->cekRuangan($nama_ruangan)){
        echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Ruangan sudah ada</label>';
    }else{
				echo '<button type="submit" class="btn btn-success">Simpan</button>';
			}
	}

  public function daftar_ruangan()
	{
		$title['title'] = "Daftar Ruangan";
		$data['ruangan_list'] = $this->Ruangan_Model->getRuangan();
		$this->load->view('global/01_header', $title);
		$this->load->view('ruangan/daftar_ruangan', $data);
	}

	public function tambah_ruangan()
	{
    $this->form_validation->set_rules('kd_ruangan', 'Kode Ruangan', 'required');
		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
    $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');

		if ($this->form_validation->run()==FALSE) {
      $title['title'] = "Daftar Ruangan";
  		$data['ruangan_list'] = $this->Ruangan_Model->getRuangan();
  		$this->load->view('global/01_header', $title);
  		$this->load->view('kategori/daftar_ruangan', $data);
		} else {
			$kode = $this->Ruangan_Model->kodeRuanganSudahDiInput();
      $nama = $this->Ruangan_Model->namaRuanganSudahDiInput();

			if ($kode || $nama) {
				$this->session->set_flashdata('ruangan_gagal', 'Ruangan yang diinput sudah ada!');
			} else {
				$this->Ruangan_Model->insertRuangan();
				$this->session->set_flashdata('ruangan_add', 'Ruangan Berhasil Ditambahkan!');
			}
			redirect('Ruangan/daftar_ruangan','refresh');

		}
	}

	public function edit_ruangan($id_ruangan)
	{
			$title['title'] = "Edit Ruangan";

			$this->form_validation->set_rules('kd_ruangan', 'KODE', 'required');

			if($this->form_validation->run()==FALSE){
        $data['get_ruangan'] = $this->Ruangan_Model->getRuanganById($id_ruangan);
    		$this->load->view('global/01_header', $title);
    		$this->load->view('ruangan/edit_ruangan', $data);
			}else{
				$this->Ruangan_Model->editRuangan($id_ruangan);
        $this->session->set_flashdata('ruangan_add', 'Ruangan Berhasil Diedit!');
				redirect('ruangan/daftar_ruangan','refresh');
			}
	}

	public function hapus_ruangan($id_ruangan)
	{
		$terdaftar=$this->Ruangan_Model->ruanganTerdaftar($id_ruangan);
		if ($terdaftar) {
			$this->session->set_flashdata('fail', 'Tidak dapat menghapus, Ruangan tersebut telah terdaftar dalam inventaris!');
			redirect('Ruangan/daftar_ruangan','refresh');
		} else {
			$this->session->set_flashdata('ruangan_terhapus', 'Ruangan Berhasil Dihapus');
			$this->Ruangan_Model->deleteRuangan($id_ruangan);
			redirect('Ruangan/daftar_ruangan','refresh');
		}
	}

}
?>
